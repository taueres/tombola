<?php

class Autoloader
{
    public static $mapper = array(
        'Application' => 'app/Application.php',
        'Cartella' => 'app/model/Cartella.php',
        'RigaCartella' => 'app/model/RigaCartella.php',
        'CartellaView' => 'app/views/CartellaView.php',
        'ViewInterface' => 'app/views/ViewInterface.php',
        'ViewAbstract' => 'app/views/ViewAbstract.php',
    );

    public static $baseDir;

    public static function autoload($className)
    {
        if(isset(self::$mapper[$className])) {
            $path = self::$baseDir . DIRECTORY_SEPARATOR . self::$mapper[$className];
            include $path;
        }
    }

    public static function initialize()
    {
        self::$baseDir = dirname(__DIR__);
        if (DIRECTORY_SEPARATOR != '/') {
            foreach (self::$mapper as $key => &$value) {
                $value = str_replace('/', DIRECTORY_SEPARATOR, $value);
            }
        }
    }

}