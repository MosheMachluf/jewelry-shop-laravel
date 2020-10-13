<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;
use App\Menu;
use Session;

class MenuController extends MainController
{
    public function index() {
       return view('cms.menu', self::$data);
    }

    public function create() {
        return view('cms.add_menu');
    }

    public function store(MenuRequest $req){
       Menu::saveNew($req);
       return redirect('cms/menu');
    }

    public function show($id){
        self::$data['id'] = $id;
        return view('cms.delete_menu',  self::$data);
    }

    public function edit($id){
        self::$data['item'] = Menu::find($id)->toArray();
        return view('cms.edit_menu', self::$data);
    }

    public function update(MenuRequest $req, $id){
        Menu::updateOne($req, $id);
        return redirect('cms/menu');
    }

    public function destroy($id) {
        Menu::destroy($id);
        Session::flash('success-message', 'הלינק נמחק בהצלחה');
        return redirect('cms/menu');
    }
}