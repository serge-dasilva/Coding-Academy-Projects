<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Matches extends Model
{
    protected $table = 'matchs';
    public $timestamps = false;
    public $fillable = ['match_date','meteo', 'place', 'faults_nb', 'goals_nb', 'winner_id', 'team1_id', 'team2_id'];

    public function team()
    {
    	return $this->belongsTo('App\Teams');
    }
}
