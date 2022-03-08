<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

/**
 * Class CategoryController
 * @package App\Http\Controllers
 */
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('can:categories.index')->only('index');
        $this->middleware('can:categories.edit')->only('edit', 'update');
        $this->middleware('can:categories.create')->only('create', 'store');
        $this->middleware('can:categories.destroy')->only('destroy');
    }

    public function index()
    {
        $categories = Category::paginate(8);
        $title = "Categorias Noticias - DIF Acámbaro";
        return view('category.index', compact('categories', 'title'))
            ->with('i', (request()->input('page', 1) - 1) * $categories->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();
        $title = "Crear Categoria Noticias - DIF Acámbaro";
        return view('category.create', compact('category', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Category::$rules);

        $category = Category::create($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'La categoria se creó correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        $title = "Ver Categoria Noticias - DIF Acámbaro";
        return view('category.show', compact('category', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $title = "Editar Categoria Noticias - DIF Acámbaro";
        return view('category.edit', compact('category', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        request()->validate(Category::$rules);

        $category->update($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'La categoria se actualizó correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $category = Category::find($id)->delete();

        return redirect()->route('categories.index')
            ->with('success', 'La categoria se eliminó correctamente.');
    }
}
