<?php

interface iCollecton extends Iterator, Countable
{
    public function add( $element );
    public function remove ( $element );
}

class TypeSaveCollectionDecorator implements iCollection
{
    private $collection;
    private $type;

    public function __construct( iCollection $collection, $type )
    {
        $this->collcetion = $collection;
        $this->type = $type;
    }

    public function add( $element )
    {
        if ( ! ( $element instanceof $this->type ) ) {
            throw new Exception( 'Wrong type' );
        }

        return $this->collection->add( $element );
    }

    public function remove( $element )
    {
        return $this->collection->remove( $element );
    }
}