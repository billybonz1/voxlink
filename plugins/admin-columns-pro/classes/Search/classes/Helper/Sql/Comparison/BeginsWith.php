<?php

namespace ACP\Search\Helper\Sql\Comparison;

use ACP\Search\Value;

class BeginsWith extends Like {

	public function __construct( $column, $operator, Value $value ) {
		parent::__construct( $column, $value );
	}

	/**
	 * @inheritDoc
	 */
	public function bind_value( Value $value ) {
		$value = new Value(
			$this->value_begins_with( $value->get_value() ),
			$value->get_type()
		);

		return parent::bind_value( $value );
	}

}