<?php

namespace App\Models;

use App\Models\Branch;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserBranch extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'user_branches';
    protected $fillable = [
        'user_id',
        'branch_id',
        'created_by',
        'updated_by',
        'deleted_at',
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*'])
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs();
    }
}
