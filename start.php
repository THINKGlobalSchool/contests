<?php
/**
 * TGS Contests
 *
 * @package TGSContests
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010-2012
 * @link http://www.thinkglobalschool.org/
 * 
 */

elgg_register_event_handler('init', 'system', 'contests_init');

function contests_init() {
	// Contest library
	elgg_register_library('elgg:contests', elgg_get_plugins_path() . 'contests/lib/contests.php');

	// Register general JS
	$g_js = elgg_get_simplecache_url('js', 'contests/contests');
	elgg_register_js('elgg.contests', $g_js);

	// Register the barge JS
	$b_js = elgg_get_simplecache_url('js', 'contests/barge/barge');
	elgg_register_js('elgg.contests.barge', $b_js);
	
	// Register general JS
	$g_css = elgg_get_simplecache_url('css', 'contests/css');
	elgg_register_css('elgg.contests', $g_css);

	// Register the barge JS
	$b_css = elgg_get_simplecache_url('css', 'contests/barge/css');
	elgg_register_css('elgg.contests.barge', $b_css);

	// Barge trip page handler
	elgg_register_page_handler('bargecontest', 'barge_page_handler');
	
	// Extend video sidebar
	//elgg_extend_view('simplekaltura/sidebar', 'contests/barge/promo');
}

// Barge contest page handler 
function barge_page_handler($page) {
	elgg_load_library('elgg:contests');
	elgg_load_css('elgg.contests');
	elgg_load_css('elgg.contests.barge');
	elgg_load_js('elgg.contests');
	elgg_load_js('elgg.contests.barge');
	
	//$params = contests_barge_content();
	$params = contests_barge_winner_content();
	
	$body = elgg_view_layout('one_sidebar', $params);

	echo elgg_view_page(elgg_echo('contests:barge:title'), $body);
	return true;
}