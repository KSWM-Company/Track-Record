<?php

namespace App\Models;
use App\Models\User;
use App\Models\Branch;
use App\Helpers\Helper;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class LocationCode extends Authenticatable implements AuditableContract
{
    use HasFactory, AuditableTrait;
    use SoftDeletes;
    use LogsActivity;

    protected $table = 'location_codes';
    protected $guarded = ['id'];
    protected $fillable = [
        'user_id',
        'branch_id',
        'name',
        'type',
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
    public function branch(){
        return $this->belongsTo(Branch::class,'branch_id');
    }
    public function getBranchNameAttribute(){
        return Helper::getLang() == 'en' ? optional($this->branch)->name_en : optional($this->branch)->name_kh;
    }
    public function getcampanyNameAttribute(){
        return Helper::getLang() == 'en' ? optional($this->branch)->name_en : optional($this->branch)->name_kh;
    }
}

