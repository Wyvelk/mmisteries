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

    public function equipe() {
        return view('equipe');
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
            $classement = FirstController::classement();
            return view('accueil', ['total' => $total, 'achievement' => $achievement, 'classement'=>$classement]);
        } else {
            return redirect('login');
        }
    }

    public function adventure()
    {
        if (Auth::check()) {
            $missions = Mission::all();
            $points = Score::whereRaw("idUser=" . Auth::user()->id . "")->get();
            $prog = Auth::user()->progression;
            $couleur = FirstController::couleur();
            return view('adventure', ['progression'=>$prog, 'missions' => $missions, 'points' => $points, 'couleur'=>$couleur]);
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

    public function couleur(){
        $couleurs = '';
        foreach(Mission::all() as $mission){
            $missionav = Score::whereRaw('idMission='.$mission->id - 1)->whereRaw("idUser=".Auth::user()->id)->get();
            if(Auth::user()->progression >= $mission->id){
                $m = Score::whereRaw('idMission='.$mission->id)->whereRaw("idUser=".Auth::user()->id)->get();
                if($m[0]->reussie !== 0){
                    $couleurs = $couleurs . "<a id=mission".$mission->id ." href=/mission/".$mission->id .">". $mission->nom."<div class='point jaune'></div></a>";
                } else {
                    $couleurs = $couleurs . "<a id=mission".$mission->id ." href=/mission/".$mission->id .">". $mission->nom."<div class='point rouge'></div></a>";
                }
            } elseif(count($missionav) != 0 or $mission->id == 1) {
                $couleurs = $couleurs . "<a id=mission".$mission->id ." href=/mission/".$mission->id .">". $mission->nom."<div class='point bleu'></div></a>";
            } else {
                $couleurs = $couleurs . "<a id=mission".$mission->id .">???<div class='point violet'></div></a>";
            }
        }
        return $couleurs;
    }


    public function classement()
    {
        $users = [];
        $totaux = [];
        foreach (User::all() as $user) {
            array_push($users, [$user->id, Score::whereRaw("idUser=" . $user->id)->get()]);
        }
        $calcul = 0;
        foreach ($users as $u) {
            foreach ($u[1] as $mission) {
                $calcul += $mission->rapidite + $mission->reussite + $mission->bonus;
            }
            array_push($totaux, [$u[0], $calcul]);
            $calcul = 0;
        }
        $best = [];
        foreach ($totaux as $u) {
            array_push($best, $u[1]);
        }
        rsort($best);
        $position = 0;
        foreach ($best as $v) {
            if (!isset($before) or $before != $v)
                $position += 1;
            foreach ($totaux as $u) {
                if ($v == $u[1] and $u[0] == Auth::user()->id) {
                    $before = $v;
                    if($position == 1 or $position == 0){
                        return 1 ."er";
                    } else {
                        return $position . "ème";
                    }
                }
            }
        }
    }
}
