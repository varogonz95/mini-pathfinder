<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{

	public $timestamps = false;
	protected $fillable = [
		'name', 'redirects',
	];

	public function plot()
	{
		return $this->belongsTo('App\Models\Plot');
	}

	public function next()
	{
		return $this->belongsTo('App\Models\Plot', 'plot_redirect_id');
	}
	
	public function win()
	{
		return $this->belongsTo('App\Models\Plot', 'plot_win_id');
	}
	
	public function lose()
	{
		return $this->belongsTo('App\Models\Plot', 'plot_lose_id');
	}

	public function enemy()
	{
		return $this->belongsTo('App\Models\Character', 'character_id');
	}
	
}
