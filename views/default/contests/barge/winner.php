<?php
/**
 * TGS Contests Barge Video Winner View
 *
 * @package TGSContests
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010-2012
 * @link http://www.thinkglobalschool.org/
 * 
 */

$page_title = elgg_echo('contests:barge:title');

// Add a guid here to make it work
$video = get_entity();

if (!$video) {
	echo "Video guid required";
	die;
}

elgg_load_library('simplekaltura');
elgg_load_library('KalturaClient');

$owner = $video->getOwnerEntity();
$title = $video->title;

$owner_icon = elgg_view_entity_icon($owner, 'tiny');
$owner_link = elgg_view('output/url', array(
	'href' => "videos/owner/$owner->username",
	'text' => $owner->name,
));

$author_text = elgg_echo('byline', array($owner_link));
$tags = elgg_view('output/tags', array('tags' => $video->tags));
$date = elgg_view_friendly_time($video->time_created);

$plays = (is_int($vars['entity']->plays)) ? $vars['entity']->plays : elgg_echo('simplekaltura:label:unavailable');

$kaltura_metadata = elgg_echo('simplekaltura:label:vidlength',
		array(simplekaltura_sec2hms($vars['entity']->duration)));

$kaltura_metadata .= elgg_echo('simplekaltura:label:vidplays', array($plays));

$subtitle = "<p>$author_text $date $comments_link<br />$kaltura_metadata</p>";

$body = '<div class="elgg-kaltura-player center">';
$body .= elgg_view('simplekaltura/widget', array('entity' => $video));
$body .= "<br />$download_link</div>";

$header = elgg_view_title($video->title);

$params = array(
	'entity' => $video,
	'title' => false,
	'metadata' => $metadata,
	'subtitle' => $subtitle,
	'tags' => $tags,
);

$list_body = elgg_view('page/components/summary', $params);

$video_info = elgg_view_image_block($owner_icon, $list_body);

$content = <<<HTML
	<div class='contests-title'>
		$page_title
	</div>
	<center><h2>Congratulations Yada!</h2></center>
	<div id='contests-barge-winner-container'>
		<div style='margin-left:auto; margin-right: auto; width: 600px; text-align: left;'>
			$video_info
		</div>
		$body
	</div>
HTML;

echo $content;
