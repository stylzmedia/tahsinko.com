<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceUpdateRequest extends FormRequest
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
            'title' => ['required', 'integer'],
            'description' => ['required', 'integer'],
            'image' => ['required', 'integer'],
            'position' => ['required', 'integer'],
            'status' => ['required', 'integer'],
        ];
    }
}
