<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Mission;
use App\Models\Score;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

class FirstController extends Controller
{
    public function start()
    {
        return view('start');
    }

    public function tease()
    {
        return view('tease');
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function contact()
    {
        return view('contact');
    }

    public function equipe()
    {
        $points = Score::whereRaw("idUser=" . Auth::user()->id)->get();
        $total = 0;
        for ($i = 0; $i < count($points); $i++) {
            $total += $points[$i]->reussite + $points[$i]->rapidite + $points[$i]->bonus;
        }
        $classement = FirstController::classement();
        $objets = FirstController::objets();
        return view('equipe', ['points' => $points, 'total' => $total, 'classement' => $classement, 'objets' => $objets]);
    }

    public function journal()
    {
        $progression = Auth::user()->progression;
        return view('story', ['progression' => $progression]);
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
            return view('accueil', ['total' => $total, 'achievement' => $achievement, 'classement' => $classement]);
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
            return view('adventure', ['progression' => $prog, 'missions' => $missions, 'points' => $points, 'couleur' => $couleur]);
        } else {
            return redirect('login');
        }
    }

    public function couleur()
    {
        $couleurs = '';
        foreach (Mission::all() as $mission) {
            $missionav = Score::whereRaw('idMission=' . $mission->id - 1)->whereRaw("idUser=" . Auth::user()->id)->get();
            if (Auth::user()->progression >= $mission->id) {
                $m = Score::whereRaw('idMission=' . $mission->id)->whereRaw("idUser=" . Auth::user()->id)->get();
                if ($m[0]->reussie !== 0) {
                    $couleurs = $couleurs . "<a id=mission" . $mission->id . " href=/mission/" . $mission->id . ">" . $mission->nom . "<div class='point jaune'></div></a>";
                } else {
                    $couleurs = $couleurs . "<a id=mission" . $mission->id . " href=/mission/" . $mission->id . ">" . $mission->nom . "<div class='point rouge'></div></a>";
                }
            } elseif (count($missionav) != 0 or $mission->id == 1) {
                $couleurs = $couleurs . "<a id=mission" . $mission->id . " href=/mission/" . $mission->id . ">" . $mission->nom . "<div class='point bleu'></div></a>";
            } else {
                $couleurs = $couleurs . "<a id=mission" . $mission->id . ">???<div class='point violet'></div></a>";
            }
        }
        return $couleurs;
    }

    public function objets()
    {
        $telephone = Score::whereRaw("idUser=" . Auth::user()->id)->whereRaw('idMission=1')->whereRaw('reussie=1')->get();
        $ampli = Score::whereRaw("idUser=" . Auth::user()->id)->whereRaw('idMission=4')->whereRaw('reussie=1')->get();
        $projo = Score::whereRaw("idUser=" . Auth::user()->id)->whereRaw('idMission=7')->whereRaw('reussie=1')->get();
        $boussole = Score::whereRaw("idUser=" . Auth::user()->id)->whereRaw('idMission=8')->whereRaw('reussie=1')->get();
        $objects = [$telephone, $ampli, $projo, $boussole];
        return $objects;
    }

    public function classement()
    {
        $users = [];
        $totaux = [];
        foreach (User::all() as $user) {
            array_push($users, [$user->id, $user->name, Score::whereRaw("idUser=" . $user->id)->get()]);
        }
        $calcul = 0;
        foreach ($users as $u) {
            foreach ($u[2] as $mission) {
                $calcul += $mission->rapidite + $mission->reussite + $mission->bonus;
            }
            array_push($totaux, [$u[1], $calcul, $u[0]]);
            $calcul = 0;
        }
        rsort($totaux);
        $position = 0;
        $final = [];
        foreach ($totaux as $v) {
            if (!isset($before) or $before != $v[1])
                $position += 1;
            array_push($final, [$v[0], $v[1], $v[2], $position]);
            $before = $v[1];
        }
        return $final;
    }
}
