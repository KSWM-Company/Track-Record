<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class PerSurveyRequest extends FormRequest
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
        // Determine if it's a create or update operation
        if ($this->isMethod('post')) {
            // This is a create operation
            Log::info('========== Create Data Payload =========:', $this->except('pre_survey_file'));
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            // This is an update operation
            Log::info('========== Update Data Payload =========:', $this->except('pre_survey_file'));
        }
        return [
            'user_id' => 'required',
            'branch_id' => 'required',
            'block_id' => 'required',
            'sector_id' => 'required',
            'street_id' => 'required',
            'side_of_street_id' => 'required',
            'location_longitude' => 'required',
            'location_latitude' =>'required',
            'pre_survey_file' =>'required',
        ];
    }
}
