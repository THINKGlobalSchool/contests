<?php
/**
 * TGS Contests Barge Video View
 *
 * @package TGSContests
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010-2012
 * @link http://www.thinkglobalschool.org/
 * 
 */

$options = array(
	'type' => 'object',
	'subtype' => 'simplekaltura_video',
	'metadata_name' => 'tags',
	'metadata_value' => 'atlargeonthebarge',
	'limit' => 100,
);

$options['count'] = FALSE;

$videos = elgg_get_entities_from_metadata($options);

$video_count = count($videos);

$video_content = '';

elgg_push_context('gallery');
foreach ($videos as $video) {
	$video_item = elgg_view_entity($video);
	$video_content .= <<<HTML
		<div class='contests-barge-video-container'>
			$video_item
		</div>
HTML;
}
elgg_pop_context();

// Figure out how many empty boxes we need
if ($video_count < 9) {
	$empty_box_count = 9 - $video_count; // Show however many boxes we need minus videos
} else if ($video_count % 3 == 0) {
	$empty_box_count = 3; // Add another row of empty boxes
} else {
	$box_count = $video_count;
	// Video count increased to next number divisble by 3
	$box_count += (3 - ($video_count % 3)) % 3;
	$empty_box_count = $box_count - $video_count;
}

for ($i = 0; $i < $empty_box_count; $i++) {
	$label = elgg_echo('contests:label:yourvideohere');
	$video_content .= <<<HTML
		<div class='contests-barge-video-container empty-video-container'>
			$label
		</div>
HTML;
}

$page_title = elgg_echo('contests:barge:title');

$content = <<<HTML
	<div class='contests-title'>
		$page_title
	</div>
	<div id='contests-barge-videos-container'>
		$video_content
	</div>
HTML;

echo $content;