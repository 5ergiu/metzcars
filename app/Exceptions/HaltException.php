<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class HaltException extends Exception
{
    /**
     * Report the exception.
     * @param Exception $exception
     * @return void
     */
    public function report(Exception $exception): void
    {
        Log::error($exception->getMessage(), ['file' => $exception->getFile(), 'line' => $exception->getLine()]);
    }

    /**
     * Render the exception into an HTTP response.
     * @return Response
     */
    public function render(): Response
    {
        $error = ['error' => $this];

        if (config('app.env') === 'prod') {
            $error = [];
        }

        return response()->view('errors.halt', $error);
    }
}
