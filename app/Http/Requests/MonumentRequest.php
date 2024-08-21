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
            'state' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'people' => 'required|string|max:255',
            'cover' => 'required|string|max:255',
            'description' => 'required|string',
            'placeDescription' => 'required|string',
            'types' => 'required|array|min:1',
            'types.*' => 'exists:types,id',
            'intervals' => 'required|array|min:1',
            'intervals.*' => 'exists:intervals,id',
        ];
    }
}
