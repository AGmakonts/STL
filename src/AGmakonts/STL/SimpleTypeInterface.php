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
	public function value();

	/**
	 * @return mixed
	 */
	public function __toString();
    static public function get();
}
