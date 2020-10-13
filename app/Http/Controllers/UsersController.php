<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use App\User;
use Session, DB;

class UsersController extends MainController
{
    function __construct(){
        parent::__construct();
        $this->middleware('check_admin');
    }

    public function index() {
        self::$data['users'] = User::all()->toArray();
        return view('cms.users', self::$data);
    }

    public function create() {
        self::$data['user_roles'] = DB::select('SELECT * FROM user_permissions');
        return view('cms.add_user', self::$data);
    }

    public function store(SignupRequest $req){
        User::saveNew($req, $req['role_id'], false);
        return redirect('cms/users');
    }

    public function edit($id){
        self::$data['user'] = User::getUser($id)[0];
        self::$data['user_roles'] = DB::select('SELECT * FROM user_permissions');
        return view('cms.edit_user', self::$data);
    }

    public function update(SignupRequest $req, $id){
        User::updateOne($req, $id);
        return redirect('cms/users');
    }

    public function show($id){
        self::$data['id'] = $id;
        return view('cms.delete_user', self::$data);
    }

    public function destroy($id) {
        User::destroy($id);
        DB::delete('DELETE FROM user_roles WHERE user_id = ?', [$id]);
        Session::flash('success-message', 'המשתמש נמחק בהצלחה');
        return redirect('cms/users');
    }

}