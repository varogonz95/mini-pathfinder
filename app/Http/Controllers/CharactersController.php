<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Race;
use App\Models\ArmourClass;
use App\Models\Classes;
use App\Models\Character;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CharactersController extends Controller
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
        return view('characters.create', [
			'game' => $game, 
			'races' => Race::all(),
			'classes' => Classes::all(),
			'armors' => ArmourClass::all(),
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$character = new Character($request->all());
		$character->sex = filter_var($request->sex, FILTER_VALIDATE_BOOLEAN);
		$character->user()->associate(Auth::user());
		$character->game()->associate($request->game);
		$character->armor()->associate($request->armor);
		$character->class()->associate($request->class);
		$character->race()->associate($request->race);
		$character->save();

		return redirect()->route('games.start', $request);
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
