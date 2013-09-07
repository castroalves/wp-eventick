<?php

/*
 *	Plugin Name: WP Eventick
 *	Plugin URI: http://eventick.com.br
 *	Description: Adicione a agenda de eventos do Eventick em seu site.
 *	Version: 1.0
 *	Author: Cadu de Castro Alves
 *	Author URI: http://twitter.com/castroalves
 */

/*
Eventick Shortcodes (Wordpress Plugin)
Copyright (C) 2013 Cadu de Castro Alves
Contact me at http://twitter.com/castroalves

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

require_once( plugin_dir_path( __FILE__ ) . 'eventickapi_php/vendor/autoload.php');

use Eventick\Lib\EventickAPI;

// admin page
function eventick_event_list_settings_actions() {

	add_options_page("Eventick Settings", "Eventick Settings", "manage_options", "wp-eventick-settings.php", "eventick_event_list_settings_page");

}
add_action( 'admin_menu', 'eventick_event_list_settings_actions' );

function eventick_event_list_settings_page() {
	include( plugin_dir_path( __FILE__ ) . 'wp-eventick-settings.php');	
}

//tell wordpress to register the demolistposts shortcode
add_shortcode("eventick_list", "eventick_event_list");

function eventick_event_list( $atts, $content = null ) {

	$api = new EventickAPI;
	$api->setCredentials( get_option( 'eventick_username' ), get_option( 'eventick_password' ) );
	$api->auth(); // Authenticates you

	$events = $api->events(); // Grab events

	extract( shortcode_atts( array(
		'venue_before' => '',
		'venue_after' => '<br />',
		'date_before' => '',
		'date_after' => '<br />',
		'button_label' => 'Inscreva-se Já!',
		'button_class' => '',
		'button_target' => '_blank',
		'order' => 'ASC',
	), $atts ) );

	if( strtolower( $order ) == 'asc' ) {
		asort( $events ); // order by ID asc
	}

	$html = '<dl class="event-list">';
	foreach ($events as $event) {
		$now = strtotime('now');
		if( strtotime( $event->start_at ) >= $now ) {
			$item = $api->event($event->id);

			$event_title = $item->title;
			$event_venue = $item->venue;
			list( $event_date, $event_time ) = explode('T', $item->start_at);
			list( $event_start_time, $event_end_time ) = explode('-', $event_time);

			$event_date = date( "d/m/Y", strtotime( $event_date ) );
			$event_time = date( "H:i", strtotime( $event_start_time ) );
			$event_slug = $item->slug;

			$html .= '<dt class="event-title">' . $event_title . '</dt>';
			$html .= '<dd class="event-info">';
			$html .= $venue_before . $event_venue . $venue_after;
			$html .= $date_before . $event_date . ', às ' . $event_time . $date_after;
			$html .= '<a class="' . $button_class . '" href="http://eventick.com.br/' . $event_slug . '" title="' . $event_title . '" alt="' . $event_title . '" target="' . $button_target . '">' . $button_label . '</a>';
			$html .= '</dd>';
		}
	}

	$html .= '</dl>';

	return $html;

}

?>
