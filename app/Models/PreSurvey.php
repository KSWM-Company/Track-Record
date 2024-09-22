<?php

namespace App\Models;

use App\Models\User;
use App\Models\Branch;
use App\Models\PreSurveyFile;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PreSurvey extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    protected $table = 'pre_surveys';
    protected $guarded = ['id'];
    protected $fillable = [
        'user_id',
        'branch_id',
        'block_id',
        'sector_id',
        'street_id',
        'side_of_street_id',
        'business_type_id',
        'sub_category_id',
        'location_longitude',
        'location_latitude',
        'link_map',
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
    public function User()
    {
        return $this->belongsTo(User::class,'id');
    }
    public function branch(){
        return $this->belongsTo(Branch::class,'branch_id');
    }
    public function PreSurveyFile(){
        return $this->hasMany(PreSurveyFile::class,'pre_survey_id','id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'id');
    }
    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class,'id');
    }
    public function files()
    {
        return $this->hasMany(PreSurveyFile::class, 'pre_survey_id');
    }
}
