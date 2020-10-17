<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session, Cart, DB;

class Order extends Model
{
    static public function saveNew(){
        $cartCollection = Cart::getContent();
        $cart = $cartCollection->toArray();
        $order = new self();
        $order->user_id = Session::get('user_id');
        $order->data = serialize($cart);
        $order->total = Cart::getTotal();
        $order->save();
        Cart::clear();
        Session::flash('success-message', Session::get('user_name') . 'תודה שקנית! ההזמנה שלך נשלחה לביצוע ותגיע אלייך בהקדם האפשרי');
    }

    static public function getOrders(){
        $orders = DB::table('orders as o')
        ->join('users as u','u.id', '=', 'o.user_id')
        ->select('o.*','u.full_name')
        ->orderBy('created_at', 'desc')
        ->paginate(8);

        return $orders;
    }
}