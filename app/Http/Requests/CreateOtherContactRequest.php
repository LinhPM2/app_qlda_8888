<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class CreateOtherContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'fullName'=>'required',
            'dateOfBirth'=>'required',
            'gender'=>'required',
            'phoneNumber'=>'required',
            'IDDealer'=>'required',
        ];
    }

    public function messages(): array
    {
        return [
            'fullName.required'=> 'Họ tên không được để trống',
            'dateOfBirth.required'=> 'Ngày sinh không được để trống',
            'gender.required'=> 'Giới tính không được để trống',
            'phoneNumber.required'=> 'Số điện thoại không được để trống',
            'IDDealer.required'=> 'Đại lý không được để trống',
        ];
    }
}
