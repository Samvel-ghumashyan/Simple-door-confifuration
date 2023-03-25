<?php


namespace dconf;


abstract class Model
{

    public function __construct()
    {
        Db::getInstance();
    }

}