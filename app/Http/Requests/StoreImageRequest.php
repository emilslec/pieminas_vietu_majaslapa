<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:16192',
            'description' => 'string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Nepieciešams attēls.',
            'image.image' => 'Failam jābut attēlam.',
            'image.mimes' => 'Tikai JPEG, PNG un JPG formāti ir atļauti,',
            'image.max' => 'Maksimālais izmērs 16 MB.',
        ];
    }
}
