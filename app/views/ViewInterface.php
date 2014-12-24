<?php
namespace views;

interface ViewInterface
{
    public function output();

    public function setParam($name, $value);
}
