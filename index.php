<?php
loadComposer();
main();

function main()
{
    $app = new Application();
    $app->run();
}

function loadComposer()
{
    $autoloadPath = './vendor/autoload.php';
    if (!file_exists($autoloadPath)) {
        echo 'Questo programma usa Composer. Vedi https://getcomposer.org/ per maggiori dettagli.' . PHP_EOL;
        exit(1);
    }
    require $autoloadPath;
}
