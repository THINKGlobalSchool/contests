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
	$params['title'] = elgg_echo('contests:barge:title');
	
	$params['content'] = elgg_view('contests/barge/videos');
	
	$params['sidebar'] = elgg_view_module(
		'aside', 
		elgg_echo('contests:label:instructions'), 
		elgg_echo('contests:barge:description'),
		array(
			'class' => 'contests-barge-instructions',
		)
	);

	return $params;
}
