<?php

namespace App\Http\Requests\Announcement;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class StoreRequest extends FormRequest
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
            'title' => ['required', 'max:50'],
            'description' => ['sometimes'],
            'price' => ['required', 'numeric'],
            'storage' => ['sometimes'],
            'images' => ['max:5', 'array'],
            'images.*' => ['max:2048', 'mimes:jpg,bmp,png,jpeg'],
        ];
    }
}
