<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProfileRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:200',
            'email' => 'required|max:200|min:4|unique:users,email,'.Auth::id().',id|regex:/^[a-z][a-z0-9_]*$/i',
            'job' => 'nullable|max:200',
            'salary' => 'nullable',
        ];
    }
}
