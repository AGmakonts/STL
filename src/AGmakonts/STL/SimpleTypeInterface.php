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

	/**
	 * @return mixed
	 */
	public function __toString();
}
