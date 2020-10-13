<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use App\User;
use Session;

class UserController extends MainController {

    public function __construct(){
        parent::__construct();
        $this->middleware('check_logged', ['except' => ['logout']]);
    }

    public function getSignin(){
        self::$data['title_page'] = 'התחברות';
        self::$data['title'] .= self::$data['title_page'];
        self::$data['breadcrumbs'] = [
            'דף הבית'  =>url('/'),
        ];
        return view('forms.signin', self::$data);
    }

    public function postSignin(SigninRequest $req){
        $rt = !empty($req['rt']) ? $req['rt'] : '';

        if (User::validate($req)){
            return redirect($rt);
        } else {
            return view('forms.signin', self::$data)->withErrors('אימייל או סיסמה לא נכונים');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('user/signin');
    }

    public function getSignup(){
        self::$data['title_page'] = 'הרשמה';
        self::$data['title'] .= self::$data['title_page'];
        self::$data['breadcrumbs'] = [
            'דף הבית'  =>url('/'),
        ];
        return view('forms.Signup', self::$data);
    }

    public function postSignup(SignupRequest $req){
        User::saveNew($req);
        return redirect('');
    }

}