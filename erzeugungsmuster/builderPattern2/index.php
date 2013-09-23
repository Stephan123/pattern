<?php
include_once('ProductBuilder.php');

$configArray = array(
    'type' => 'auto',
    'size' => 'max',
    'colour' => 'red',
    'produktName' => 'produkt1'
);

$builder = new ProductBuilder($configArray);
$produkt = $builder->getProdukt();

$test = 123;
