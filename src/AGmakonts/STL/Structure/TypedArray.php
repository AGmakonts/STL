<?php
namespace AGmakonts\STL\Structure;

use AGmakonts\STL\SimpleTypeInterface;
use AGmakonts\STL\String\String;
use AGmakonts\STL\Structure\Exception\InvalidElementException;
use AGmakonts\STL\Structure\Exception\UnknownTypeException;
use AGmakonts\STL\Number\Natural;

/**
 *
 * @author Adam
 *        
 */
class TypedArray implements SimpleTypeInterface,
                            \ArrayAccess,
                            \Iterator
{
    /**
     * 
     * @var \SplFixedArray
     */
    private $elements;
    
    /**
     * 
     * @var String
     */
    private $type;
    
    /**
     * 
     * @var Natural
     */
    private $size;

    /**
     * @param                               $type
     * @param \AGmakonts\STL\Number\Natural $size
     * @param                               $elements
     */
    public function _construct($type, Natural $size, $elements)
    {
        if(FALSE === class_exists($type)) {
            throw new UnknownTypeException($type);
        }

        if(FALSE === is_array($elements) || FALSE === ($elements instanceof \Traversable)) {

            $elements = [$elements];
        }

        $this->addElementsFromIterator($elements);
        
        $this->type = new String($type);
        $this->size = $size;


    }

    static public function get()
    {
        // TODO: Implement get() method.
    }


    private function addElementsFromIterator($elements)
    {
        $temp = [];

        foreach($elements as $element) {
            $temp[] = $this->validatedElement($element);
        }

        $this->elements = \SplFixedArray::fromArray($temp);
        unset($temp);
    }

    private function validatedElement($element)
    {
        if(FALSE === is_object($element) ||
           get_class($element) !== $this->type()) {

            throw new InvalidElementException($element, $this->type());
        }

        return $element;

    }

    /**
     * @param \AGmakonts\STL\Number\Natural $size
     */
    public function expandBy(Natural $size)
    {
        $this->elements->setSize($this->elements->getSize() + $size->value());
    }

    public function merge(TypedArray $array)
    {
        if(FALSE === $this->assertIsCompatibleWith($array)) {

        }


    }

    /**
     * Test if passed array holds the same type of objects.
     *
     * @param \AGmakonts\STL\Structure\TypedArray $array
     *
     * @return bool
     */
    public function assertIsCompatibleWith(TypedArray $array)
    {
        return ($array->type()->assertIsEqualTo($this->type()));
    }

    /**
     * @return \AGmakonts\STL\String\String
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * @param $type
     *
     * @return bool
     */
    public function assertIsTypeOf($type)
    {
        $type = new String($type);

        return ($type->assertIsEqualTo($this->type()));
    }

    
    public function size()
    {
        return $this->size;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\SimpleTypeInterface::value()
     *
     */
    public function value ()
    {

    }

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\SimpleTypeInterface::__toString()
     *
     */
    public function _toString ()
    {

    }
	/* (non-PHPdoc)
     * @see ArrayAccess::offsetExists()
     */
    public function offsetExists ($offset)
    {
        // TODO Auto-generated method stub
        
    }

	/* (non-PHPdoc)
     * @see ArrayAccess::offsetGet()
     */
    public function offsetGet ($offset)
    {
        // TODO Auto-generated method stub
        
    }

	/* (non-PHPdoc)
     * @see ArrayAccess::offsetSet()
     */
    public function offsetSet ($offset, $value)
    {
        $offset = new Natural($offset);
        
        if(FALSE === $this->size()->assertIsSmallerOrEqualTo($offset)) {
            
        }
        
    }

	/* (non-PHPdoc)
     * @see ArrayAccess::offsetUnset()
     */
    public function offsetUnset ($offset)
    {
        // TODO Auto-generated method stub
        
    }
	/* (non-PHPdoc)
     * @see Iterator::current()
     */
    public function current ()
    {
        // TODO Auto-generated method stub
        
    }

	/* (non-PHPdoc)
     * @see Iterator::key()
     */
    public function key ()
    {
        // TODO Auto-generated method stub
        
    }

	/* (non-PHPdoc)
     * @see Iterator::next()
     */
    public function next ()
    {
        // TODO Auto-generated method stub
        
    }

	/* (non-PHPdoc)
     * @see Iterator::rewind()
     */
    public function rewind ()
    {
        // TODO Auto-generated method stub
        
    }

	/* (non-PHPdoc)
     * @see Iterator::valid()
     */
    public function valid ()
    {
        // TODO Auto-generated method stub
        
    }


    
    
}

?>