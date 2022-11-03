<?php

namespace App\Http\Requests\Backend\Circulation;

use Illuminate\Foundation\Http\FormRequest;

class IssueBookRequest extends FormRequest
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
            'user_name' => ['required','exists:users,id'],
            'book_name' => ['required','array'],
            'return_date' => ['required','date_format:d-m-Y']
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
            'user_name' => __('circulation.UserName'),
            'book_name' => __('circulation.BookName'),
            'return_date' => __('circulation.ReturnDate'),
        ];
    }
}
