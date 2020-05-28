<?php

class App
{
    /**
     * @var \Soen\Container\Application
     */
    public static $app;
    
    public static function getContext($id = null){
        return self::$app->context;
    }
    
    public static function getComponent($id){
        return self::$app->context->getComponent($id);
    }
}