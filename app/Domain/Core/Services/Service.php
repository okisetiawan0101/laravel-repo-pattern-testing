<?php

namespace App\Domain\Core\Services;
use App\Domain\Common\Helpers\JsonHelper;

/**
 * Class Service
 * @package IPangan\Domain\Core\Services
 */
class Service
{
    const KEY_DATA = 'data';
    const KEY_ITEMS = 'items';

    public function __construct()
    {

    }

    protected function wrapArrayWithData(array $arrays)
    {
        $allArrays = [];
        foreach ($arrays as $key => $value) {
            $allArrays = array_merge($allArrays, $arrays[$key]);
        }
        return [self::KEY_DATA => $allArrays];
    }

    protected function wrapResponse(array ...$arrays)
    {
        return JsonHelper::convertToCamelCase($this->wrapArrayWithData($arrays));
    }
}
