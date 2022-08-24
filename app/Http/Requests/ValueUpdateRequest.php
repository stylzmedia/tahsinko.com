<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValueUpdateRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'description' => ['string'],
            'image' => ['string'],
            'position' => ['integer'],
            'status' => ['required', 'integer'],
        ];
    }
}
