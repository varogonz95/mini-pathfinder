<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
	protected $fillable = [
		'name', 'health', 'age', 'sex',
		'religion', 'hair', 'eyes',
		'will', 'strength', 'agility', 
		'pg', 'base_attack', 
	];
	
	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

	public function game()
	{
		return $this->belongsTo('App\Models\Game');
	}

	public function class()
	{
		return $this->belongsTo('App\Models\Classes', 'class_id');
	}
	
	public function armor()
	{
		return $this->belongsTo('App\Models\ArmourClass', 'armour_class_id');
	}
	
	public function race()
	{
		return $this->belongsTo('App\Models\Race');
	}

}
