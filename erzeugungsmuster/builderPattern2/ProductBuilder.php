<?php
/**
 * Builder Pattern nach Variante 'Beans'
 *
 * @author Stephan.Krauss
 * @date 20.11.2013
 * @file ProjectBuilder.php
 */

include_once('Product.php');

class ProductBuilder
{
    // neues Objekt
    protected $product;

    // Konfiguration
    protected $config = array();

    /**
     * Constructor übernimmt die Pflicht - Eigenschaften, die in dem zu erzeugenden Objekt unbedingt vorhanden sein müssen.
     *
     * + Builder kontrolliert das Vorhandensein der Pflichtparameter
     * + erstellt neues Produkt
     * + speichern Pflicht - Parameter im neuen Produkt
     * + speichern optionale Parameter im Builder
     * + speichern optionale Parameter im neuen Produkt
     * + testen der Abhängigkeiten im neuen Produkt
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        // Builder kontrolliert das Vorhandensein der Pflichtparameter
        if( (!array_key_exists('colour', $config)) or (!array_key_exists('produktName', $config)) )
            throw new Exception();

        // erstellt neues Produkt
        $this->buildProdukt($config['produktName']);

        // speichern Pflicht - Parameter im neuen Produkt
        $this->product->setColour($config['colour']);

        // speichern optionale Parameter im Builder
        $this->setConfig($config);

        // speichern optionale Parameter im neuen Produkt
        $this->build();

        // testen der Abhängigkeiten im neuen Produkt
        $this->product->checkDependencies();
    }

    /**
     * Instanz des neuen Produktes
     *
     * + erstellt entsprechend der Vorgabe ein neues Produkt
     *
     * @param $produktName
     */
    protected function buildProdukt($produktName)
    {
        switch($produktName){
            case 'produkt1':
                $this->product = new Product();
                break;
            case 'produkt2':
                $this->product = new ProductAbc();
                break;
        }

        return;
    }

    /**
     * speichert die Konfigurationsparameter
     *
     * @param array $config
     */
    protected function setConfig(array $config)
    {
        $defaults = array(
            'colour' => 'blue',
            'size' => 100,
            'type' => false,
        );

        $config =  array_replace($defaults, $config);
        $this->config = $config;
    }

    /**
     * Erstellt das neue Produkt
     *
     * @return null
     */
    private function build()
    {
        foreach ($this->config as $option => $value) {
            // erstellen Methoden Name
            $method = sprintf('set%s', ucfirst($option));

            // wenn die Methode im Objekt existiert
            if (method_exists($this->product, $method) === true) {
                // ruft die Methode im Objekt auf und übergibt den Inhalt
                call_user_func(array($this->product, $method), $value);
            }
        }
    }

    /**
     * Gibt das neue Produkt zurück
     *
     * @return object
     */
    public function getProdukt()
    {
        return $this->product;
    }
}