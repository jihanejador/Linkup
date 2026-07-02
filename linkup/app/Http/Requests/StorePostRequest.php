<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'content' => ['required', 'string', 'min:10'],
        ];
    }
    public function messages(): array{
        return [
            'content.required' => 'Le texte du post est obligatoire',
            'content.min' => 'Le post doit contenir au moins 10 caracteres',
        ];
    }
}
