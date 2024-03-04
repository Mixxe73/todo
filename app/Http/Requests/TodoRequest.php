<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Default false!
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
            'todo_title' => ['required', 'string', 'min:3', 'max:64'],
            'todo_subtitle' => ['nullable', 'string', 'max:64'],
            'todo_description' => ['required', 'string', 'min:3', 'max:512']
        ];
    }
}
