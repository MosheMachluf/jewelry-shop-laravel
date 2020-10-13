<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB, Session, Hash;

class User extends Model
{
    static public function validate($req){
        $valid = false;
        $email = $req['email'];
        $password = $req['password'];
        $sql = "SELECT u.*, r.role_id AS role FROM users u
                JOIN user_roles r ON u.id = r.user_id
                WHERE u.email = ?";
        $user = DB::select($sql, [$email]);

        if ($user) {
            $user = $user[0];

            if(Hash::check($password, $user->password)){
                $valid = true;
                Session::put('role', $user->role);
                Session::put('user_id', $user->id);
                Session::put('user_name', $user->full_name);
                Session::flash('success-message', 'ברוך שובך <b>' . $user->full_name . '</b>');
            }
        }

        return $valid;
    }

    static public function saveNew($req, $role_id = 3, $autoLogin = true){
        $user = new self();
        $user->full_name = $req['name'];
        $user->email = $req['email'];
        $user->password = bcrypt($req['password']);
        $user->save();
        $uid = $user->id;
        DB::insert("INSERT INTO user_roles VALUES($uid, $role_id)");

        if ($autoLogin) {
            Session::put('user_id', $uid);
            Session::put('user_name', $req['name']);
            Session::flash('success-message', 'ברוך הבא' . $req['name']);
        }
    }

    static public function getUser($id){
        $sql = 'SELECT u.*, r.role_id FROM users u
                JOIN user_roles r ON u.id = r.user_id
                WHERE u.id = ? LIMIT 1';
        return DB::select($sql, [$id]);
    }

    static public function updateOne($req, $id){

        $user = User::find($id);
        $user->full_name = $req['name'];
        $user->email = $req['email'];
        if ($req['password']) $user->password = bcrypt($req['password']);
        $user->touch();
        $user->update();
        if (isset($req['role_id']))
            DB::update('UPDATE user_roles SET role_id = ? WHERE user_id = ?', [$req['role_id'], $id]);
    }
}