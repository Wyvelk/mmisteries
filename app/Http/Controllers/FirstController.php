<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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
}
