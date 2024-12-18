<?php

namespace App\Http\Requests;

use Closure;
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
            'stock' => ['nullable', 'integer'],
            'description' => ['nullable', 'max:5000'],
            'price' => ['nullable', 'required_if:soft_copy,1', 'numeric', function (string $attribute, mixed $value, Closure $fail) {
                if ($value < 1 && $this->input('soft_copy') == 1) {
                    $fail("The price for soft copy should be greater than 0.");
                }
            }],
            'price2' => ['nullable', 'required_if:hard_copy,1', 'numeric', function (string $attribute, mixed $value, Closure $fail) {
                if ($value < 1 && $this->input('hard_copy') == 1) {
                    $fail("The price for hard copy should be greater than 0.");
                }
            }],
            #'image' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:512', Rule::dimensions()->width(370)->height(500)],
            'book_file' => ['required_if_accepted:soft_copy', 'mimes:pdf', 'max:10240'],
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
            'price.required_if' => 'Price for soft copy is required',
            'price2.required_if' => 'Price for hard copy is required',
            'book_file.required_if_accepted' => 'A book file should be uploaded if you are providing a soft copy',
            #'stock.required_if' => 'Stock is required if you are selling hard copy'
        ];
    }
}
