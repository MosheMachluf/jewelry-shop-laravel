<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session, Image;

class Category extends Model {

    public function products(){
        return $this->hasMany('App\Product');
    }

    static public function saveNew($req){
        $image_name = self::loadImage($req);
        $category = new self();
        $category->url = $req['url'];
        $category->title = $req['title'];
        $category->article = $req['article'];
        $category->image = $image_name;
        $category->save();
        Session::flash('success-message', 'הקטגוריה נוספה בהצלחה!');
    }


    static public function updateOne($req, $id){
        $image_name = self::loadImage($req);
        $category = Category::find($id);
        $category->url = $req['url'];
        $category->title = $req['title'];
        $category->article = $req['article'];
        if($image_name) $category->image = $image_name;
        $category->update();
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

}