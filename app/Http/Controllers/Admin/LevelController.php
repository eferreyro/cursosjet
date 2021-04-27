<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Level;
class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //traigo todos los elementos de la tabla levels
        $levels = Level::all();
        //retorno la vista index de niveles
        return view('admin.levels.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.levels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|unique:levels'
        ]);
        $level = Level::create($request->all());
        return redirect()->route('admin.levels.edit', $level)->with('info', 'El nivel se ha creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Level $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        //
        return view('admin.levels.show', compact('level'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Level $level
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        //
        return view('admin.levels.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Level $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
        //
        $request->validate([
            'name' => 'required|unique:levels,name,' . $level->id
        ]);
        $level->update($request->all());
        return redirect()->route('admin.levels.edit', $level)->with('info', 'El nivel se ha editado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Level $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        //
        $level->delete();
        return redirect()->route('admin.levels.index', $level)->with('info', 'El nivel se ha eliminado con exito');
    }
}
