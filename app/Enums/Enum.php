<?php

namespace App\Enums;


use App\Exceptions\NotSupportedException;
use ReflectionClass;


abstract class Enum
{
    const NONE = null;

    /**
     * @throws NotSupportedException
     */
      private function __construct()
    {
        throw new NotSupportedException('Constructor not supported for this class');
    }

    /**
     * @throws NotSupportedException
     */
     private function __clone()
    {
        throw new NotSupportedException('Cloning not supported for this class');
    }

     public static function toArray(): array
    {
        return (new ReflectionClass(static::class))->getConstants();
    }

     public static function isValid(string $value): bool
    {
        return array_key_exists($value, static::toArray());
    }
}
