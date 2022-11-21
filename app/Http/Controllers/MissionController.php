<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Mission;
use App\Models\Score;
use App\Models\User;
use App\Models\Indice;
use Illuminate\Support\Facades\Auth;

class MissionController extends Controller
{
    public function mission($id)
        {
            if (Auth::check() and Auth::user()->progression + 1 >= $id) {
                $mission = Mission::whereRaw("id=".$id)->get();
                $reussi = MissionController::reussi($id);
                $abandon = Score::whereRaw("idUser=". Auth::user()->id)->whereRaw("idMission=".$id)->whereRaw("reussie=0")->get();
                $dispo = MissionController::points_dispo($id) - MissionController::bonus($id);
                $indice = MissionController::indice($id);
                $userindice = Indice::whereRaw('idUser='.Auth::user()->id)->whereRaw('idMission='.$id)->get();
                return view('mission', ['mission' => $mission, 'reussi' =>$reussi, 'dispo'=>$dispo, 'indice'=>$indice, 'userindice'=>$userindice, 'abandon'=>$abandon]);
            } else {
                return redirect('login');
            }
        }

    public function valider(){

    }

    public function abandon($id){
        $abandonner = Score::whereRaw("idUser=". Auth::user()->id)->whereRaw("idMission=".$id)->whereRaw("reussie=0")->get();
        if(count($abandonner) == 0){
            $m = new Score();
            $m->idUser = Auth::user()->id;
            $m->idMission = $id;
            $m->reussite = 0;
            $m->rapidite = 0;
            $m->bonus = 0;
            $m->reussie = 0;
            $m->save();
            $user = User::whereRaw('id='.Auth::user()->id)->get();
            $user[0]->progression = $id;
            $user[0]->save();
        }

        return redirect('mission/'.$id);
    }

    public function points_dispo($id){
        $maxi = Mission::whereRaw("id=". $id)->get();
        $users = User::all();
        if($maxi[0]->difficulte == "Très facile"){
            $points = 50;
        } elseif($maxi[0]->difficulte == "Facile"){
            $points = 80;
        } elseif($maxi[0]->difficulte == "Normale"){
            $points = 120;
        } else{
            $points = 150;
        }
        $dispo = ($maxi[0]->pointsmax - $points) / count($users);
        return ($maxi[0]->pointsmax) - ($dispo * MissionController::reussi($id));
    }

    public function reussi($id){
        $reussite = [];
        $users = User::whereRaw("progression >=". $id)->get();
        foreach($users as $user){
            $mission_pass = Score::whereRaw("idUser=".$user->id)->whereRaw("idMission=".$id)->whereRaw("reussie != 0")->get();
            if(count($mission_pass) != 0)
                array_push($reussite, $user);
        }
        return count($reussite);
    }

    public function indice($id){
        $indice = Mission::whereRaw("id=".$id)->get();
        $mission3 = Score::whereRaw("idMission = 3")->whereRaw("reussie=1")->whereRaw("idUser=".Auth::user()->id)->get();
        $mission4 = Score::whereRaw("idMission = 4")->whereRaw("reussie=1")->whereRaw("idUser=".Auth::user()->id)->get();
        $indices = [$indice[0]->indice1];
        if(Auth::user()->progression < 3){
            return $indices;
        } else{
                if(count($mission3) == 0 and count($mission4) == 0){
                } elseif(count($mission3) != 0 and count($mission4) == 0){
                    array_push($indices, $indice[0]->indice2);
                    return $indices;
                } elseif(count($mission3) == 0 and count($mission4) != 0){
                    array_push($indices, $indice[0]->indice2);
                    return $indices;
                } else {
                    array_push($indices, $indice[0]->indice2);
                    array_push($indices, $indice[0]->indice3);
                    return $indices;
                }
        }
    }

    public function aide($id){
        $mission = Indice::whereRaw('idUser='.Auth::user()->id)->whereRaw('idMission='.$id)->get();
        if(count($mission) == 0){
            $m = new Indice();
            $m->idUser = Auth::user()->id;
            $m->idMission = $id;
            $m->save();
        }
        $mission = Indice::whereRaw('idUser='.Auth::user()->id)->whereRaw('idMission='.$id)->get();
        if($mission[0]->indice1 == NULL){
            $mission[0]->indice1 = 1;
            $mission[0]->save();
        } elseif($mission[0]->indice2 == NULL){
            $mission[0]->indice2 = 1;
            $mission[0]->save();
        } elseif($mission[0]->indice3 == NULL){
            $mission[0]->indice3 = 1;
            $mission[0]->save();
        }
        return redirect('mission/'.$id);
    }

    public function bonus($id){
        $difficulte = Mission::whereRaw('id='.$id)->get();
        if ($difficulte[0]->difficulte == 'Très facile')
            $pointsbonus = 20;
        if ($difficulte[0]->difficulte == 'Facile')
            $pointsbonus = 30;
        if ($difficulte[0]->difficulte == 'Normale')
            $pointsbonus = 40;
        if ($difficulte[0]->difficulte == 'Difficile')
            $pointsbonus = 50;
        $mission = Indice::whereRaw('idUser='.Auth::user()->id)->whereRaw('idMission='.$id)->get();
        if(count($mission) == 0){
            return 0;
        } elseif($mission[0]->indice3 == 1){
            return $pointsbonus;
        } elseif($mission[0]->indice2 == 1){
            return $pointsbonus * 0.5;
        } else{
            return $pointsbonus * 0.3;
        }
    
    }
    
    }
?>