<?php
namespace AGmakonts\STL\Structure\Exception;

/**
 *
 * @author Adam
 *        
 */
class UnknownTypeException extends \InvalidArgumentException
{
    
	public function __construct($desiredType) {
		
	    $this->message = sprintf("Type '%s' doesn't exist!", $desiredType);


	}

}

?>