<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Branch;
use App\Helpers\Helper;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
class User extends Authenticatable implements AuditableContract
{
    use HasApiTokens, HasFactory, Notifiable,AuditableTrait;
    use LogsActivity;
    use SoftDeletes;
    use HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected static $logAttributes = ['name', 'text'];
    protected $table = 'users';
    protected $fillable = [
        'profile',
        'cs_id',
        'name',
        'email',
        'role_id',
        'sex',
        'date_of_birth',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*'])
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs();
    }
  
    public function role(){
        return $this->belongsTo(Role::class,'role_id');
    }
    
    public function getUserDOBAttribute(){
        if ($this->date_of_birth) {
            return Carbon::parse($this->date_of_birth)->format('d-M-Y');
        }
    }

    public function getRoleNameAttribute(){
        return optional($this->role)->name;
    }
    public function getRolePermissionAttribute(){
        return optional($this->role)->role_type;
    }
}
