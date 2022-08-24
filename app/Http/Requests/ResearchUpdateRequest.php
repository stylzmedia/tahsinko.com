<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResearchUpdateRequest extends FormRequest
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
            'sub_title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'image' => ['required', 'string'],
            'image_path' => ['required', 'string'],
            'media_id' => ['required', 'integer'],
            'video' => ['required', 'string'],
            'pdf_file' => ['required', 'string'],
        ];
    }
}
