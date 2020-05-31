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

    public function successWithMsg($message, $data)
    {
        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => $message,
            'data' => $data
        ], 200);
    }

    public function loginFailedResponse($message)
    {
        return response()->json([
            'code' => Response::HTTP_UNAUTHORIZED,
            'message' => $message,
        ], 401);
    }
}