<?php


namespace Soen\Container;


use http\Exception\RuntimeException;
use Soen\Filesystem\Dir;
use Soen\Filesystem\File;

class Server
{
    public $services;
    public $configArray;
    public $filesystem;
    function __construct($path)
    {
        $this->filesystem = new File($path);
    }

    /**
     * 载入所有服务配置
     * @return array
     */
    function load(){
        $this->configArray = $this->filesystem->readArrayFilesDeep();
        $this->parse($this->configArray);
        return $this->services;
    }

    function parse($configArray){
        foreach ($configArray as $config){
            $reflection = new \ReflectionClass($config['class']);
            if(isset($this->services[$config['name']])){
                throw new RuntimeException('服务名:' . $config['name'] . ',该服务已存在!');
            }
            $this->services[$config['name']] = $reflection->newInstanceArgs($config['property']);
        }
    }


}