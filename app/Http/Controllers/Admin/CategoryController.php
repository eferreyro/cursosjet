<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Creo una variable categories y le paso todo el listado de categorias desde el modelo Category
        $categories = Category::all();
        //retornamos una vista y le paso las categorias
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //retornamos una vista
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Metodo que recibe los datos de la creacion de una nueva categoria.
        $request->validate([
            'name' => 'required|unique:categories'
        ]);
        //Creo un nuevo registro y lo almaceno en una nueva variable llamada cetegory
        $category = Category::create($request->all());
        return redirect()->route('admin.categories.edit', $category)->with('info', 'La categoria se ha creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //retornamos una vista
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int Instancia del modelo Category llamada $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //retornamos una vista
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Instancia del modelo Category llamada $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //Metodo que recibe los datos de la creacion de una nueva categoria.
        $request->validate([
            'name' => 'required|unique:categories,name,'. $category->id
        ]);
        //Creo un nuevo registro y lo almaceno en una nueva variable llamada cetegory
        $category->update($request->all());

        //Redirecciono a la ruta edit nuevamente
        return redirect()->route('admin.categories.edit', $category)->with('info', 'La categoria se ha actualizado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int Instancia del modelo Category llamada $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        //Redirecciono a la ruta delete nuevamente
        return redirect()->route('admin.categories.index')->with('info', 'La categoria se ha eliminado con exito');

    }
}
