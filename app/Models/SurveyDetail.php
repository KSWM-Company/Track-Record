<?php

namespace App\Models;

use App\Models\Survey;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SurveyDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    protected $table = 'survey_details';
    protected $guarded = ['id'];
    protected $fillable = [
        'survey_id',
        'location_code',
        'location_latitude',
        'location_longitude',
        'link_map',
        'order_of_house',
        'devide_order',
        'floor',
        'position',
        'house_no',
        'survey_name',
        'business_name',
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
    public function survey(){
        return $this->belongsTo(Survey::class,'survey_id');
    }
    public function survey_business_type()
    {
        return $this->hasMany(SurveyBusinessType::class);
    }
    public function survey_image_location()
    {
        return $this->hasMany(SurveyFile::class);
    }
}
