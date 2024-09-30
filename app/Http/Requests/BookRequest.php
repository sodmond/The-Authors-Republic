<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:255'],
            'category' => ['required', 'integer'],
            'isbn' => ['nullable', 'max:255'],
            'soft_copy' => ['required', 'integer', 'max:1'],
            'hard_copy' => ['required', 'integer', 'max:1', 'accepted_if:soft_copy,0'],
            'description' => ['nullable', 'max:5000'],
            'price' => ['required', 'numeric'],
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:512', Rule::dimensions()->minWidth(370)->ratio(1 / 1)],
            'book_file' => ['required_if_accepted:soft_copy', 'mimes:pdf', 'max:2048'],
            'pages_number' => ['required', 'integer'],
            'published_at' => ['required', 'date'],
        ];
    }

    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array<string, string>
    */
    public function messages(): array
    {
        return [
            'hard_copy.accepted_if' => 'Hard copy must be YES, if you are not providing a soft copy',
            'book_file.required_if_accepted' => 'A book file should be uploaded if you are providing a soft copy',
        ];
    }
}
