<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules() {
        return [
            'category_id' => 'required|numeric',
            'title' => 'required',
            'url' => 'required|regex:/[a-z\d-]+/|unique:products,url,' . $this->product,
            'article' => 'required',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'image' => request()->isMethod('put') ? 'image' : 'required|image',
        ];
    }

    public function messages(){
        return [
            'category_id.required' => 'חובה לבחור קטגוריה',
            'title.required' => 'שדה כותרת הינו חובה',
            'article.required' => 'שדה תוכן הינו חובה',
            'url.required' => 'שדה כתובת המוצר הינו חובה',
            'url.unique' => 'כתובת המוצר ( Url ) שהזנת כבר בשימוש',
            'url.regex' => 'כתובת המוצר ( Url ) שהזנת לא תקינה, וודא שהיא כתובה באותיות קטנות באנגלית ושתכיל \'-\' במקום רווחים',
            'price.required' => 'שדה מחיר הינו חובה',
            'price.numeric' => 'שדה מחיר חייב להיות מספר',
            'sale_price.numeric' => 'שדה מחיר מבצע חייב להיות מספר',
            'image.required' => 'חובה להעלות תמונת מוצר',
            'image.image' => 'התמונה שבחרת לא תקינה',
        ];
    }
}