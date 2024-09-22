<?php

namespace App\Models;

use App\Models\User;
use App\Models\Company;
use App\Models\UserBranch;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\Contracts\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Branch extends Authenticatable implements AuditableContract
{
    use  HasFactory, Notifiable,AuditableTrait;
    use LogsActivity;
    use SoftDeletes;

    protected $table = 'branches';
    protected $guarded = ['id'];
    protected $fillable = [
        'id',
        'user_id',
        'company_id',
        'name_kh',
        'name_en',
        'description',
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
        return $this->belongsTo(User::class, 'id');
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function upldatedBy()
    {
        return $this->belongsTo(User::class ,'updated_by');
    }
    public function companyBranch(){
        return $this->belongsTo(Company::class,'company_id');
    }
    public function userBranch()
    {
        return $this->belongsToMany(UserBranch::class, 'user_branches', 'user_id', 'branch_id');
    }
}
