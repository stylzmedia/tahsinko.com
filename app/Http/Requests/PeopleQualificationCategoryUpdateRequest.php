<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeopleQualificationCategoryUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'people_qualification_id' => ['required', 'integer', 'unique:people_qualification_categories,people_qualification_id'],
            'title' => ['required', 'string'],
            'position' => ['required', 'integer'],
            'status' => ['required', 'integer'],
        ];
    }
}
