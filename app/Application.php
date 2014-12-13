<?php

class Application
{
    public function run()
    {
        $cartella = new Cartella();
        $cartella->popolaCartella();

        $view = new CartellaView();
        $view->setParam('cartella', $cartella);
        $view->output();
    }
} 