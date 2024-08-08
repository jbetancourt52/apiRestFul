<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Responses\ApiResponse;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        //--CONSULTA TODO
            // try {
            //     $products = Product::all();
            //     return ApiResponse::success($products);
            // } catch (\Exception $e) {
            //     return ApiResponse::error('Error al obtener los productos', ['exception' => $e->getMessage()]);
            // }
        //--

        //--CONSULTA PAGINADA
        $query = Product::query();

        //filtro por nombre
        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }
    
        // Filtrar por categoría
        if ($request->has('id_category')) {
            $query->where('id_category', $request->input('id_category'));
        }

        $perPage = $request->input('per_page', 10); // Número de resultados por página, con valor predeterminado de 10
        $products = $query->paginate($perPage);

        return ApiResponse::success($products, 'Productos listados exitosamente', 200);
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

    public function show($id)
    {
        try {
            // Buscar el producto por ID
            $product = Product::findOrFail($id);
    
            // Devolver la respuesta con los detalles del producto
            return ApiResponse::success($product, 'Producto encontrado', 200);
    
        } catch (\Exception $e) {
            return ApiResponse::error('Producto no encontrado', ['exception' => $e->getMessage()], 404);
        }
    }

    public function update(Request $request, $id)
    {
        
        try {
            // Validar los datos recibidos
          $request->validate([
              'name' => 'required|string|max:255',
              'description' => 'nullable|string',
              'cost' => 'required|numeric',
              'quantity' => 'required|integer',
              'id_category' => 'required|exists:categories,id',
              'status' => 'required|boolean',
              'date' => 'required|date',
          ]);

          // Buscar el producto por ID
          $product = Product::findOrFail($id);

          // Actualizar los datos del producto
          $product->update([
              'name' => $request->name,
              'description' => $request->description,
              'cost' => $request->cost,
              'quantity' => $request->quantity,
              'id_category' => $request->id_category,
              'status' => $request->status,
              'date' => $request->date
          ]);

          // Devolver la respuesta con el producto actualizado
          return ApiResponse::success($product, 'Producto actualizado exitosamente', 200);

      } catch (\Illuminate\Validation\ValidationException $e) {
          return ApiResponse::error('Error de validación', $e->errors(), 422);
      } catch (\Exception $e) {
          return ApiResponse::error('Error al actualizar el producto', ['exception' => $e->getMessage()]);
      }
    }

    public function destroy($id)
    {
        try {
            // Buscar el producto por ID
            $product = Product::findOrFail($id);
    
            // Eliminar el producto
            $product->delete();
    
            // Devolver una respuesta de éxito
            return ApiResponse::success(null, 'Producto eliminado exitosamente', 200);
    
        } catch (\Exception $e) {
            // Devolver una respuesta de error en caso de excepciones
            return ApiResponse::error('Error al eliminar el producto', ['exception' => $e->getMessage()], 404);
        }
    }
}
