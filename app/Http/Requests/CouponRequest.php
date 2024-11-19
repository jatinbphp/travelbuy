<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
            'coupon' => 'required',
            'verification_code' => 'required'
        ];

        return $rules;
    }

    public function messages(): array
    {
        return [
            'coupon.required' => 'The  voucher code is required.',
            'verification_code.required' => 'The  voucher verification code is required.',
        ];
    }
}
