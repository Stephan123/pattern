<?php
$proxy = new SoapClient('http://www.xmethods.net/sd/2001/CurrencyExchangeService.wsdl');

$rate = $proxy->getRate('euro', 'usa');

print "Umrechnungskurs : {$rate}\n";

$euro   = 75;
$dollar = $euro * $rate;

printf("%.2f EUR sind umgerechnet %.2fUS$.\n", $euro, $dollar);
?>