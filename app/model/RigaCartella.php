<?php

class RigaCartella {
    /** @var Cartella */
    protected $cartella;

    /** @var array */
    protected $numeri;

    /** @var array */
    protected $decineUsate;

    public function __construct(Cartella $cartella)
    {
        $this->cartella = $cartella;
        $this->numeri = array();
        $this->decineUsate = array();
    }

    public function generaNumeri()
    {
        do {
            $n = rand(1, 90);
            $d = $this->getDecina($n);
            if (!in_array($d, $this->decineUsate) && !$this->cartella->hasNumero($n)) {
                $this->numeri[] = $n;
                $this->decineUsate[] = $d;
            }
        } while (count($this->numeri) < 5);
    }

    public function getNumeri()
    {
        return $this->numeri;
    }

    public function hasNumero($n)
    {
        return in_array($n, $this->numeri);
    }

    // Nota: presume la buona fede dell'inserimento
    public function addNumero($num)
    {
        $this->numeri[] = $num;
        $this->decineUsate[] = $this->getDecina($num);
    }

    public function removeNumero($num)
    {
        foreach ($this->numeri as $index => $n) {
            if ($num === $n) {
                unset($this->numeri[$index]);
                return;
            }
        }
    }

    public function getNumeroFromDecina($decina)
    {
        foreach ($this->numeri as $numero) {
            $d = $this->getDecina($numero);
            if ($decina == $d) {
                return $numero;
            }
        }
        return null;
    }

    protected function getDecina($num)
    {
        $d = floor($num / 10);
        if ($num == 90) {
            $d = 8;
        }
        return $d;
    }
}