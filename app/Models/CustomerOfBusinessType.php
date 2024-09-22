<?php

namespace App\Models;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\BusinessType;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerOfBusinessType extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    protected $table = 'customer_of_business_types';
    protected $guarded = ['id'];
    protected $fillable = [
        'customer_id',
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
    public function BusinessType(){
        return $this->belongsTo(BusinessType::class,'business_type_id');
    }
    public function Category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function SubCategory(){
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }

    public function getBusinessTypeNameAttribute(){
        return optional($this->BusinessType)->name;
    }
    public function getCategoryNameAttribute(){
        return optional($this->Category)->name;
    }
    public function getSubCategoryNameAttribute(){
        return optional($this->SubCategory)->name;
    }
}
