<?php
namespace views;

use model\Cartella;

class CartellaView extends ViewAbstract
{

    public function output()
    {
        /** @var Cartella[] $cartelle */
        $cartelle = $this->params['cartelle'];
        $html = <<<EOS
<html>
<head>
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
<h1>Generazione cartella per tombola</h1>
EOS;
        foreach ($cartelle as $cartella) {
            $html .= $this->getTableFromCartella($cartella);
        }

        $html .= <<<EOS
</body>
</html>
EOS;

        echo $html;
    }

    private function getCelleFromNumeri(array $numeri)
    {
        $out = array_fill(0, 9, 0);
        foreach ($numeri as $num) {
            $i = floor($num / 10);
            if ($num == 90) {
                $i = 8;
            }
            $out[$i] = $num;
        }
        return $out;
    }

    private function getTableFromCartella(Cartella $cartella)
    {
        $html = '<table>' . PHP_EOL;
        $righe = $cartella->getRighe();
        foreach ($righe as $riga) {
            $html .= "<tr>\n";
            $celle = $this->getCelleFromNumeri($riga->getNumeri());
            foreach ($celle as $cella) {
                $text = $cella ?: "&nbsp;";
                $html .= "<td>$text</td>\n";
            }
            $html .= "</tr>\n";
        }
        $html .= '</table>' . PHP_EOL;

        return $html;
    }

}
