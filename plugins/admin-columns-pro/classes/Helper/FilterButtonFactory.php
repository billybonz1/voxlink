<?php

namespace ACP\Helper;

final class FilterButtonFactory {

	/** @var FilterButton[] */
	private static $instances = array();

	/**
	 * @param string $screen
	 *
	 * @return FilterButton
	 */
	public static function create( $screen ) {
		if ( ! isset( static::$instances[ $screen ] ) ) {
			static::$instances[ $screen ] = new FilterButton( $screen );
		}

		return static::$instances[ $screen ];
	}

}