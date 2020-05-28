<?php


namespace Soen\Container;


use Psr\Container\ContainerInterface;

class ApplicationContext
{
    public $container;
    function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param $name
     * @return object
     * @throws \ReflectionException
     */
    function getComponent($name){
        $componentConfig = $this->container->get($name);
        $reflection = new \ReflectionClass($componentConfig['class']);
        $componentObject = $reflection->newInstanceArgs($componentConfig['args']);
        return $componentObject;
    }
    
}