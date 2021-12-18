<?php

namespace App\Helper;


use App\Exceptions\NotSupportedException;
use ReflectionClass;


abstract class Enum
{
    const NONE = null;

    /**
     * @throws NotSupportedException
     */
    final  private function __construct()
    {
        throw new NotSupportedException('Constructor not supported for this class');
    }

    /**
     * @throws NotSupportedException
     */
    final private function __clone()
    {
        throw new NotSupportedException('Cloning not supported for this class');
    }

    final public static function toArray(): array
    {
        return (new ReflectionClass(static::class))->getConstants();
    }

    final public static function isValid(string $value): bool
    {
        return array_key_exists($value, static::toArray());
    }
}
