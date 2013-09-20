<?php
include_once('ProductBuilder.php');

$configArray = array(
    'type' => 'auto',
    'size' => 'max',
    'colour' => 'red'
);

$builder = new ProductBuilder($configArray);
$builder->build();
$produkt = $builder->getProduct();

// $test = 123;
