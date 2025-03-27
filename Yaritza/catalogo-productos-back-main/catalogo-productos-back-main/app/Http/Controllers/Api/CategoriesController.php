<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ResponseModel;
use App\Models\Categorie;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    use ResponseModel;
    public function getCategorias()
    {
        try {
            $categories = Categorie::all();
            return $this->successResponse($categories, 'Categorías obtenidas con éxito');
        }
        catch (\Exception $e) {
            return $this->errorResponse('Ocurrió un error inesperado', 500);
        }
    }
}
