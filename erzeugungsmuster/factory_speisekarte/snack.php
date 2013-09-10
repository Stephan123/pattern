<?php
include_once('speisekarte.php');

class snack implements speisekarte
{
    public function getMahlzeit(){
        echo 'Snack <br>';

        return;
    }
}
