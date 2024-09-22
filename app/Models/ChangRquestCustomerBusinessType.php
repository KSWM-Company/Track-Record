<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChangRquestCustomerBusinessType extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    protected $table = 'chang_rquest_customer_business_types';
    protected $guarded = ['id'];
    protected $fillable = [
        'chang_request_customer_id',
        'business_type_id',
        'category_id',
        'sub_category_id',
        'multiply',
        'land_filed_fee',
        'monthly_fee',
        'grand_total',
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
