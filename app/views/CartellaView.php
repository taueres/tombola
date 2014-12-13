<?php

class CartellaView extends ViewAbstract
{

    public function output()
    {
        /** @var Cartella $cartella */
        $cartella = $this->params['cartella'];
        $righe = $cartella->getRighe();

        $html = <<<EOS
<html>
<head>
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
<h1>Generazione cartella per tombola</h1>
<table>
EOS;

        foreach ($righe as $riga) {
            $html .= "<tr>\n";
            $celle = $this->getCelleFromNumeri($riga->getNumeri());
            foreach ($celle as $cella) {
                $text = $cella ?: "&nbsp;";
                $html .= "<td>$text</td>\n";
            }
            $html .= "</tr>\n";
        }
        $html .= <<<EOS
</table>
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

}