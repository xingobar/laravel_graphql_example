<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;
use Throwable;

class NotFoundHttpException extends Exception
{
    public function __construct($message = "找不到資料", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function render()
    {
        return \response()->json([
           'code' => 4000,
           'message' => $this->message
        ], Response::HTTP_NOT_FOUND);
    }
}
