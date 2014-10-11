<?php
namespace AGmakonts\STL\Structure;

use AGmakonts\STL\SimpleTypeInterface;
use AGmakonts\STL\String\String;
use AGmakonts\STL\Structure\Exception\InvalidElementException;
use AGmakonts\STL\Structure\Exception\UnknownTypeException;
use AGmakonts\STL\Number\Natural;
use JsonSchema\Constraints\Type;

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
    private $_elements;
    
    /**
     * 
     * @var String
     */
    private $_type;
    
    /**
     * 
     * @var Natural
     */
    private $_size;

    /**
     * @param                               $type
     * @param \AGmakonts\STL\Number\Natural $size
     * @param                               $elements
     */
    public function __construct($type, Natural $size, $elements)
    {
        if(FALSE === class_exists($type)) {
            throw new UnknownTypeException($type);
        }

        if(FALSE === is_array($elements) || FALSE === ($elements instanceof \Traversable)) {

            $elements = [$elements];
        }

        $this->_addElementsFromIterator($elements);
        
        $this->_type = new String($type);
        $this->_size = $size;


    }

    private function _addElementsFromIterator($elements)
    {
        $temp = [];

        foreach($elements as $element) {
            $temp[] = $this->_validatedElement($element);
        }

        $this->_elements = \SplFixedArray::fromArray($temp);
        unset($temp);
    }

    private function _validatedElement($element)
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
        $this->_elements->setSize($this->_elements->getSize() + $size->value());
    }

    public function merge(TypedArray $array)
    {
        if(FALSE === $this->assertIsCompatibleWith($array)) {

        }


    }

    public function assertIsCompatibleWith(TypedArray $array)
    {

    }

    /**
     * @return \AGmakonts\STL\String\String
     */
    public function type()
    {
        return $this->_type;
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
        return $this->_size;
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
    public function __toString ()
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