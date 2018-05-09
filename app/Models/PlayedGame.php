<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayedGame extends Model
{

	public function plot()
	{
		return $this->belongsTo('App\Models\Plot', 'latest_plot_id');
	}

	public function player()
	{
		return $this->belongsTo('App\Models\Character', 'character_id');
	}

}
