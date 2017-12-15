<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matches;
use App\Teams;
use Illuminate\Support\Facades\DB;

class MatchesController extends Controller
{
    public function index()
    {
        $teams = Teams::all();
    	$matches = Matches::all();
    	$match = DB::table('matchs')
            ->join('teams as t1', 'matchs.team1_id', '=', 't1.id')
            ->join('teams as t2', 'matchs.team2_id', '=', 't2.id')
            ->select('matchs.*', 't1.name as team1', 't2.name as team2')
            ->get();
    	return view('matches', ['match' => $match, 'matches' => $matches, 'teams' => $teams]);
    }

    public function results($id)
    {
        $playersTeam1 = DB::table('matchs')
            ->join('teams', 'matchs.team1_id', '=', 'teams.id')
            ->join('players', 'teams.id', '=', 'players.team_id')
            ->select('players.name', 'players.position', 'teams.flag')
            ->orderBy('players.position')
            ->where('matchs.id', $id)
            ->get();

        $playersTeam2 = DB::table('matchs')
            ->join('teams', 'matchs.team2_id', '=', 'teams.id')
            ->join('players', 'teams.id', '=', 'players.team_id')
            ->select('players.name', 'players.position', 'teams.flag')
            ->orderBy('players.position')
            ->where('matchs.id', $id)
            ->get();
        
        $match = DB::table('matchs')
            ->join('teams as t1', 'matchs.team1_id', '=', 't1.id')
            ->join('teams as t2', 'matchs.team2_id', '=', 't2.id')
            ->join('teams as t3', 'matchs.winner_id', '=', 't3.id')
            ->select('matchs.*', 't1.name as team1', 't2.name as team2', 't3.name as winner', 't3.flag as flag')
            ->where('matchs.id', $id)
            ->get();
        if ($match == true)
        {
            return view('results', ['match' => $match, 'playersTeam1' => $playersTeam1, 'playersTeam2' => $playersTeam2]);
        }
        else
        {
            return redirect('matches');
        }
    }

    public function create()
    {
        $idTeam1 = DB::table('teams')
            ->select('id')
            ->where('name', $_POST['team1'])
            ->get()->first();

        $idTeam2 = DB::table('teams')
            ->select('id')
            ->where('name', $_POST['team2'])
            ->get()->first();

        Matches::create([
            'match_date' => $_POST['match_date'],
            'meteo' => $_POST['meteo'],
            'place' => $_POST['place'],
            'faults_nb' => 0,
            'goals_nb' => 0,
            'winner_id' => 0,
            'team1_id' => $idTeam1->id,
            'team2_id' => $idTeam2->id
        ]);
        return redirect('matches');
    }

    public function delete($id)
    {
        Matches::destroy($id);
        return redirect('matches');
    }

    public function setResults($id)
    {
        $matchTeam = DB::table('matchs')
            ->join('teams as t1', 'matchs.team1_id', '=', 't1.id')
            ->join('teams as t2', 'matchs.team2_id', '=', 't2.id')
            ->select('matchs.*', 't1.name as team1', 't2.name as team2')
            ->where('matchs.id', $id)
            ->get();
        return view('setresults', ['matchTeam' => $matchTeam]);
    }

    public function confirmresults($id)
    {
        $idWinner = DB::table('teams')
            ->select('id')
            ->where('name', $_POST['winner'])
            ->get()->first();
        $conf = DB::table('matchs')
        ->where('id', $id)
        ->update(['faults_nb' => $_POST['faults_nb'], 'goals_nb' => $_POST['goals_nb'], 'winner_id' => $idWinner->id]);
        return redirect('matches');
    }
}
