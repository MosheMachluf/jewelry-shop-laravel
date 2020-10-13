<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Content extends Model
{
    static public function saveNew($req){
        $content = new self();
        $content->menu_id = $req['menu_id'];
        $content->title = $req['title'];
        $content->article = $req['article'];
        $content->save();
        Session::flash('success-message', 'התוכן נוסף בהצלחה!');
    }

    static public function updateOne($req, $id){
        $content = self::find($id);
        $content->menu_id = $req['menu_id'];
        $content->title = $req['title'];
        $content->article = $req['article'];
        $content->update();
        Session::flash('success-message', 'השינויים נשמרו בהצלחה!');
    }
}