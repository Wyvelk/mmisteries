<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Mission;
use App\Models\Score;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MissionController extends Controller
{
    public function mission($id)
        {
            if (Auth::check()) {
                $mission = Mission::whereRaw("id=".$id)->get();
                $reussi = MissionController::reussi($id);
                $dispo = MissionController::points_dispo($id);
                return view('mission', ['mission' => $mission, 'reussi' =>$reussi, 'dispo'=>$dispo]);
            } else {
                return redirect('login');
            }
        }

    public function valider(){

    }

    public function abandonner(){

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
            if(isset($mission_pass))
                array_push($reussite, $user);
        }
        return count($reussite);
    }


    }
?>