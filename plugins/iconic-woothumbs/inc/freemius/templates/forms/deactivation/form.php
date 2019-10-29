<?php
	/**
	 * @package     Freemius
	 * @copyright   Copyright (c) 2015, Freemius, Inc.
	 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
	 * @since       1.1.2
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * @var array $VARS
	 */
	$slug = $VARS['slug'];
	$fs   = freemius( $slug );

	$confirmation_message = $fs->apply_filters( 'uninstall_confirmation_message', '' );

	$reasons = $VARS['reasons'];

	$reasons_list_items_html = '';

	foreach ( $reasons as $reason ) {
		$list_item_classes    = 'reason' . ( ! empty( $reason['input_type'] ) ? ' has-input' : '' );

		if ( isset( $reason['internal_message'] ) && ! empty( $reason['internal_message'] ) ) {
			$list_item_classes .= ' has-internal-message';
			$reason_internal_message = $reason['internal_message'];
		} else {
			$reason_internal_message = '';
		}

		$reason_list_item_html = <<< HTML
			<li class="{$list_item_classes}"
			 	data-input-type="{$reason['input_type']}"
			 	data-input-placeholder="{$reason['input_placeholder']}">
	            <label>
	            	<span>
	            		<input type="radio" name="selected-reason" value="{$reason['id']}"/>
                    </span>
                    <span>{$reason['text']}</span>
                </label>
                <div class="internal-message">{$reason_internal_message}</div>
            </li>
HTML;

		$reasons_list_items_html .= $reason_list_item_html;
	}

	$is_anonymous = ( ! $fs->is_registered() );
	if ( $is_anonymous ) {
		$anonymous_feedback_checkbox_html =
			'<label class="anonymous-feedback-label"><input type="checkbox" class="anonymous-feedback-checkbox"> '
				. fs_text( 'anonymous-feedback', $slug )
			. '</label>';
	} else {
		$anonymous_feedback_checkbox_html = '';
	}

	fs_enqueue_local_style( 'dialog-boxes', '/admin/dialog-boxes.css' );
?>

