<?php
namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser{

    public function createdSuccessWithMsg($message, $data)
    {
        return response()->json([
            'code' => Response::HTTP_CREATED,
            'message' => $message,
            'data' => $data
        ], 201);
    }
}