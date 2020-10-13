<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Order;
use Cart, Session;

class ShopController extends MainController
{
    public function catalog() {
        $products = Product::catalogProducts();
        self::$data['products'] = $products;
        self::$data['title_page'] = 'קטלוג מוצרים';
        self::$data['title'] .= self::$data['title_page'];
        self::$data['breadcrumbs'] = [
            'דף הבית'  =>url('/'),
        ];
        return view('content.shop', self::$data);
    }

    public function products($cat_url) {
        Product::getProducts($cat_url, self::$data);
        self::$data['breadcrumbs'] = [
        'דף הבית'  =>url('/'),
        'קטלוג מוצרים'  =>url('shop'),
        ];
        return view('content.products', self::$data);
    }

    public function item($cat_url, $prd_url) {
        if ($product = Product::getProductItem($cat_url, $prd_url)) {
           //to array
            $product = json_decode(json_encode($product), true);

            $more_products = Product::select('products.*', 'categories.url as category_url')
                                    ->join('categories', 'categories.id', '=', 'products.category_id')
                                    ->inRandomOrder()
                                    ->take(4)
                                    ->get()
                                    ->toArray();

            self::$data['title_page'] = $product['title'];
            self::$data['title'] .= self::$data['title_page'];
            self::$data['product'] = $product;
            self::$data['more_products'] = $more_products;
            self::$data['breadcrumbs'] = [
                'דף הבית'  =>url('/'),
                'קטלוג מוצרים'  =>url('shop'),
                $product['category']  => url('shop/' . $product['category_url']),
            ];
            return view('content.item', self::$data);
        } else {
            abort(404);
        }
    }

    public function addToCart(Request $request) {
        Product::addToCart($request['id']);
    }

    public function checkout(Request $request) {
        if (!empty($request['prd']) && is_numeric($request['prd']))
            Product::addToCart($request['prd']);

        $cart = Cart::getContent()->toArray();
        sort($cart);
        self::$data['cart'] = $cart;
        self::$data['title_page'] = 'עגלת קניות';
        self::$data['title'] .= self::$data['title_page'];
        self::$data['breadcrumbs'] = [
            'דף הבית'  =>url('/'),
        ];

        return view('content.checkout', self::$data);
    }

    public function clearCart() {
        Cart::clear();
        return redirect('shop/checkout');
    }

    public function updateCart(Request $request) {
        Product::updateCart($request);
    }

    public function removeItem($id) {
        Cart::remove($id);
        return redirect('shop/checkout');
    }

    public function purchase() {
        if (Cart::isEmpty()) return redirect('shop');
        else {

            if (!Session::has('user_id')) {
                return redirect('user/signin?rt=shop/checkout');
            } else {
                Order::saveNew();
                return redirect('shop');
            }
        }
    }

    public function searchResults(Request $req) {
        $results = Product::resultsProducts($req['q']);
        self::$data['title_page'] = 'תוצאות חיפוש';
        self::$data['title'] .= self::$data['title_page'];
        self::$data['results'] = $results;
        self::$data['breadcrumbs'] = [
            'דף הבית'  =>url('/'),
        ];
        return view('content.search_results', self::$data);
    }

    public function search(Request $req) {
        $query = $req['query'];
        if ($req->ajax() && $query) {
        return Product::select('products.*', 'categories.url as category_url')
                        ->join('categories', 'categories.id', '=', 'products.category_id')
                        ->where('products.title', 'like', '%' . $query . '%')
                        ->orWhere('products.article', 'like', '%' . $query . '%')
                        ->take(10)
                        ->get();
        }
    }
}