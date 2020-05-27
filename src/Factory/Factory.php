<?php


namespace Soen\Container\Factory;


class Factory
{
    public static function create($class, array $parameters){
        $reflection = new \ReflectionClass($class);

    }
}