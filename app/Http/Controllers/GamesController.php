<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Plot;
use App\Models\Race;
use App\Models\Classes;
use App\Models\ArmourClass;
use App\Models\PlayedGame;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view()
	}
	
	public function start(Request $request)
	{
		$characters = Auth::user()->load(['characters.game'])->characters;

		//* If use has no players at all
		if (empty($characters->all()))
			return redirect()->route('characters.create', ['game' => $request->game]);
		else {
			foreach ($characters as $character)
				if ($character->game_id == $request->game)
					return redirect()->route('games.next', ['game' => $request->game]);
		}	

		return redirect()->route('characters.create', ['game' => $request->game]);
	}

	public function next($id) {

		$playedGame = Auth::user()->playedGames->load('player.game')->pluck('player.game')->first();
		$game = Game::with('player')->find($id);

		if (is_null($playedGame) || $game->id !== $playedGame['id']) {
			$plot = Plot::whereHas('game', function ($game) use ($id) {
				$game->where('id', $id);
			})->first();
			$played = new PlayedGame();
			$played->plot()->associate($plot);
			$played->player()->associate($game->player->first());
			$played->save();

			return view('games.plot', ['plot' => $plot]);
		}

		else if ($game->id === $playedGame['id']) {
			$latest = Auth::user()->playedGames()->whereHas('player', function($player) use ($game){
				$player->where('id', $game->player->first()->id);
			})->first()->load(['plot.options'])->plot;

			return view('games.plot', ['plot' => $latest]);
			// return view('games.plot', ['plot' => $latest;
		}

	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$game = Auth::user()->games()->save(new Game($request->all()));
		$request->session()->put('user.game', $game);

		// Game creation succeeds
		if ($game->id)
			return redirect()->route("plots.create", ['game' => $game->id]);
		
		// Game creation fails
		else return 'Fails';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
