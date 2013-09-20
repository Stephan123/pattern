<?php
/**
 * ProductBuilder
 *
 * @author Stephan.Krauss
 * @date 20.11.2013
 * @file ProjectBuilder.php
 */

include_once('Product.php');

class ProductBuilder
{
    /**
     * @var
     */
    protected $product;

    /**
     * @var array
     */
    protected $config = array();

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->product = new Product();
        $this->setConfig($config);
    }

    /**
     * Process some configuration parameters
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
     * Build the product using the supplied configuration parameters
     *
     * @return null
     */
    public function build()
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
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }
}