<?php


namespace dconf;


trait TSingleton
{

    private static ?self $instance = null;

    private function __construct(){}

    public static function getInstance(): self
    {
        return static::$instance ?? static::$instance = new static();
    }

}