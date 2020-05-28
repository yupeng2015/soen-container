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
        $this->filesystem = (new File())->createFilesystemIterator($path);
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
            if(isset($this->services[$config['name']])){
                throw new RuntimeException('组件名:' . $config['name'] . ',该组件已存在!');
            }
            $this->services[$config['name']] = $config;
        }
    }


}