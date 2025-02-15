<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string|max:255',
            'profile' => 'nullable|string|max:255',
            'phone' => 'required|string|max:255|unique:authors,phone', 
            'email' => 'required|email|max:255|unique:authors,email', 
            'address' => 'nullable|string|max:255',
        ];
    }
}
