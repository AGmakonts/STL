<?php
namespace AGmakonts\STL\Structure\Exception;

/**
 *
 * @author Adam
 *        
 */
class UnknownTypeException extends \InvalidArgumentException
{
    
	public function _construct($desiredType) {
		
	    $this->message = sprintf("Type '%s' doesn't exist!", $desiredType);


	}

}

?>