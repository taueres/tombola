<?php

abstract class ViewAbstract implements ViewInterface
{
    protected $params;

    public function __construct()
    {
        $this->params = array();
    }

    public function setParam($name, $value)
    {
        $this->params[$name] = $value;
    }

} 