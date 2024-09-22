<?php

namespace App\Models;

use App\Models\StaffList;
use App\Models\SurveyDetail;
use App\Models\SurveyBusinessType;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Survey extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    protected $table = 'surveys';
    protected $guarded = ['id'];
    protected $fillable = [
        'user_id',
        'branch_id',
        'staff_id',
        'customer_id',
        'trans_no',
        'survey_date',
        'entry_date',
        'block',
        'sector',
        'street_no',
        'side_of_street',
        'zone_name',
        'start_piont',
        'end_piont',
        'add_street',
        'province',
        'district',
        'commune',
        'village',
        'total_amount',
        'created_by',
        'updated_by',
        'deleted_at',
        'delete_by',
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*'])
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs();
    }
    public function staff(){
        return $this->belongsTo(StaffList::class,'staff_id');
    }
    public function surveyDetail(){
        return $this->belongsTo(SurveyDetail::class,'id','survey_id');
    }
    public function surveyBusinessType(){
        return $this->belongsTo(SurveyBusinessType::class,'id');
    }

    public function provinces(){
        return $this->belongsTo(Province::class,'province', 'code');
    }
    public function districts(){
        return $this->belongsTo(District::class,'district', 'code');
    }
    public function communes(){
        return $this->belongsTo(Commune::class,'commune', 'code');
    }
    public function villages(){
        return $this->belongsTo(Village::class,'village', 'code');
    }
    public function getSurveyNameAttribute(){
        return optional($this->staff)->name;
    }
    public function getTotalFeeAttribute(){
        return optional($this->surveyDetail)->total_fee;
    }
}
