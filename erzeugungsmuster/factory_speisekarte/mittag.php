<?php
include_once('speisekarte.php');

class mittag implements speisekarte
{
    public function getMahlzeit(){
        echo 'Mittagessen <br>';

        return;
    }
}
