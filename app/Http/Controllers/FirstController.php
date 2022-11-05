<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Mission;
use App\Models\Score;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FirstController extends Controller
{
    public function start()
    {
        return view('start');
    }

    public function login()
    {
        return view('login');
    }

    public function loginT()
    {
    }

    public function register()
    {
        return view('register');
    }

    public function registerT()
    {
        $noms = DB::select("select nom from equipes");
        foreach ($noms as $v) {
            if ($v == $_POST['login']) {
                return redirect('register');
            }
        }
        DB::select("insert into `equipes`(`nom`, `slogan`, `score`, `password`, `instagram`) VALUES (?, ?, 0, ?, ?)", [$_POST['login'], $_POST['slogan'], sha1($_POST['pass']), $_POST['insta']]);
        Session::put('login', $_POST['login']);
        $login = Session::get('login');
        return view('start', ['login' => $login]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function accueil()
    {
        if (Auth::check()) {
            $points = Score::whereRaw("idUser=" . Auth::user()->id . "")->get();
            $total = 0;
            for ($i = 0; $i < count($points); $i++) {
                $total += $points[$i]->reussite + $points[$i]->rapidite + $points[$i]->bonus;
            }

            $achievement = Mission::whereRaw("id=" . Auth::user()->progression)->get();
            return view('accueil', ['total' => $total, 'achievement' => $achievement]);
        } else {
            return redirect('login');
        }
    }

    public function adventure()
    {
        if (Auth::check()) {
            $missions = Mission::all();
            $points = Score::whereRaw("idUser=" . Auth::user()->id . "")->get();
            return view('adventure', ['missions' => $missions, 'points' => $points]);
        } else {
            return redirect('login');
        }
    }

    public function mission($id)
    {
        if (Auth::check()) {
            $mission = DB::select('select * from missions where id = ?', [$id]);
            return view('mission', ['mission' => $mission]);
        } else {
            return redirect('login');
        }
    }

    public function classement() {
        $users = [];
        $totaux = [];
        foreach (User::all() as $user){
            array_push($users, [$user->id, Score::whereRaw("idUser=" . $user->id)->get()]);
        }
        $calcul = 0;
        foreach ($users as $u) {
            foreach ($u[1] as $mission){
                $calcul += $mission->rapidite + $mission->reussite + $mission->bonus;
            }
            array_push($totaux, [$u[0], $calcul]);
            $calcul = 0;
        }
        $best = [];
        foreach($totaux as $u){
            array_push($best, $u[1]);
        }
        dd($best);
        
    }
}
