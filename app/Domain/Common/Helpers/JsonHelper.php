<?php

namespace App\Domain\Common\Helpers;

class JsonHelper
{
    public static function convertToCamelCase($initialArray)
    {
        $returnArray = [];
        foreach ($initialArray as $key => $value) {
            $tempArray = $value;
            if (is_array($tempArray)) {
                $value = self::convertToCamelCase($tempArray);
            } elseif (is_object($tempArray)) {
                $value = self::convertToCamelCase((array)$tempArray);
            }
            $returnArray[camel_case($key)] = $value;
        }
        return $returnArray;
    }
}