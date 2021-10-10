<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;
use Throwable;

class LoggerHelper
{
    public function __construct(
        Throwable $error,
    ) {
        Log::error($error->getMessage() . $error->getTraceAsString(), ['file' => $error->getFile(), 'line' => $error->getLine()]);
    }
}
