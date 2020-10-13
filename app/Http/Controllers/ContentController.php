<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContentRequest;
use App\Menu;
use App\Content;
use Session;

class ContentController extends MainController
{
    public function index() {
        self::$data['contents'] = Content::all()->toArray();
       return view('cms.contents', self::$data);
    }

    public function create() {
        return view('cms.add_content', self::$data);
    }

    public function store(ContentRequest $req){
       Content::saveNew($req);
       return redirect('cms/contents');
    }

    public function show($id){
        self::$data['id'] = $id;
        return view('cms.delete_content',  self::$data);
    }

    public function edit($id){
        self::$data['content'] = Content::find($id)->toArray();
        return view('cms.edit_content', self::$data);
    }

    public function update(ContentRequest $req, $id){
        Content::updateOne($req, $id);
        return redirect('cms/contents');
    }

    public function destroy($id) {
        Content::destroy($id);
        Session::flash('success-message', 'התוכן נמחק בהצלחה');
        return redirect('cms/contents');
    }
}