<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SurveyBusinessType extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    protected $table = 'survey_business_types';
    protected $guarded = ['id'];
    protected $fillable = [
        'survey_detail_id',
        'business_type_id',
        'category_id',
        'sub_category_id',
        'multiply',
        'land_filed_fee',
        'monthly_fee',
        'grand_total',
        'created_by',
        'updated_by',
        'delete_by',
        'deleted_at',
        'created_at',
        'updated_at'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*'])
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs();
    }
    // public function survey_detail()
    // {
    //     return $this->belongsTo(SurveyDetail::class, 'survey_detail_id');
    // }
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
