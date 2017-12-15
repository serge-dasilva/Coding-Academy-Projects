<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    protected $table = 'players';
    public $timestamps = false;
    public $fillable = ['name', 'position', 'team_id'];

    public function team(){

    	return $this->belongsTo('App\Teams');
    }
}
