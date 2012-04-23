<?php
/**
 * TGS Contests Helper Lib
 *
 * @package TGSContests
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010-2012
 * @link http://www.thinkglobalschool.org/
 * 
 */

// Barge video contest content
function contests_barge_content() {	
	$params['content'] = elgg_view('contests/barge/videos');
	
	$params['sidebar'] = elgg_view_module(
		'aside', 
		elgg_echo('contests:label:details'), 
		elgg_echo('contests:barge:details'),
		array(
			'class' => 'contests-barge-details',
		)
	);
	
	$params['sidebar'] .= elgg_view_module(
		'aside', 
		elgg_echo('contests:label:instructions'), 
		elgg_echo('contests:barge:instructions'),
		array(
			'class' => 'contests-barge-details',
		)
	);

	return $params;
}

function contests_barge_winner_content() {
	$params['sidebar'] = elgg_view_module(
		'aside', 
		elgg_echo('contests:label:details'), 
		elgg_echo('contests:barge:details'),
		array(
			'class' => 'contests-barge-details',
		)
	);
	
	$params['sidebar'] .= elgg_view_module(
		'aside', 
		elgg_echo('contests:label:instructions'), 
		elgg_echo('contests:barge:instructions'),
		array(
			'class' => 'contests-barge-details',
		)
	);
	
	$params['content'] = elgg_view('contests/barge/winner');
	return $params;
}