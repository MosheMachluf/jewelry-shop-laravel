<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class MenuRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(Request $req) {
        $unique = !empty($req['item_id']) ? ',' . $req['item_id'] : '';
        return [
            'link' => 'required',
            'title' => 'required',
            'url' => 'required|regex:/[a-z\d-]+/|unique:menus,url,' . $this->menu,
        ];
    }

    public function messages(){
        return [
            'link.required' => 'שדה לינק הינו חובה',
            'title.required' => 'שדה כותרת הינו חובה',
            'url.required' => 'שדה כתובת הדף ( Url ) הינו חובה',
            'url.unique' => 'כתובת הדף ( Url ) שהזנת כבר בשימוש',
            'url.regex' => 'כתובת הדף ( Url ) שהזנת לא תקינה, וודא שהיא כתובה באותיות קטנות באנגלית ושתכיל \'-\' במקום רווחים',
        ];
    }
}