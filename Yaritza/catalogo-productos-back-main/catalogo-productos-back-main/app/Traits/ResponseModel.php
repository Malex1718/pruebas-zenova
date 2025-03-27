<?php
namespace App\Traits;

trait ResponseModel
{
    public function successResponse($data, $message = "Operación exitosa", $statusCode = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }

    public function errorResponse($message = "Algo salió mal", $statusCode = 400)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => null
        ], $statusCode);
    }
}
