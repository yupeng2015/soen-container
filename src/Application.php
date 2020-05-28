<?php


namespace Soen\Container;


class Application
{
    public $context;
    function __construct($path)
    {
        $this->context = new ApplicationContext(new Container($path));
        \App::$app = $this;
        var_dump(\App::$app->context->getComponent('router'));
//        $this->context->getComponent('event');
    }

    function run(){
//        \App::getComponent('router')->test();
    }
}