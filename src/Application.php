<?php


namespace Soen\Container;


class Application
{
    function __construct($path)
    {
        $this->context = new ApplicationContext(new Container($path));
        $this->context->getServer('event');
    }
}