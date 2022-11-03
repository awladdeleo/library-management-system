<?php

namespace App\Http\Requests\Backend\Book;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required','string','max:150'],
            'isbn' => ['required','string','max:50'],
            'author' => ['required','string','max:50'],
            'genre' => ['required','string','max:50'],
            'quantity' => ['required','numeric']
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => __('book.Title'),
            'author' => __('book.Author'),
            'genre' => __('book.Genre'),
            'quantity' => __('book.Quantity'),
        ];
    }
}
