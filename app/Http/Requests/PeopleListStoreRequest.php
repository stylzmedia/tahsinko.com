<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeopleListStoreRequest extends FormRequest
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
            'people_id' => ['required', 'integer', 'unique:people_lists,people_id'],
            'name' => ['required', 'string'],
            'designation' => ['required', 'string'],
            'department' => ['required', 'string'],
            'bio' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string'],
            'website_link' => ['required', 'string'],
            'image' => ['required', 'string'],
            'address' => ['required', 'string'],
            'status' => ['required', 'integer'],
        ];
    }
}
