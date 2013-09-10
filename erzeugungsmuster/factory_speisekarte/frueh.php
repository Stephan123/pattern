<?php
include_once('speisekarte.php');

class frueh implements speisekarte
{
    public function getMahlzeit(){
        echo 'Fruehstueck <br>';

        return;
    }
}
