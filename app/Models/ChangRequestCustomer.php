<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChangRequestCustomer extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    protected $table = 'chang_request_customers';
    protected $guarded = ['id'];
    protected $fillable = [
        'branch_id',
        'staff_id',
        'customer_id',
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
        'approved_by',
        'approved_date',
        'request_by',
        'request_date',
        'reson',
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
}
