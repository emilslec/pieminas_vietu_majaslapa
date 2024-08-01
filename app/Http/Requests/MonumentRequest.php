<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MonumentRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'state' => 'string|max:255',
            'location' => 'string|max:255',
            'people' => 'string|max:255',
            'cover' => 'string|max:255',
            'description' => 'string',
            'placeDescription' => 'string',
            'types' => 'array',
            'types.*' => 'exists:types,id',
        ];
    }
}
