<?php
require_once('./workflows.php');
$wf = new Workflows();

define('API_PATH','http://api.tiqav.com/search.json?q=');

$req = $wf->request(API_PATH.$orig);
$content = json_decode($req);

$int = 1;
$cache = $wf->cache();
foreach( $content as $val ):
	$id = $val->id;
	$ext = $val->ext;
	$src = "http://img.tiqav.com/$id.th.jpg";
	$data = $wf->request($src);
	$icon = $cache.$id.'jpg';
	$query = "http://img.tiqav.com/$id.$ext";
	file_put_contents($icon, $data);
	$wf->result($int.':'.time(), $query, $int.':'.$src, $src, $icon);
	$int++;
endforeach;

$results = $wf->results();
if ( count( $results ) == 0 ):
	$wf->result( 'ちくわぶ', $orig, 'No Image', 'No search image found. Search ちくわぶ for '.$orig, 'icon.png' );
endif;
echo $wf->toxml();