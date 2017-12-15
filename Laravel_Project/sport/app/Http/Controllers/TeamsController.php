<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Teams;
use App\Players;

class TeamsController extends Controller
{
    public function index()
    {
    	$teams = Teams::all();
    	return view('teams', ['teams' => $teams]); // equals to : return view('teams')->with(['teams' => $teams]);

    	/*$results = DB::table('teams')->select('name', 'country', 'flag', 'players_nb', 'ranking', 'matchs_won')->get()->first();
    	return view('teams', [
    		'name' => $results->name,
    		'country' => $results->country,
    		'flag' => $results->flag,
    		'players_nb' => $results->players_nb,
    		'ranking' => $results->ranking,
    		'matchs_won' => $results->matchs_won]);*/
    }

    //Show each teams by id
    public function show($id)
    {
        $team = Teams::find($id);
        $players = Players::where('team_id', $id)->get();
        if ($team == true)
        {
            return view ('team', ['team' => $team, 'players' => $players]);
        }
        else
        {
            return redirect('teams');
        }
        
    }
}
