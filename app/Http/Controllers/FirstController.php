<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FirstController extends Controller
{
    public function start() {
        return view('start');
    }

    public function login() {
        return view('login');
    }

    public function loginT() {
    }

    public function register() {
        return view('register');
    }

    public function registerT() {
        $noms = DB::select("select nom from equipes");
        foreach($noms as $v){
            if($v == $_POST['login']){
                return redirect('register');
            }
        }
        DB::select("insert into `equipes`(`nom`, `slogan`, `score`, `password`, `instagram`) VALUES (?, ?, 0, ?, ?)", [$_POST['login'], $_POST['slogan'], sha1($_POST['pass']), $_POST['insta']]);
        Session::put('login', $_POST['login']);
        $login = Session::get('login');
        return view('start', ['login'=>$login]);
    }

    public function contact() {
        return view('contact');
    }

    public function accueil() {
        if(Auth::check()){
            return view('accueil');
        } else {
            return redirect('login');
        }
    }
}
