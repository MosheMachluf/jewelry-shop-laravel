<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cart, Session, Image, DB;

class Product extends Model {

    static public function getProducts($cat_url, &$data) {
        if ($cat_url == 'sale') {

            $data['title_page'] = 'מבצעי חיסול';
            $data['title'] .=  $data['title_page'];
            $data['products'] = self::products_sale();

        } else if ($category = Category::where('url', '=', $cat_url)->first()) {
            $data['title_page'] = 'קטגוריית ' . $category['title'];
            $data['title'] .=  $data['title_page'];
            $data['cat_url'] = $cat_url;

            if ($products = Category::find($category['id'])->products)
                $data['products'] = $products->toArray();

        } else {
            abort(404);
        }
    }

    static public function getProductItem($cat_url ,$prd_url) {
        $sql = 'SELECT p.*, c.url AS category_url, c.title AS category
                FROM products p
                JOIN categories c ON c.id = p.category_id
                WHERE c.url = ? AND p.url = ?';

        if ($res = DB::select($sql, [$cat_url, $prd_url]))
            return $res[0];
        else
            abort(404);

    }


    static public function getProductsForCms() {
        $sql = 'SELECT p.*, c.url AS category_url, c.title AS category
                FROM products p
                JOIN categories c ON c.id = p.category_id';
        return DB::select($sql);
    }

    static public function addToCart($id) {
        if (!empty($id) && is_numeric($id)) {
            if (!Cart::get($id) && $product = self::find($id)) {
                if($product['sale_price']) $price = $product['sale_price'];
                else $price = $product['price'];
                Cart::add($id, $product['title'], $price, 1, [$product['image']]);
                Session::flash('success-message', $product['title'] . ' נוסף לעגלה');
            }
        }
    }

    static public function updateCart($req) {
        if (!empty($req['id']) && is_numeric($req['id'])) {

            if (!empty($req['op']) && $item = Cart::get($req['id'])) {

                if ($req['op'] === '+') {
                    Cart::update($req['id'], ['quantity' => 1]);
                } elseif ($req['op'] === '-' && $item['quantity'] != 1) {
                    if ($item['quantity'] - 1 != 0)
                        Cart::update($req['id'], ['quantity' => -1]);
                }
            }
        }
    }

    static public function saveNew($req){
        $image_name = self::loadImage($req);
        $product = new self();
        $product->category_id = $req['category_id'];
        $product->title = $req['title'];
        $product->url = $req['url'];
        $product->price = $req['price'];
        $product->sale_price = $req['sale_price'];
        $product->article = $req['article'];
        $product->image = $image_name;
        $product->save();
        Session::flash('success-message', 'המוצר נוסף בהצלחה!');
    }


    static public function updateOne($req, $id){
        $image_name = self::loadImage($req);
        $product = Product::find($id);
        $product->category_id = $req['category_id'];
        $product->title = $req['title'];
        $product->url = $req['url'];
        $product->price = $req['price'];
        if($req['sale_price']) $product->sale_price = $req['sale_price'];
        else $product->sale_price = null;
        $product->article = $req['article'];
        if($image_name) $product->image = $image_name;
        $product->update();
        Session::flash('success-message', 'השינויים נשמרו בהצלחה!');
    }

    static private function loadImage($req){

        $image_name = '';

        if ($req->hasFile('image') && $req->file('image')->isValid()) {
            $file = $req->file('image');
            $image_name = date('Y.m.d.H.i.s') . '-' . $file->getClientOriginalName();
            $file->move(public_path() . '/images', $image_name);
            $img = Image::make(public_path() . '/images/' . $image_name);
            $img->resize(null, 500, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save();
        }

        return $image_name;
    }

    static public function products_join(){
        return self::join('categories as c', 'c.id', '=', 'category_id')->select('products.*', 'c.url as category_url');
    }

    static public function products_sale(){
        $products = self::products_join()->whereNotNull('sale_price')->inRandomOrder();
        return $products->get();
    }

    static public function new_products() {
        $products = self::products_join()->latest()->take(4)->get();
        return $products;
    }

    static public function resultsProducts($search) {
        return self::products_join()->where('products.title', 'like', "%$search%")->orWhere('products.article', 'like', "%$search%")->paginate(5);
    }

    static public function catalogProducts(){
        $products = self::products_join();

        if (request()->sortBy == 'priceLow')
            $products = $products->orderBy(
                DB::raw('CASE WHEN sale_price IS NOT NULL THEN sale_price ELSE price END'));

        else if (request()->sortBy == 'priceHigh')
            $products = $products->orderBy(DB::raw('CASE WHEN sale_price IS NOT NULL THEN sale_price ELSE price END'), 'desc');

        else if (request()->sortBy == 'newProd')
            $products = $products->latest();

        return $products->paginate(8)->appends('sortBy', request('sortBy'));
    }
}
