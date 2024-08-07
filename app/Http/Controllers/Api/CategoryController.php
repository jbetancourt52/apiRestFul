<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Responses\ApiResponse;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // return Product::all();
        // return response()->json($producto);

        try {
            $categories = Category::all();
            return ApiResponse::success($categories);
        } catch (\Exception $e) {
            return ApiResponse::error('Error al obtener las categorias', ['exception' => $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try{
    
            // Validar los datos recibidos
            $request->validate([
                'name' => 'required|string|max:255'
            ]);

            $category = Category::create($request->all());
            return ApiResponse::success($category, 'Categoria creada exitosamente', 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return ApiResponse::error('Error de validación', $e->errors(), 422);
        } catch (\Exception $e) {
            return ApiResponse::error('Error al crear la categoria', ['exception' => $e->getMessage()]);
        }
    }

    public function show(Product $category)
    {
        return $category;
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return response()->json($category, 200);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(null, 204);
    }
}
