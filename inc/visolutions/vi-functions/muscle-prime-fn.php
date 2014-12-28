<?php
/*  funçao original do buddypress ( bp_add_friend_button() - bp-friends-template.php)
 	alterei para poder estilizar o botão
 */

function mp_add_friend_button( $potential_friend_id = 0, $friend_status = false ) {
	echo mp_get_add_friend_button( $potential_friend_id, $friend_status );
}
	/**
	 * Create the Add Friend button.
	 *
	 * @param int $potential_friend_id ID of the user to whom the button
	 *        applies. Default: value of {@link bp_get_potential_friend_id()}.
	 * @param bool $friend_status Not currently used.
	 * @return string HTML for the Add Friend button.
	 */
	function mp_get_add_friend_button( $potential_friend_id = 0, $friend_status = false ,$args=array()) {

		if ( empty( $potential_friend_id ) )
			$potential_friend_id = bp_get_potential_friend_id( $potential_friend_id );

		$is_friend = bp_is_friend( $potential_friend_id );

		if ( empty( $is_friend ) )
			return false;

		switch ( $is_friend ) {
			case 'pending' :

				$button = array(
					'id'                => 'pending',
					'component'         => 'friends',
					'must_be_logged_in' => true,
					'block_self'        => true,
					'wrapper_class'     => 'friendship-button pending_friend',
					'wrapper_id'        => 'friendship-button-' . $potential_friend_id,
					'link_href'         => wp_nonce_url( bp_loggedin_user_domain() . bp_get_friends_slug() . '/requests/cancel/' . $potential_friend_id . '/', 'friends_withdraw_friendship' ),
					'link_text'         => __( 'Cancel Friendship Request', 'buddypress' ),
					'link_title'        => __( 'Cancel Friendship Requested', 'buddypress' ),
					'link_id'			=> 'friend-' . $potential_friend_id,
					'link_rel'			=> 'remove',
					'link_class'        => 'friendship-button pending_friend requested',
					'img'				=> 'rs-confirm-friend-button-small.png'
				);
				break;

			case 'awaiting_response' :
				$button = array(
					'id'                => 'awaiting_response',
					'component'         => 'friends',
					'must_be_logged_in' => true,
					'block_self'        => true,
					'wrapper_class'     => 'friendship-button awaiting_response_friend',
					'wrapper_id'        => 'friendship-button-' . $potential_friend_id,
					'link_href'         => bp_loggedin_user_domain() . bp_get_friends_slug() . '/requests/',
					'link_text'         => __( 'Friendship Requested', 'buddypress' ),
					'link_title'        => __( 'Friendship Requested', 'buddypress' ),
					'link_id'           => 'friend-' . $potential_friend_id,
					'link_rel'          => 'remove',
					'link_class'        => 'friendship-button awaiting_response_friend requested',
					'img'				=> 'rs-confirm-friend-button-small.png'
				);
				break;

			case 'is_friend' :
				$button = array(
					'id'                => 'is_friend',
					'component'         => 'friends',
					'must_be_logged_in' => true,
					'block_self'        => false,
					'wrapper_class'     => 'friendship-button is_friend',
					'wrapper_id'        => 'friendship-button-' . $potential_friend_id,
					'link_href'         => wp_nonce_url( bp_loggedin_user_domain() . bp_get_friends_slug() . '/remove-friend/' . $potential_friend_id . '/', 'friends_remove_friend' ),
					'link_text'         => __( 'Cancel Friendship', 'buddypress' ),
					'link_title'        => __( 'Cancel Friendship', 'buddypress' ),
					'link_id'           => 'friend-' . $potential_friend_id,
					'link_rel'          => 'remove',
					'link_class'        => 'friendship-button is_friend remove',
					'img'				=> 'rs-removefriend-button-small.png'
				);
				break;

			default:
				$button = array(
					'id'                => 'not_friends',
					'component'         => 'friends',
					'must_be_logged_in' => true,
					'block_self'        => true,
					'wrapper_class'     => 'friendship-button not_friends',
					'wrapper_id'        => 'friendship-button-' . $potential_friend_id,
					'link_href'         => wp_nonce_url( bp_loggedin_user_domain() . bp_get_friends_slug() . '/add-friend/' . $potential_friend_id . '/', 'friends_add_friend' ),
					'link_text'         => __( 'Add Friend', 'buddypress' ),
					'link_title'        => __( 'Add Friend', 'buddypress' ),
					'link_id'           => 'friend-' . $potential_friend_id,
					'link_rel'          => 'add',
					'link_class'        => 'friendship-button not_friends add',
					'img'				=> 'rs-addfriend-button-small.png'
				);
				break;
		}

		// editado apartir daqui

		$str = '<div id="'.$button["wrapper_id"].'" class="'.$button["wrapper_class"].'">';
		$str.= '<a class="'.$button["link_class"].'" rel="'.$button["link_rel"].'" id="'.$button["link_id"].'" title="'.$button["link_title"].'" href="'.$button["link_href"].'">';
		$str.= '<img src="'.get_bloginfo("template_url")."/img/".$button["img"].'"/></a></div>';
		return($str);
	}
?>