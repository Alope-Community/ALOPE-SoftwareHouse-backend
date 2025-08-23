<?php

namespace App\Helpers;

class ApiResponse
{
    public static function success($data = null, $message = 'Success', $code = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $data,
        ], $code);
    }

    public static function error($message = 'Error', $data = null, $code = 400)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data'    => $data,
        ], $code);
    }

    public static function validation($errors, $message = 'Validation failed', $code = 422)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors'  => $errors,
        ], $code);
    }

    public static function notFound($message = 'Resource not found', $code = 404)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data'    => null,
        ], $code);
    }

    public static function unauthorized($message = 'Unauthorized', $code = 401)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $code);
    }
}
