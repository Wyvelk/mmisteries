<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

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
        DB::select("insert into `equipes`(`nom`, `slogan`, `score`, `password`, `instagram`) VALUES (?, ?, 0, ?, ?)", [$_POST['login'], $_POST['slogan'], sha1($_POST['pass']), $_POST['insta']]);
        
        return redirect('/');

    }

    public function contact() {
        return view('contact');
    }
}
