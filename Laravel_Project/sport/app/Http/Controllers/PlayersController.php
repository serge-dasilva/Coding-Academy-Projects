<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Players;
use App\Teams;
use App\PlayersStats;

class PlayersController extends Controller
{
   	public function index(){
	
	$gryff = Players::where('team_id', 1)->with('team')->get();
	$serp = Players::where('team_id', 2)->with('team')->get();
	$serd = Players::where('team_id', 3)->with('team')->get();
	$pouf = Players::where('team_id', 4)->with('team')->get();

	$flag_gryff = Teams::where('id', 1)->get();
	$flag_serp = Teams::where('id', 2)->get();
	$flag_serd = Teams::where('id', 3)->get();
	$flag_pouf = Teams::where('id', 4)->get();


    return view('players', ['gryff' => $gryff, 'serp' => $serp, 'serd' => $serd, 'pouf' => $pouf, 'flag_gryff' => $flag_gryff, 'flag_serp' => $flag_serp, 'flag_serd' => $flag_serd, 'flag_pouf' => $flag_pouf]);

   	}

    public function indexAdmin(){
    

    $gryff = Players::where('team_id', 1)->with('team')->get();
    $serp = Players::where('team_id', 2)->with('team')->get();
    $serd = Players::where('team_id', 3)->with('team')->get();
    $pouf = Players::where('team_id', 4)->with('team')->get();

    $flag_gryff = Teams::where('id', 1)->get();
    $flag_serp = Teams::where('id', 2)->get();
    $flag_serd = Teams::where('id', 3)->get();
    $flag_pouf = Teams::where('id', 4)->get();


    return view('players-admin', ['gryff' => $gryff, 'serp' => $serp, 'serd' => $serd, 'pouf' => $pouf, 'flag_gryff' => $flag_gryff, 'flag_serp' => $flag_serp, 'flag_serd' => $flag_serd, 'flag_pouf' => $flag_pouf]);

    }

   	public function add(){

   		    Players::create([
            'name' => $_POST['name'],
            'position' => $_POST['position'],
            'team_id' => $_POST['team_id'],
        ]);
   		    return redirect('players-admin');

   	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $player = Players::where('id', $id)->get();

        return view('edit-player', ['player' => $player]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        Players::where('id', $id)->update(['name' => $_POST['name']]);
        
        Players::where('id', $id)->update(['position' => $_POST['position']]);
        
        Players::where('id', $id)->update(['team_id' => $_POST['team_id']]);

        return redirect('players-admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Players::where('id', $id)->delete();

        return redirect('players-admin');
    }

}
