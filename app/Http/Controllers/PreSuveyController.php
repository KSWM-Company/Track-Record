<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Helpers\Helper;
use App\Models\Category;
use App\Models\PreSurvey;
use App\Models\LocationCode;
use Illuminate\Http\Request;
use App\Models\PreSurveyFile;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;


class PreSuveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        RolePermission($this, 'Pre Survey');
    }

    public function index(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $user = $request->user;
        $id = $request->id;
        $block = $request->block;
        $sector = $request->sector;
        $street = $request->street;
        $side_of_street = $request->side_of_street;

        $branchId = Session::get('branch_id');
        $Category = Category::all();
        $users = User::pluck('name', 'id');
        $blocks = LocationCode::where('type','Block')->pluck('name', 'id');
        $sectors = LocationCode::where('type','Sector')->pluck('name', 'id');
        $streets = LocationCode::where('type','Street')->pluck('name', 'id');
        $side_of_streets = LocationCode::where('type','Site_of_Street')->pluck('name', 'id');

        if (request()->ajax()) {
            // Define the base query
            $query = PreSurvey::with('PreSurveyFile')
                ->leftJoin('users', 'pre_surveys.user_id', '=', 'users.id')
                ->leftJoin('branches', 'pre_surveys.branch_id', '=', 'branches.id')
                ->leftJoin('categories', 'pre_surveys.business_type_id', '=', 'categories.id')
                ->leftJoin('sub_categories', 'pre_surveys.sub_category_id', '=', 'sub_categories.id')
                ->leftJoin('location_codes as block', 'pre_surveys.block_id', '=', 'block.id')
                ->leftJoin('location_codes as sector', 'pre_surveys.sector_id', '=', 'sector.id')
                ->leftJoin('location_codes as street', 'pre_surveys.street_id', '=', 'street.id')
                ->leftJoin('location_codes as side_of_street', 'pre_surveys.side_of_street_id', '=', 'side_of_street.id')
                ->select(
                    'pre_surveys.*',
                    'block.name as block_name',
                    'sector.name as sector_name',
                    'street.name as street_name',
                    'side_of_street.name as side_of_street_name',
                    'users.name as user_name',
                    'branches.name_en as branch_name_en',
                    'branches.name_kh as branch_name_kh',
                    'categories.name as category_name',
                    'sub_categories.name as sub_category_name'
                );

            // Apply branch filtering
            $query->where('pre_surveys.branch_id', $branchId);
            // Apply date filtering if both start_date and end_date are provided
            if ($start_date && $end_date) {
                $query->whereBetween('pre_surveys.created_at',  [$start_date, Carbon::parse($end_date)->endOfDay()]);
            }
            $query->when($block, function ($query, $block) {
                return $query->where('block_id', $block);
            })
            ->when($sector, function ($query, $sector) {
                return $query->where('sector_id', $sector);
            })
            ->when($street, function ($query, $street) {
                return $query->where('street_id', $street);
            })
            ->when($side_of_street, function ($query, $side_of_street) {
                return $query->where('side_of_street_id', $side_of_street);
            })
            ->when($user, function ($query, $user) {
                return $query->where('pre_surveys.user_id', $user);
            })
            ->when($id, function ($query, $id) {
                return $query->where('pre_surveys.id', $id);
            });

            // Apply additional filtering for 'Staff' role
            if (Auth::user()->RolePermission == 'Staff') {
                $query->where('pre_surveys.user_id', Auth::user()->id);
            }
            // Fetch paginated data
            $data = $query->orderBy('pre_surveys.id','DESC')->get();
            return DataTables::of($data)->make(true);
        }

        return view('pre_surveys.index', compact(
            'Category',
            'start_date',
            'end_date',
            'users',
            'id',
            'blocks',
            'sectors',
            'streets',
            'side_of_streets',
            'user',
            'block',
            'sector',
            'street',
            'side_of_street',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();  // Start the transaction
            // Gather input data and add user and branch details
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            $data['branch_id'] = Session::get('branch_id');
            $data['created_by'] = Auth::user()->id;
            // Create a new PreSurvey entry
            $preSurvey = PreSurvey::create($data);
            // Handle pre-survey files if any images are uploaded
            if ($request->arrImage) {
                foreach ($request->arrImage as $item) {
                    if(Helper::http_image($item['path_name'])){
                        $fileName = $item['path_name'];
                    }else if(Helper::is_base64($item['path_name'])){
                        $path = Helper::get_pre_survey_file_path();
                        $full_path = Helper::upload_survey_base64($item['path_name'],$path);
                    }
                    $dataSurveyFile['pre_survey_id']  = $preSurvey->id;
                    $dataSurveyFile['full_path']     = $full_path[0];
                    $dataSurveyFile['name']          = $full_path[1];
                    $dataSurveyFile['created_by']    = Auth::user()->id;
                    PreSurveyFile::create($dataSurveyFile);
                }
            }
            DB::commit();
            return ['status'=> true, 'message' => 'successfull'];
        } catch (\Exception $e) {
            // If there's an error, roll back the transaction
            DB::rollBack();
            // Handle the exception (log it, rethrow it, etc.)
            throw $e;
            // return ['status'=> true, 'message' => $e->getMessage()];
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $data = PreSurvey::find($id);
            $files = PreSurveyFile::where('pre_survey_id', $data->id)->get();
            $file_base64 = [];
            foreach ($files as $file) {
                $file_path = storage_path("app/public/presurvey/files/" . $file->name);
                if (file_exists($file_path)) { // Ensure file exists
                    $file_content = file_get_contents($file_path); // Read file content (text)
                    // Get the mime type of the image (e.g., image/jpeg, image/png)
                    $mimeType = mime_content_type($file_path);
                    $file_base64[] = [
                        'file_base64' => 'data:' . $mimeType . ';base64,' .base64_encode($file_content)
                    ];
                }
            }
            return response()->json(['msg' => 'success', 'data' => $data, 'files' => $file_base64], 200);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'error', 'error' => $e->getMessage()]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(PreSurvey $preSurvey)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PreSurvey $preSurvey)
    {
        DB::beginTransaction();  // Start the transaction
        try {
            // Gather input data and add user and branch details
            $data = $request->all();
            // $data['user_id'] = Auth::user()->id; SH close
            // $data['branch_id'] = Session::get('branch_id');
            // $data['created_by'] = Auth::user()->id;
            $data['updated_by'] = Auth::user()->id;
            // Create a new PreSurvey entry
            $preSurvey->update($data);

            // clear old file
            $old_file = PreSurveyFile::where('pre_survey_id', $preSurvey->id)->get();
            foreach ($old_file as $key => $value) {
                $value['delete_by'] = Auth::user()->id;
                $value->save();
                $value->delete();
                $path_file = storage_path("/app/public/presurvey/files/".$value->name);
                Helper::remove_file($path_file);
            }
            // Handle pre-survey files if any images are uploaded
            if ($request->arrImage) {
                foreach ($request->arrImage as $item) {
                    if(Helper::http_image($item['path_name'])){
                        $fileName = $item['path_name'];
                    }else if(Helper::is_base64($item['path_name'])){
                        $path = Helper::get_pre_survey_file_path();
                        $full_path = Helper::upload_survey_base64($item['path_name'],$path);
                    }
                    $dataSurveyFile['pre_survey_id']  = $preSurvey->id;
                    $dataSurveyFile['full_path']     = $full_path[0];
                    $dataSurveyFile['name']          = $full_path[1];
                    $dataSurveyFile['created_by']    = Auth::user()->id;
                    PreSurveyFile::create($dataSurveyFile);
                }
            }
            DB::commit();
            return ['status'=> true, 'message' => 'successfull'];
        } catch (\Exception $e) {
            return ['status'=> true, 'message' => $e->getMessage()];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(PreSurvey $preSurvey)
    {
        try{
            $preSurvey->delete();
            return response()->json(['mg'=>'success'], 200);
         }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

}
