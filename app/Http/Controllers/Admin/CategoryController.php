<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Request\CategoryRequest;
use App\Http\Request\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function indexContent(Request $request)
    {
        $query = Category::all();

        return response()->json([
            'data' => $query
        ]);
    }

    public function create(){
        return view('admin.category.upsert');
    }

    public function createPost(CategoryRequest $request)
    {
        $category = new Category();
        $category->fill($request->all());

        if (!$category->save()) {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo guardar la categoría'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Guardado correctamente'
        ]);

    }

    public function update($categoryId){
        $category = Category::find($categoryId);
        return view('admin.category.upsert',['category' => $category]);
    }

    public function updatePost(UpdateCategoryRequest $request, $categoryId)
    {
        $category = Category::find($categoryId);

        $category->fill($request->all());


        if (!$category->save()) {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo guardar la categoría'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Guardado correctamente'
        ]);
    }

    public function active($categoryId)
    {
        $category = Category::find($categoryId);
        $category->active = !$category->active;
        if (!$category->save()) {
            return response()->json([
                'success' => false,
                'message' => 'no se puede modificar el estatus en este momento'
            ]);
        }
        return response()->json([
            'success' => true,
        ]);
    }

    public function delete($categoryId)
    {
        $category = Category::find($categoryId);

        if (!$category->delete()) {
            return response()->json([
                'success' => false,
                'message' => 'no se puede modificar el estatus en este momento'
            ]);
        }
        return response()->json([
            'success' => true,
        ]);
    }
}
