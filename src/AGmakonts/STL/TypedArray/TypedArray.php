<?php
namespace AGmakonts\STL\TypedArray;

use AGmakonts\STL\SimpleTypeInterface;
use AGmakonts\STL\Exception\TypedArray\UnknownTypeException;
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
    private $_elements;
    
    /**
     * 
     * @var string
     */
    private $_type;
    
    /**
     * 
     * @var Natural
     */
    private $_size;
    
    public function __construct($type, Natural $size)
    {
        if(FALSE === class_exists($type)) {
            throw new UnknownTypeException($type);
        }
        
        $this->_type = $type;
        $this->_size = $size;
    }
    
    public function getSize()
    {
        return $this->_size;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\SimpleTypeInterface::getValue()
     *
     */
    public function getValue ()
    {}

    /**
     * (non-PHPdoc)
     *
     * @see \AGmakonts\STL\SimpleTypeInterface::__toString()
     *
     */
    public function __toString ()
    {}
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
        
        if(FALSE === $this->getSize()->assertIsSmallerOrEqualTo($offset)) {
            
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