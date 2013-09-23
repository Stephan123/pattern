<?php
/**
 * Product.php
 *
 * @author Stephan.Krauss
 * @date 20.14.2013
 * @file Product.php
 */
class Product
{
    /**
     * Pflichtparameter
     *
     * @var string
     */
    protected $type = '';

    /**
     * optionaler Parameter
     *
     * @var string
     */
    protected $size = '';

    /**
     * optionaler Parameter
     *
     * @var string
     */
    protected $colour = '';

    // Flags

    // möglicher Pflichtzustand der Farbe / Colours
    protected $colourCheck = array(
        'red',
        'blue',
        'green',
        'yellow'
    );

    /**
     * Kontrolle der Abhängigkeiten des Produktes
     *
     */
    public function checkDependencies()
    {
        if($this->size != 'max' or $this->colour != 'red')
            throw new Exception();

        return;
    }

    /**
     * setzen Pflichtparameter und Kontrolle des Parameter
     *
     * @param string $colour
     */
    public function setColour($colour)
    {
        if(!in_array($colour, $this->colourCheck))
            throw new Exception();

        $this->colour = $colour;

        return;
    }

    /**
     * @param string $size
     */
    public function setSize($size)
    {
        $this->size = $size;

        return;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;

        return;
    }

    // Methoden des Produktes ...
}
