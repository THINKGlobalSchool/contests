<?php
/**
 * TGS Contests Barge Promo
 *
 * @package TGSContests
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010-2012
 * @link http://www.thinkglobalschool.org/
 * 
 * @uses $vars['page_type'] 
 */

$page = $vars['page'];

if ($page == 'all' || $page == 'owner' || $page == 'friends') {
	echo elgg_view_module(
		'aside', 
		elgg_echo('contests:barge:title'), 
		elgg_echo('contests:barge:promo', array(elgg_get_site_url() . 'bargecontest')),
		array(
			'class' => 'contests-barge-details',
		)
	);
}