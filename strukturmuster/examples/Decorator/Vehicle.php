<?php
namespace de\phpdesignpatterns\vehicles;

interface Vehicle {
    public function startEngine();
    public function moveForward($miles);
    public function stopEngine();
    public function getMilage();
    public function getDailyRate($days = 1);
    public function getManufacturer();
    public function getColor();
    public function getMaxSpeed();
}
?>