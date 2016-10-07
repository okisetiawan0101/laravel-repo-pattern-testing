<?php
namespace App\Domain\Core\Exceptions;
use Illuminate\Http\Response;

/**
 * Class Exception
 * @package IPangan\Domain\Core\Exceptions
 */
class Exception extends \RuntimeException
{
    /**
     * Exceptions constructor.
     */
    public function __construct()
    {
        $this->message = config('constants.ERROR_MESSAGE.INTERNAL_SERVER_ERROR');
        $this->code = Response::HTTP_INTERNAL_SERVER_ERROR;
    }

    /**
     * @return array
     */
    public function getArrayMessage()
    {
        return [
            'error' => [
                'code' => $this->code,
                'message' => $this->message
            ]
        ];
    }
}