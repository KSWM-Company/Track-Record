<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'monthly_fee'=>'required',
            'land_filed_fee'=>'required',
            'land_filed_fee'=>'required',
            'category_id'  =>'required',
            'business_type_id'  => 'required',
        ];
    }
}
