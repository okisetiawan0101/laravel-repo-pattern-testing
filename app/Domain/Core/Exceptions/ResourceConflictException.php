<?php

namespace App\Domain\Core\Exceptions;


use Illuminate\Http\Response;

class ResourceConflictException extends Exception
{
    public function __construct($modelName)
    {
        $this->message = $modelName . ' already exist';
        $this->code = Response::HTTP_CONFLICT;
    }
}