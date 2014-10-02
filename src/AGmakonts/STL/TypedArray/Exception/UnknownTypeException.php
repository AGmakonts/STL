<?php
namespace AGmakonts\STL\Exception\TypedArray;

/**
 *
 * @author Adam
 *        
 */
class UnknownTypeException extends \InvalidArgumentException
{
    
	public function __construct($desiredType) {
		
	    $this->message = sprintf("Type '%s' doesnt exist!", $desiredType);

	}

}

?>