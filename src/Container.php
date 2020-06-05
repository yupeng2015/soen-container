<?php


namespace Soen\Container;


use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    public $services = [];
    public $components = [];
    public $servicesPath = '';

    function __construct($path)
    {
        $server = new Server($path);
        $this->components = $server->load();
    }

    function get($id){
        return $this->components[$id];
    }

    /**
     * @param string $id
     * @return mixed
     */
    function getServer(string $id){
        return $this->services[$id];
    }

    public function has($id)
    {
        return isset($this->components[$id]);
    }

    public function hasServer($id)
    {
        return isset($this->services[$id]);
    }
    
    public function add($id, $component){
        $this->components[$id] = $component;
    }
    
    public function setServer($id, $componentObject){
        $this->services[$id] = $componentObject;
    }
}