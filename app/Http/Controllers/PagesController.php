<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;

class PagesController extends MainController
{
    public function home(){
        self::$data['products_sale'] = Product::products_sale()->take(4);
        self::$data['new_products'] = Product::new_products();
        self::$data['title'] .= 'דף הבית';
        return view('content.home', self::$data);
    }

    public function content($url){
        $contents = DB::table('contents')
        ->join('menus', 'menus.id', '=', 'contents.menu_id')
        ->select('menus.*', 'menus.title as menu_title', 'contents.*')
        ->where('menus.url', '=', $url)
        ->get()
        ->toArray();

        if (!$contents) abort(404);

        self::$data['title'] .= $contents[0]->menu_title;
        self::$data['contents'] = $contents;
        self::$data['title_page'] = $contents[0]->menu_title;
        self::$data['breadcrumbs'] = [
            'דף הבית'  =>url('/'),
        ];

        return view('content.content', self::$data);
    }

}
