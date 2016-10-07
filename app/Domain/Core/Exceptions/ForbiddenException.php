<?php

namespace App\Domain\Core\Exceptions;

use Illuminate\Http\Response;

class ForbiddenException extends Exception
{
    public function __construct()
    {
        parent::__construct();
        $this->message = config('constants.ERROR_MESSAGE.FORBIDDEN');
        $this->code = Response::HTTP_FORBIDDEN;
    }
}