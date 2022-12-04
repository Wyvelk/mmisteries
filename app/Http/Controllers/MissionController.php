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
            if (Auth::check()){
                if(MissionController::jour() + 1 >= $id) {
                $mission = Mission::whereRaw("id=".$id)->get();
                $reussi = MissionController::reussi($id);
                $abandon = Score::whereRaw("idUser=". Auth::user()->id)->whereRaw("idMission=".$id)->whereRaw("reussie=0")->get();
                $valider = Score::whereRaw("idUser=". Auth::user()->id)->whereRaw("idMission=".$id)->whereRaw("reussie=1")->get();
                $dispo = MissionController::points_dispo($id) - MissionController::bonus($id);
                $indice = MissionController::indice($id);
                $debloquer_indices = [Score::whereRaw('idUser='.Auth::user()->id)->whereRaw("idMission=3")->whereRaw('reussie=1')->get(), Score::whereRaw('idUser='.Auth::user()->id)->whereRaw("idMission=4")->whereRaw('reussie=1')->get()];
                $userindice = Indice::whereRaw('idUser='.Auth::user()->id)->whereRaw('idMission='.$id)->get();
                return view('mission', ['mission' => $mission, 'reussi' =>$reussi, 'dispo'=>$dispo, 'indice'=>$indice, 'userindice'=>$userindice, 'abandon'=>$abandon, 'debloquer_indices'=>$debloquer_indices, 'valider'=>$valider]);
                } else {
                    return redirect('accueil');
                }
            } else {
                return redirect('login');
            }
        }

    public function jour(){
        $nbr = Auth::user()->progression; 
        if(Auth::user()->progression == 9)
            $nbr = 8;
        if(date('d/m/Y') == '05/12/2022' and Auth::user()->progression >= 2)
            $nbr = 1;
        if(date('d/m/Y') == '06/12/2022' and Auth::user()->progression >= 4)
            $nbr = 3;
        if(date('d/m/Y') == '07/12/2022' and Auth::user()->progression >= 6)
            $nbr = 5;
        if(date('d/m/Y') == '08/12/2022' and Auth::user()->progression >= 7)
            $nbr = 6;
        return $nbr;
    }

    public function valider($id, Request $request){
        $mission = Mission::whereRaw('id='.$id)->get();
        
        if($mission[0]->id == 1){
            if($request->reponse == 'dimension' OR $request->reponse == 'DIMENSION' OR $request->reponse == 'Dimension'){
                MissionController::create($id);
                return redirect('mission/'.$id);
            } else {
                return redirect('abandon/'.$id);
            }
        } elseif($mission[0]->id == 2){
            if($request->reponse == 'A14BC6' OR $request->reponse == 'a14bc6'){
                MissionController::create($id);
                return redirect('mission/'.$id);
            } else {
                return redirect('abandon/'.$id);
            }
        } elseif($mission[0]->id == 3){
            if($request->reponse == 'AMPLIFICATEUR' OR $request->reponse == 'amplificateur' OR $request->reponse == 'Amplificateur'){
                MissionController::create($id);
                return redirect('mission/'.$id);
            } else {
                return redirect('abandon/'.$id);
            }
        } elseif($mission[0]->id == 4){
            if($request->reponse == '102F' OR $request->reponse == '102f'){
                MissionController::create($id);
                return redirect('mission/'.$id);
            } else {
                return redirect('abandon/'.$id);
            }
        } elseif($mission[0]->id == 5){
            if($request->reponse == 'Université' OR $request->reponse == 'UNIVERSITÉ' OR $request->reponse == 'UNIVERSITE' OR $request->reponse == 'universite' OR $request->reponse == 'université' OR $request->reponse == 'Universite'){
                MissionController::create($id);
                return redirect('mission/'.$id);
            } else {
                return redirect('abandon/'.$id);
            }
        } elseif($mission[0]->id == 6){
            if($request->reponse == 'Le cyclope rampant' OR $request->reponse == 'LE CYCLOPE RAMPANT' OR $request->reponse == 'Le Cyclope Rampant' OR $request->reponse == 'le cyclope rampant'){
                MissionController::create($id);
                return redirect('mission/'.$id);
            } else {
                return redirect('abandon/'.$id);
            }
        } elseif($mission[0]->id == 7){
            if($request->reponse == 'Studio audiovisuel' OR $request->reponse == 'STUDIO AUDIOVISUEL' OR $request->reponse == 'STUDIO' OR $request->reponse == 'studio audiovisuel'){
                MissionController::create($id);
                return redirect('mission/'.$id);
            } else {
                return redirect('abandon/'.$id);
            }
        } elseif($mission[0]->id == 8){
            if($request->reponse == '713705'){
                MissionController::create($id);
                return redirect('mission/'.$id);
            } else {
                return redirect('abandon/'.$id);
            }
        } elseif($mission[0]->id == 9){
            if($request->reponse == 'BRAVO' or $request->reponse == 'bravo' or $request->reponse == 'Bravo'){
                MissionController::create($id);
                return redirect('accueil');
            } else {
                return redirect('abandon/'.$id);
            }
        }
    }

    public function create($id){
        $final = MissionController::repartir_points($id);
        $u = new Score();
        $u->idUser = Auth::user()->id;
        $u->idMission = $id;
        $u->reussite = $final[0];
        $u->rapidite = $final[1];
        $u->bonus = $final[2];
        $u->reussie = 1;
        $u->save();
        $user = User::whereRaw('id='.Auth::user()->id)->get();
        $user[0]->progression = $id;
        $user[0]->save();
    }

    public function repartir_points($id){
        $final = [];
        $users = User::all();
        $difficulte = Mission::whereRaw('id='.$id)->get();
        if ($difficulte[0]->difficulte == 'Très facile'){
            $reussite = 30;
            $bonus = 20;
            $rapidite = 50;
        }
        if ($difficulte[0]->difficulte == 'Facile'){
            $reussite = 50;
            $bonus = 30;
            $rapidite = 60;
        }
        if ($difficulte[0]->difficulte == 'Normale'){
            $reussite = 80;
            $bonus = 40;
            $rapidite = 70;
        }
        if ($difficulte[0]->difficulte == 'Difficile'){
            $reussite = 100;
            $bonus = 50;
            $rapidite = 90;
        }
        $dispo = $rapidite / (count($users) - 1);
        array_push($final, $reussite);
        array_push($final, $rapidite - ($dispo * MissionController::reussi($id)));
        array_push($final, $bonus - MissionController::bonus($id));
        return $final;        
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
        $dispo = ($maxi[0]->pointsmax - $points) / (count($users) - 1);
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
        if(count($reussite) == 0){
            return count($reussite);
        } else {
            return count($reussite) - 1;
        }
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
            return $pointsbonus * 0.5;
        } elseif($mission[0]->indice2 == 1){
            return $pointsbonus * 0.3;
        } else{
            return $pointsbonus * 0.2;
        }
    
    }
    
    }
