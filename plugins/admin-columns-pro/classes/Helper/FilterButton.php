<?php

namespace ACP\Helper;

use AC\Registrable;
use LogicException;

final class FilterButton
	implements Registrable {

	const SCREEN_USERS = 'users';
	const SCREEN_TAXONOMY = 'taxonomy';

	/**
	 * @var
	 */
	private $screen;

	/**
	 * @param string $screen
	 */
	public function __construct( $screen ) {
		$this->screen = $screen;

		$this->validate();
	}

	private function validate() {
		$valid_screens = array(
			self::SCREEN_USERS,
			self::SCREEN_TAXONOMY,
		);

		if ( ! in_array( $this->screen, $valid_screens ) ) {
			throw new LogicException( 'Invalid screen given.' );
		}
	}

	public function register( $remove_after_callback = true ) {
		$tag = $this->get_tag();

		if ( ! $tag || $this->is_registered( $tag ) ) {
			return;
		}

		add_action( $tag, $this->get_callback(), 2 );
	}

	public function deregister() {
		$tag = $this->get_tag();

		if ( ! $tag ) {
			return;
		}

		remove_action( $tag, $this->get_callback(), 2 );
	}

	/**
	 * Display filter button
	 */
	public function display_button() {
		$this->deregister();

		?>

		<input type="submit" name="acp_filter_action" class="button" value="<?php echo esc_attr( __( 'Filter', 'codepress-admin-columns' ) ); ?>">

		<?php
	}

	/**
	 * @return bool
	 */
	private function is_registered( $tag ) {
		return has_action( $tag, $this->get_callback() );
	}

	/**
	 * @return callable
	 */
	private function get_callback() {
		return array( $this, 'display_button' );
	}

	/**
	 * @return string|false
	 */
	private function get_tag() {
		switch ( $this->screen ) {
			case self::SCREEN_USERS:
				return 'restrict_manage_users';
			case self::SCREEN_TAXONOMY:
				return 'in_admin_footer';
		}

		return false;
	}

}