<?php

namespace App\Models;

use App\Models\User;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentType extends Model
{
    use SoftDeletes;
    use HasFactory;
    use LogsActivity;

    protected $table = 'payment_types';
    protected $guarded = ['id'];
    protected $fillable = [
        'user_id',
        'name',
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
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function upldatedBy()
    {
        return $this->belongsTo(User::class ,'updated_by');
    }
    public function getBranchNameAttribute(){
        return optional($this->branch)->branch_code;
    }

}


