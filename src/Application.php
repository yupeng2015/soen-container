<?php


namespace Soen\Container;


class Application
{
    public $context;
    function __construct($path)
    {
        $this->context = new ApplicationContext(new Container($path));
        \App::$app = $this;
        $this->context->getComponent('event');
    }
}