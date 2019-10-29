<?php

namespace ACP\Helper\Select\Value;

use ACP\Helper\Select;
use WP_Comment;

final class Comment
	implements Select\Value {

	/**
	 * @param WP_Comment $comment
	 */
	public function get_value( $comment ) {
		return $comment->comment_ID;
	}

}