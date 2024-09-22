<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SurveyFile extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;

    protected $table = 'survey_files';
    protected $guarded = ['id'];
    protected $fillable = [
        'survey_detail_id',
        'name',
        'path_name',
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
    public function survey_detail()
    {
        return $this->belongsTo(SurveyDetail::class, 'survey_detail_id');
    }
}
