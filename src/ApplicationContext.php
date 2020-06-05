<?php


namespace Soen\Container;


use Psr\Container\ContainerInterface;

class ApplicationContext
{
    /**
     * @var Container
     */
    public $container;
    function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function getComponentServer($name){
        return $this->container->getServer($name);
    }

    public function setComponentServer($name, array $args = []){
        $component = $this->container->get($name);
        $reflection = new \ReflectionClass($component['class']);
        $componentObject = $reflection->newInstanceArgs($args);
        $this->container->setServer($name, $componentObject);
    }
    
    /**
     * @param $name
     * @return object
     * @throws \ReflectionException
     */
    function getComponent($name, array $args = []){
        $component = $this->container->get($name);
        $reflection = new \ReflectionClass($component['class']);
        if (!empty($args)){
            $component['args'] = $args;
        }
        $componentObject = $reflection->newInstanceArgs($component['args']);
        return $componentObject;
    }

    /**
     * @param $name
     * @param array $args
     * @throws \ReflectionException
     */
//    public function setComponent($name, array $args = []){
//        $component = $this->container->get($name);
//        $reflection = new \ReflectionClass($component['class']);
//        $componentObject = $reflection->newInstanceArgs($args);
//        $this->container->setServer($name, $componentObject);
//    }
    
}