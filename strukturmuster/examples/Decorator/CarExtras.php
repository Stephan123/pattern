<?php
namespace de\phpdesignpatterns\vehicles\addons;

interface CarExtra {
    public function getAdditionalSpeed();
    public function getAdditionalRate();
}

class Spoiler implements CarExtra {
    public function getAdditionalSpeed() {
        return 15;
    }

    public function getAdditionalRate() {
        return 10;
    }
}
?>