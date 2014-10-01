<?php

namespace AGmakonts\STL;

/**
 *
 * @author Adam
 *        
 */
interface SimpleTypeInterface {
	/**
	 * @return mixed
	 */
	public function getValue();
	
	public function __toString();
}
