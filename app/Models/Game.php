<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
	protected $fillable = ['title', 'description'];

	public function user() {
		return $this->belongsTo('App\Models\User');
	}

	public function plots() {
		return $this->hasMany('App\Models\Plot');
	}

	public function enemies() {
		return $this->hasMany('App\Models\Character')->where('user_id', null);
	}

	public function player() {
		return $this->hasMany('App\Models\Character')->where('user_id', '<>', null);
	}
}
