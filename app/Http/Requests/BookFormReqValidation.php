<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookFormReqValidation extends FormRequest
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
            'title' => 'required',
            'author_name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'quantity' => 'required',
            'book_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
