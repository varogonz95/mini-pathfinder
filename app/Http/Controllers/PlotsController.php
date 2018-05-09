<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Plot;
use App\Models\Race;
use App\Models\Option;
use App\Models\Classes;
use App\Models\Character;
use App\Models\ArmourClass;

use Illuminate\Http\Request;

class PlotsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($game)
    {
        return view('plots.create', ['game' => $game]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$game = Game::find($request->game_id);

		$hashes = collect();
		$enemy_hashes = collect();

		$plots_request = collect($request->all()['plots']);
		$enemies_request = collect($request->all()['enemies']);
		
		$enemies_request->each(function($item) use (&$hashes, &$enemy_hashes, $game) {
			$enemy = new Character($item);
			$enemy->sex = filter_var($item['sex'], FILTER_VALIDATE_BOOLEAN);
			$enemy->class()->associate($item['class']['id']);
			$enemy->armor()->associate($item['armor']['id']);
			$enemy->race()->associate($item['race']['id']);

			$enemy_hashes[] = ['hash' => $item['$hash'], 'data' => $game->enemies()->save($enemy)];
		});

		$plots_request->each(function($item) use (&$hashes, $game) {
			$hashes[] = ['hash' => $item['$hash'], 'data' => $game->plots()->save(new Plot($item))];
		});

		$plots_request->each(function($item, $index) use (&$hashes, $game) {
			$search = $hashes->search(function ($hash) use ($item) { return isset($hash['hash']) && $hash['hash'] === $item['next']['$hash']; });
			if (!is_null($item['next'])) {
				$plot = $hashes[$index]['data'];
				$plot->next()->associate($hashes[$search]['data']);
				$plot->save();
			}
		});

		$plots_request->each(function($item, $i) use (&$hashes, &$enemy_hashes, $game) {
			
			if (!empty($item['options'])) {

				$options = collect($item['options']);
				
				$options->each(function($item) use (&$hashes, &$enemy_hashes, $i) {
					$win = $hashes->search(function ($hash) use ($item) { return isset($hash['hash']) && isset($item['wins']) && $hash['hash'] === $item['wins']['$hash']; });
					$lose = $hashes->search(function ($hash) use ($item) { return isset($hash['hash']) && isset($item['loses']) && $hash['hash'] === $item['loses']['$hash']; });
					$redirect = $hashes->search(function ($hash) use ($item) { return isset($hash['hash']) && isset($item['next']) && $hash['hash'] === $item['next']['$hash']; });
					$enemy = $enemy_hashes->search(function ($hash) use ($item) { return isset($hash['hash']) && isset($item['enemy']) && $hash['hash'] === $item['enemy']['$hash']; });

					$option = $hashes[$i]['data']->options()->save(new Option($item));
					
					if (!isset($item['next']) && ($win || $lose)) {
						$option->win()->associate($hashes[$win]['data']);
						$option->lose()->associate($hashes[$lose]['data']);
						$option->enemy()->associate($enemy_hashes[$enemy]['data']);
					}
					else if ($redirect) {
						$option->redirects = isset($item['next']);
						$option->next()->associate($hashes[$redirect]['data']);
					}

					$option->save();
				});
			}

		});

        return response()->json(['status' => true]);
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
