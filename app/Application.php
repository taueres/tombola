<?php

use model\Cartella;
use views\CartellaView;

class Application
{
    public function run()
    {
        $num = isset($_GET['num'])? intval($_GET['num']) : 1;
        if ($num < 1) {
            $num = 1;
        } elseif ($num > 6) {
            $num = 6;
        }

        $cartelle = array();
        for ($i = 1; $i <= $num; $i++) {
            $cartella = new Cartella();
            $cartella->popolaCartella();
            $cartelle[] = $cartella;
        }

        $view = new CartellaView();
        $view->setParam('cartelle', $cartelle);
        $view->output();
    }
} 
