<?php


namespace Soen\Container;


use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    public $services = [];
    public $servicesPath = '';

    function __construct($path)
    {
        $server = new Server($path);
        $this->services = $server->load();
    }

    function get($id){
        return $this->services[$id];
    }

    public function has($id)
    {
        return isset($this->services[$id]);
    }
}