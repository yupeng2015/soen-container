<?php


namespace Soen\Container;


use Soen\Http\Server\Handler;

class Application
{
    public $context;
    function __construct($path)
    {
        $this->context = new ApplicationContext(new Container($path));
        \App::$app = $this;
    }

    function run(){
        context()->getComponent('httpServer')->up();
    }
}