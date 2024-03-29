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

    public function infos()
    {
        if (Auth::check()) {
            return view('infos');
        } else {
            return redirect('login');
        }
    }

    public function explications()
    {
        return view('explications');
    }

    public function equipe()
    {
        if (Auth::check()) {
            $points = Score::whereRaw("idUser=" . Auth::user()->id)->get();
            $total = 0;
            for ($i = 0; $i < count($points); $i++) {
                $total += $points[$i]->reussite + $points[$i]->rapidite + $points[$i]->bonus;
            }
            $classement = FirstController::classement();
            $objets = FirstController::objets();
            return view('equipe', ['points' => $points, 'total' => $total, 'classement' => $classement, 'objets' => $objets]);
        } else {
            return view('login');
        }
    }


    public function journal()
    {
        if (Auth::check()) {
            $progression = Auth::user()->progression;
            return view('story', ['progression' => $progression]);
        } else {
            return view('login');
        }
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
                $bleu = $couleurs . "<a id=mission" . $mission->id . " href=/mission/" . $mission->id . ">" . $mission->nom . "<div class='point bleu'></div></a>";
                $violet = $couleurs . "<a id=mission" . $mission->id . ">???<div class='point violet'></div></a>";
                if (date('d/m/Y') == '05/12/2022' and Auth::user()->progression >= 2)
                    $couleurs = $violet;
                elseif (date('d/m/Y') == '06/12/2022' and Auth::user()->progression >= 4)
                    $couleurs = $violet;
                elseif (date('d/m/Y') == '07/12/2022' and Auth::user()->progression >= 6)
                    $couleurs = $violet;
                elseif (date('d/m/Y') == '08/12/2022' and Auth::user()->progression >= 7)
                    $couleurs = $violet;
                else 
                    $couleurs = $bleu;
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
            if ($user->name != "Admin")
                array_push($users, [$user->id, $user->name, Score::whereRaw("idUser=" . $user->id)->get()]);
        }
        $calcul = 0;
        foreach ($users as $u) {
            foreach ($u[2] as $mission) {
                $calcul += $mission->rapidite + $mission->reussite + $mission->bonus;
            }
            array_push($totaux, [$calcul, $u[1], $u[0]]);
            $calcul = 0;
        }
        rsort($totaux);
        $position = 0;
        $final = [];
        foreach ($totaux as $v) {
            if (!isset($before) or $before != $v[0])
                $position += 1;
            array_push($final, [$v[0], $v[1], $v[2], $position]);
            $before = $v[0];
        }
        return $final;
    }
}
