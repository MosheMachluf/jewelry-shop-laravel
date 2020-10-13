<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ContentRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(Request $req) {
        return [
            'menu_id' => 'required',
            'title' => 'required',
            'article' => 'required',
        ];
    }

    public function messages(){
        return [
            'menu_id.required' => 'אנא בחר דף מהתפריט',
            'title.required' => 'שדה כותרת הינו חובה',
            'article.required' => 'תוכן הדף הינו שדה חובה',
        ];
    }
}