<?php
include_once('speisekarte.php');

class abend implements speisekarte
{
    public function getMahlzeit(){
        echo 'Abendbrot <br>';

        return;
    }
}
