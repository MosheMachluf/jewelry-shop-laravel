<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users,email,' . $this->user,
            'password' => request()->isMethod('put') ? 'nullable|min:6|confirmed' : 'required|min:6|confirmed' ,
        ];
    }

    public function messages(){
        return [
            'name.required' => 'שדה שם מלא הינו חובה',
            'name.min' => 'שדה שם מלא חייב להכיל לפחות 2 תווים',
            'email.required' => 'שדה אימייל הינו חובה',
            'email.email' => 'האימייל שהזנת לא תקין',
            'email.unique' => 'האימייל שהזנת כבר קיים במערכת',
            'password.required' => 'שדה סיסמה הינו חובה',
            'password.min' => 'הסיסמה חייבת להכיל לפחות 6 תווים',
            'password.confirmed' => 'הסיסמאות אינן תואמות',
        ];
    }
}