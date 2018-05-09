<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
	];
	
	public function games()
	{
		return $this->hasMany('App\Models\Game');
	}

	public function characters()
	{
		return $this->hasMany('App\Models\Character');
	}

	public function playedGames()
	{
		return $this->hasManyThrough('App\Models\PlayedGame', 'App\Models\Character');
	}
}
