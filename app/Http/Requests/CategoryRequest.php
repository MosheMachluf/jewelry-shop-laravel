<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(Request $req) {
        return [
            'title' => 'required',
            'url' => 'required|regex:/[a-z\d-]+/|unique:categories,url,' . $this->category,
            'article' => 'required',
            'image' => 'required|image',
        ];
    }

    public function messages(){
        return [
            'title.required' => 'שדה כותרת הינו חובה',
            'article.required' => 'שדה תוכן הינו חובה',
            'url.required' => 'שדה כתובת הקטגוריה הינו חובה',
            'url.unique' => 'כתובת הקטגוריה ( Url ) שהזנת כבר בשימוש',
            'url.regex' => 'כתובת הקטגוריה ( Url ) שהזנת לא תקינה, וודא שהיא כתובה באותיות קטנות באנגלית ושתכיל \'-\' במקום רווחים',
            'image.required' => 'חובה להעלות תמונת קטגוריה',
            'image.image' => 'התמונה שבחרת לא תקינה',
        ];
    }
}