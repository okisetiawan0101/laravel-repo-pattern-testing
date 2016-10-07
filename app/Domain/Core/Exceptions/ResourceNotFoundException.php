<?php

namespace App\Domain\Core\Exceptions;

use Illuminate\Http\Response;

class ResourceNotFoundException extends Exception
{
    public function __construct($modelName)
    {
        parent::__construct();
        $this->message = $modelName . ' not found';
        $this->code = Response::HTTP_NOT_FOUND;
    }
}