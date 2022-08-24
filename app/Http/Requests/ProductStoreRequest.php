<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'category_id' => ['required', 'integer'],
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'freature_image' => ['required', 'string'],
            'video' => ['required', 'string'],
            'position' => ['required', 'integer'],
            'pdf_file' => ['required', 'string'],
            'status' => ['required', 'integer'],
        ];
    }
}
