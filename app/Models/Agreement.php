<?php

namespace App\Models;

use App\Models\Branch;
use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agreement extends Model
{
    use HasFactory;
    protected $table = 'agreements';
    protected $guarded = ['id'];
    protected $fillable = [
        'id',
        'staff_id',
        'branch_id',
        'agreement_no',
        'customer_no',
        'location_code',
        'customer_name',
        'business_name',
        'contact_person',
        'sex',
        'phone_number',
        'title',
        'fee',
        'vat',
        'vat_amount',
        'total_fee',
        'currency',
        'address',
        'collection_day',
        'make_at',
        'from',
        'to',
        'month_of_agr',
        'wast_collect_per_week',
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'saturday',
        'sunday',
        'agreement_date',
        'created_by',
        'updated_by',
        'deleted_at',
        'delete_by',
    ];
    public function branch(){
        return $this->belongsTo(Branch::class,'branch_id');
    }

    public function getFullBranchNameAttribute(){
        return Helper::getLang() == 'en' ? optional($this->branch)->name_en : optional($this->branch)->name_kh;
    }
}
