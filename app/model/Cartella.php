<?php

class Cartella
{
    /** @var RigaCartella[] */
    protected $righe;

    public function __construct()
    {
        $this->righe = array();
    }

    public function popolaCartella()
    {
        for ($i = 0; $i <= 2; $i++) {
            $riga = new RigaCartella($this);
            $riga->generaNumeri();
            $this->righe[$i] = $riga;
        }
        $this->sortRighe();
    }

    public function hasNumero($n)
    {
        foreach ($this->righe as $riga) {
            if ($riga->hasNumero($n)) {
                return true;
            }
        }
        return false;
    }

    public function getRighe()
    {
        return $this->righe;
    }

    protected function sortRighe()
    {
        for ($i = 0; $i < 9; $i++) {
            $stessaDecina = array();
            /** @var RigaCartella[] $righeCoinvolte */
            $righeCoinvolte = array();
            foreach ($this->righe as $riga) {
                if ($n = $riga->getNumeroFromDecina($i)) {
                    $riga->removeNumero($n);
                    $stessaDecina[] = $n;
                    $righeCoinvolte[] = $riga;
                }
            }
            sort($stessaDecina);
            foreach ($righeCoinvolte as $index => $riga) {
                $riga->addNumero($stessaDecina[$index]);
            }
        }
    }

} 