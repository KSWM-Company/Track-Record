<?php

namespace App\Models;

use App\Models\User;
use App\Models\Branch;
use App\Helpers\Helper;
use App\Models\Category;
use App\Models\BusinessType;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class SubCategory extends Authenticatable implements AuditableContract
{
    use HasFactory, AuditableTrait;
    use SoftDeletes;
    use LogsActivity;

    protected $table = 'sub_categories';
    protected $guarded = ['id'];
    protected $fillable = [
        'user_id',
        'branch_id',
        'business_type_id',
        'category_id',
        'name',
        'unit',
        'monthly_fee',
        'land_filed_fee',
        'total_fee',
        'noted',
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
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function business(){
        return $this->belongsTo(BusinessType::class,'business_type_id');
    }

    public function getCategoryNameAttribute(){
        return optional($this->category)->name;
    }
    public function getBusinessTeypNameAttribute(){
        return optional($this->business)->name;
    }

    public function getBranchNameAttribute(){
        return optional($this->branch)->branch_code;
    }

    public function getBranchNameKhAttribute(){
        return Helper::getLang() == 'en' ? optional($this->branch)->name_en : optional($this->branch)->name_kh;
    }
}
