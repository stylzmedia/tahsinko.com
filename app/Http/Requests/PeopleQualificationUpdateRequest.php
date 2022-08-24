<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeopleQualificationUpdateRequest extends FormRequest
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
            'people_list_id' => ['required', 'integer', 'unique:people_qualifications,people_list_id'],
            'title' => ['required', 'string'],
            'position' => ['required', 'integer'],
            'status' => ['required', 'integer'],
        ];
    }
}
