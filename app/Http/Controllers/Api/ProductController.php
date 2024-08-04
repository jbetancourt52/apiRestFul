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

    // public function store(Request $request)
    // {
    //     $product = Product::create($request->all());
    //     return response()->json($product, 201);
    // }

    public function store(Request $request)
    {
        try{
    
            // Validar los datos recibidos
            $request->validate([
                'pro_nombre' => 'required|string|max:255',
                'pro_descripcion' => 'nullable|string',
                'pro_costo' => 'required|numeric',
                'pro_cantidad' => 'required|integer',
                'pro_categoria' => 'nullable|string',
                'pro_estado' => 'required|boolean',
            ]);

            // Crear un nuevo producto
            // $product = Product::create([
            //     'pro_nombre' => $request->pro_nombre,
            //     'pro_descripcion' => $request->pro_descripcion, 
            //     'pro_costo' => $request->pro_costo,
            //     'pro_cantidad' => $request->pro_cantidad,
            //     'pro_categoria' => $request->pro_categoria,
            //     'pro_estado' => $request->pro_estado,
            // ]);

            // Devolver la respuesta con el producto creado
            //return response()->json($product, 201);

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
