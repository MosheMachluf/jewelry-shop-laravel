<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;
use App\Product;
use Session, DB;

class CategoriesController extends MainController
{
    public function index() {
        self::$data['categories'] = Category::all()->toArray();
        self::$data['count_products'] = Product::select('category_id', DB::raw('count(category_id) AS number'))->groupBy('category_id')->get()->toArray();
        return view('cms.categories', self::$data);
    }

    public function create() {
        return view('cms.add_category', self::$data);
    }

    public function store(CategoryRequest $req){
        Category::saveNew($req);
       return redirect('cms/categories');
    }

    public function show($id){
        self::$data['id'] = $id;
        return view('cms.delete_category',  self::$data);
    }

    public function edit($id){
        self::$data['category'] = Category::find($id)->toArray();
        return view('cms.edit_category', self::$data);
    }

    public function update(CategoryRequest $req, $id){
        Category::updateOne($req, $id);
        return redirect('cms/categories');
    }

    public function destroy($id) {
        Category::destroy($id);
        Session::flash('success-message', 'הקטגוריה נמחקה בהצלחה');
        return redirect('cms/categories');
    }
}