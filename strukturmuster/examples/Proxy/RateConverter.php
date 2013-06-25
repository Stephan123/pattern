<?php
class RateConverter {
    protected $rates = array(
                            'usa' => 1.2,
                            'uk'  => 0.7
                        );

    public function getRate($country) {
        if (!isset($this->rates[$country])) {
            throw new Exception('Unbekanntes Zielland angegeben.');
        }
        return $this->rates[$country];
    }
}

$converter = new RateConverter();

$rate = $converter->getRate('usa');

print "Umrechnungskurs : {$rate}\n";

$euro   = 75;
$dollar = $euro * $rate;

printf("%.2f EUR sind umgerechnet %.2fUS$.\n", $euro, $dollar);
?>