<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStudentRequest extends FormRequest
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
            'first_name' => 'required|string|max:100|regex:/^[A-Za-z\s\-\'\.]+$/',
            'middle_name' => 'nullable|string|max:100|regex:/^[A-Za-z\s\-\'\.]+$/',
            'last_name' => 'required|string|max:100|regex:/^[A-Za-z\s\-\'\.]+$/',
            'email' => [
                'required',
                'email',
                Rule::unique('students', 'email')->ignore($this->student),
            ],
            'gender' => 'required|in:male,female',
            'date_of_birth' => 'required|date|before:today',
            'course' => 'required|string',
            'year_level' => 'required|string',
        ];
    }
}
