<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Category;
use App\Product;
use Session;

class ProductsController extends MainController
{
    public function index() {
        self::$data['products'] = Product::getProductsForCms();
        return view('cms.products', self::$data);
    }

    public function create() {
        self::$data['categories'] = Category::all()->toArray();
        return view('cms.add_product', self::$data);
    }

    public function store(ProductRequest $req){
        Product::saveNew($req);
        return redirect('cms/products');
    }

    public function show($id){
        self::$data['id'] = $id;
        return view('cms.delete_product', self::$data);
    }

    public function edit($id){
        self::$data['product'] = Product::find($id)->toArray();
        self::$data['categories'] = Category::all()->toArray();
        return view('cms.edit_product', self::$data);
    }

    public function update(ProductRequest $req, $id){
        Product::updateOne($req, $id);
        return redirect('cms/products');
    }

    public function destroy($id) {
        Product::destroy($id);
        Session::flash('success-message', 'המוצר נמחק בהצלחה');
        return redirect('cms/products');
    }
}