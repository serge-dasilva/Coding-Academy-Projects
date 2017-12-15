<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Players;
use App\Teams;
use App\PlayerStats;
use App\Http\Controllers\PlayersController;

class PlayerStatsController extends Controller
{
    public function selectPlayer($id)
    {
        $stats = PlayerStats::where('player_id', $id)->get();
        $datas = Players::where('id', $id)->get();
        return view('select-player', ['stats' => $stats, 'datas' => $datas]);
    }
}
