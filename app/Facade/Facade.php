<?php

namespace App\Facade;

abstract class Facade
{
    public static function __callStatic($method, $args)
    {
        $instance = static::getClass();

        if (! $instance) {
            throw new RuntimeException('A facade root has not been set.');
        }

        return $instance->$method(...$args);
    }
}
