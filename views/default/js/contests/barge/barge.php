<?php
/**
 * TGS Contests Barge JS
 *
 * @package TGSContests
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010-2012
 * @link http://www.thinkglobalschool.org/
 * 
 */
?>
//<script>

elgg.provide('elgg.contests.barge');

// Init 
elgg.contests.barge.init = function() {
	console.log('elgg.contests.barge');
}

elgg.register_hook_handler('init', 'system', elgg.contests.barge.init);