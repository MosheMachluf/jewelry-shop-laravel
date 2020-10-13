<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Menu;

class MainController extends Controller
{

    function __construct(){
        self::$data['menu'] = Menu::all()->toArray();
        self::$data['categories'] = Category::all()->toArray();
    }

    static public $data = ['title' => 'Mosh\'s Jewelry | '];
}