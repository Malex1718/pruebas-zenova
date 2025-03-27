<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Traits\ResponseModel;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    use ResponseModel;

    public function getProductos(Request $request): JsonResponse
    {
        $page = $request->query('page', 1);
        $limit = $request->query('limit', 5);
        $idCategory = $request->query('idCategory');


        try {
            $productos = Product::when($idCategory, function ($query, $idCategory) {
                return $query->where('category', $idCategory);
            })->paginate($limit, ['*'], 'page', $page)->appends($request->query());
            if ($productos->isEmpty()) {
                return $this->errorResponse('No se encontraron productos', 404);
            }
            return $this->successResponse($productos, 'Productos obtenidos con éxito');
        } catch (\Exception $e) {
            return $this->errorResponse('Ocurrió algún error', 500);
        }
    }

    public function buscarProducto(Request $request): JsonResponse
    {
        $page = $request->query('page', 1);
        $limit = $request->query('limit', 5);
        $termino = $request->query('q');


        try {
            $productos = Product::where('name', 'like', '%' . $termino . '%')->paginate($limit, ['*'], 'page', $page)->appends($request->query());
            if ($productos->isEmpty()) {
                return $this->errorResponse('No se encontraron productos', 404);
            }
            return $this->successResponse($productos, 'Productos obtenidos con éxito');
        } catch (\Exception $e) {
            return $this->errorResponse('Ocurrió algún error', 500);
        }
    }
    /**
     * Display the specified resource.
     */
    public function getProductoById($idProduct): JsonResponse
    {
        if (!isset($idProduct) || !is_numeric($idProduct)) {
            return $this->errorResponse('El id no es correcto', 400);
        }
        try {
            $producto = Product::with('productImages')->find($idProduct);
            if ($producto === null) {
                return $this->errorResponse('No se encontró el producto', 404);
            }
            $producto->makeVisible(['category', 'stock', 'description']);
            return $this->successResponse($producto, 'Producto obtenido con éxito');
        } catch (\Exception $e) {
            return $this->errorResponse('Ocurrió un error inesperado', 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
