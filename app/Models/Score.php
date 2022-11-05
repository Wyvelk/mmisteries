<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Mission;

class Score extends Model
{
    use HasFactory;
    protected $table = 'score';
    public $timestamps = false;

    public function pointsmission(){
        return $this->belongsTo(Mission::class, "idMission");
    }
}
