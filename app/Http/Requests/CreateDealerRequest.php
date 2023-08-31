<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateDealerRequest extends FormRequest
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
            'dealerName'=>'required',
            'gender'=>'required',
            'phoneNumber'=>'required',
            'country'=>'required',
            'specificAddress'=>'required',
            'businessItem'=>'required',
        ];
    }

    public function messages(): array
    {
        return [
            'dealerName.required'=> 'Tên đại lý không được để trống',
            'gender.required'=> 'Giới tính không được để trống',
            'phoneNumber.required'=> 'Số điện thoại không được để trống',
            'dateOfBirth.required'=> 'Ngày sinh không được để trống',
            'country.required'=> 'Quốc gia không được để trống',
            'specificAddress.required'=> 'Địa chỉ không được để trống',
            'businessItem.required'=> 'Mặt hàng kinh doanh không được để trống',
        ];
    }
}
