<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plot extends Model
{

	public $timestamps = false;
	
    protected $fillable = [
        'name', 'description',
    ];

	public function game()
	{
		return $this->belongsTo('App\Models\Game');
	}

	public function next() {
		return $this->belongsTo('App\Models\Plot', 'plot_id');
	}

	public function options()
	{
		return $this->hasMany('App\Models\Option');
	}
	
}
