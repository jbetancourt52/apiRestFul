<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Responses\ApiResponse;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // return Product::all();
        // return response()->json($producto);

        try {
            $products = Product::all();
            return ApiResponse::success($products);
        } catch (\Exception $e) {
            return ApiResponse::error('Error al obtener los productos', ['exception' => $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try{
    
            // Validar los datos recibidos
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'cost' => 'required|numeric',
                'quantity' => 'required|integer',
                'id_category' => 'required|exists:categories,id',// Validar que la categoría exista
                'status' => 'required|boolean',
                'date' => 'required|date'
            ]);

            $product = Product::create($request->all());
            return ApiResponse::success($product, 'Producto creado exitosamente', 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return ApiResponse::error('Error de validación', $e->errors(), 422);
        } catch (\Exception $e) {
            return ApiResponse::error('Error al crear el producto', ['exception' => $e->getMessage()]);
        }
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return response()->json($product, 200);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(null, 204);
    }
}
