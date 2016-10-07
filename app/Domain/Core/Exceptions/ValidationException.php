<?php

namespace App\Domain\Core\Exceptions;
use Illuminate\Http\Response;
use Illuminate\Validation\Validator;


/**
 * Class ValidationException
 * @package IPangan\Domain\Core\Exceptions
 */
class ValidationException extends Exception
{

    private $validator;
    const REASON = "ValidationException";
    const FIRST_INDEX = 0;
    const KEY_DOMAIN = 'domain';
    const KEY_REASON = 'reason';
    const KEY_MESSAGE = 'message';
    const KEY_CODE = 'code';
    const KEY_ERROR = 'error';
    const KEY_ERRORS = 'errors';

    /**
     * ValidationException constructor.
     * @param Validator $validator
     */
    public function __construct(Validator $validator)
    {
        parent::__construct();
        $this->message = config('constants.ERROR_MESSAGE.BAD_REQUEST');
        $this->code = Response::HTTP_BAD_REQUEST;
        $this->validator = $validator;
    }

    /**
     * @return array
     */
    private function generateErrorMessages()
    {
        $errors = [];
        $i = self::FIRST_INDEX;
        foreach ($this->validator->errors()->messages() as $key => $value) {
            if ($i == self::FIRST_INDEX) {
                $this->message = $value[self::FIRST_INDEX];
            }

            $error = array();
            $error[self::KEY_DOMAIN] = $key;
            $error[self::KEY_REASON] = self::REASON;
            $error[self::KEY_MESSAGE] = $value;
            $errors[$i] = (object)$error;
            $i++;
        }
        return $errors;
    }

    /**
     * @return array
     */
    public function getArrayMessage()
    {
        $errors = $this->generateErrorMessages();
        return [
            self::KEY_ERROR => [
                self::KEY_CODE => $this->code,
                self::KEY_MESSAGE => $this->message//,
                //self::KEY_ERRORS => $errors
            ]
        ];
    }
}