<?php

namespace App\Http\Controllers\Super;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\Category;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('solosuper',['only'=>['index']]);
    }

    public function index()
    {   
        $categories = Category::all();
        return view('SuperAdmin.categories.index', ['categories' => $categories]);
    }

    public function store(Request $request)
    {   
        $newCategory = new Category();
        $newCategory->titulo = $request->titulo;
        echo "ya casi $newCategory->titulo ha sido guardada";
        $newCategory->save();
        return redirect()->back();
    }

    public function update(Request $request, $categoryId)
    {   
        $category = category::find($categoryId);

        $category->titulo = $request->titulo;
        $category->save();
        
        return redirect()->back()->with('actualizar', 'ok');
    }

    public function delete(Request $request, $categoryId)
    {
        $category = Category::find($categoryId);

        $category->titulo = $request->titulo;
        $category->delete();
        
        return redirect()->back()->with('eliminar', 'ok');
    }

}
