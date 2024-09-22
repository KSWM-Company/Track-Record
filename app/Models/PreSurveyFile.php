<?php

namespace App\Models;

use App\Models\PreSurvey;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PreSurveyFile extends Model
{
    use LogsActivity;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'pre_survey_files';
    protected $guarded = ['id'];
    protected $fillable = [
        'pre_survey_id',
        'name',
        'full_path',
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
    public function PreSurvey(){
        return $this->belongsTo(PreSurvey::class,'pre_survey_id');
    }
}
