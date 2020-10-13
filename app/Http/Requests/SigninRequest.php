<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SigninRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];
    }

    public function messages(){
        return [
            'email.required' => 'שדה אימייל הינו חובה',
            'email.email' => 'האימייל שהזנת לא תקין',
            'password.required' => 'שדה סיסמה הינו חובה',
            'password.min' => 'הסיסמה חייבת להכיל לפחות 6 תווים',
        ];
    }
}