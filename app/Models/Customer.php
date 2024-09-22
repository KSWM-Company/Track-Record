<?php

namespace App\Models;

use App\Models\Branch;
use App\Helpers\Helper;
use App\Models\Commune;
use App\Models\Village;
use App\Models\Currency;
use App\Models\District;
use App\Models\Province;
use App\Models\StaffList;
use App\Models\PaymentType;
use App\Models\CustomerFile;
use Illuminate\Support\Carbon;
use Spatie\Activitylog\LogOptions;
use App\Models\CustomerOfBusinessType;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    protected $table = 'customers';
    protected $guarded = ['id'];
    protected $fillable = [
        'branch_id',
        'staff_id',
        'customer_no',
        'customer_name',
        'business_name',
        'email',
        'location_code',
        'location_longitude',
        'location_latitude',
        'link_map',
        'zone_name',
        'houes_no',
        'add_streed',
        'vatin',
        'province',
        'district',
        'commune',
        'village',
        'contact_person',
        'sex',
        'phone_number',
        'title',
        'fee',
        'vat',
        'vat_amount',
        'total_fee',
        'currency',
        'payment_type',
        'collector',
        'collection_date',
        'status',
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
    public function staff(){
        return $this->belongsTo(StaffList::class,'staff_id');
    }
    public function customersHavBusiness(){
        return $this->hasMany(CustomerOfBusinessType::class,'customer_id','id');
    }
    public function customerImage(){
        return $this->hasMany(CustomerFile::class,'customer_id','id');
    }
    public function custCurrency(){
        return $this->belongsTo(Currency::class,'currency');
    }
    public function custPaymentType(){
        return $this->belongsTo(PaymentType::class,'payment_type');
    }
    public function branch(){
        return $this->belongsTo(Branch::class,'branch_id');
    }
    public function provinces(){
        return $this->belongsTo(Province::class,'province', 'code');
    }
    public function districts(){
        return $this->belongsTo(District::class,'district', 'code');
    }
    public function communes(){
        return $this->belongsTo(Commune::class,'commune', 'code');
    }
    public function villages(){
        return $this->belongsTo(Village::class,'village', 'code');
    }
    public function getCurrencyNameAttribute(){
        return optional($this->custCurrency)->name;
    }
    public function getPaymentTypeNameAttribute(){
        return optional($this->custPaymentType)->name;
    }
    public function getStaffNameAttribute(){
        return optional($this->staff)->name;
    }
    public function getBranchNameAttribute(){
        return Helper::getLang() == 'en' ? optional($this->branch)->name_en : optional($this->branch)->name_kh;
    }
    public function getCusCollectionDateAttribute(){
        if ($this->collection_date) {
            return Carbon::parse($this->collection_date)->format('d-M-Y');
        }
    }
    //// GET Current address
    public function getFullCurrentAddressAttribute()
    {
        $houseNo = $streetNo = $provice_name = $district_name = $conmmunes_name = $villages_name = '';
        $villages = Helper::getLang() == 'en' ? 'Villages ' : 'ភូមិ';
        $street = Helper::getLang() == 'en' ? 'Street ' : 'ផ្លូវ';
        $provice_name =  Helper::getLang() == 'en' ? optional($this->provinces)->khmer : optional($this->provinces)->khmer;
        $district_name =  Helper::getLang() == 'en' ? optional($this->districts)->khmer : optional($this->districts)->khmer;
        $conmmunes_name =  Helper::getLang() == 'en' ? optional($this->communes)->khmer : optional($this->communes)->khmer;
        $villages_name =  Helper::getLang() == 'en' ? optional($this->villages)->khmer : optional($this->villages)->khmer;
        return 'ភូមិ'. " " .$villages_name.' ឃុំ '.$conmmunes_name.' ស្រុក '.$district_name. ' ' .$provice_name;
    }
}
