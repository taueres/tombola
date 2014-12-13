<?php
require './app/Autoloader.php';

main();

function main() {
    Autoloader::initialize();
    spl_autoload_register('Autoloader::autoload');

    $app = new Application();
    $app->run();
}
