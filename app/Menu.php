<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Menu extends Model
{
    static public function saveNew($req){
        $menu = new self();
        $menu->link = $req['link'];
        $menu->title = $req['title'];
        $menu->url = $req['url'];
        $menu->save();
        Session::flash('success-message', 'הלינק נוסף בהצלחה!');
    }

    static public function updateOne($req, $id){
        $menu = self::find($id);
        $menu->link = $req['link'];
        $menu->title = $req['title'];
        $menu->url = $req['url'];
        $menu->update();
        Session::flash('success-message', 'השינויים נשמרו בהצלחה!');
    }
}