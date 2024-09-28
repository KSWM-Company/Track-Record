<?php

namespace App\Models;

use App\Models\Branch;
use App\Helpers\Helper;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model

{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    protected $table = 'companies';
    protected $guarded = ['id'];
    protected $fillable = [
        'name_kh',
        'name_en',
        'company_logo',
        'address_kh',
        'address_en',
        'phone_number',
        'email',
        'website',
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
    public function companyname(){
        return $this->belongsTo(Company::class,'companies');
    }

    public function getCompanyNameKhAttribute(){
        return Helper::getLang() == 'en' ? optional($this->companyname)->name_en : optional($this->companyname)->name_kh;
    }
}


