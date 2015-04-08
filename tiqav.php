<?php
require_once('./workflows.php');
$wf = new Workflows();

$orig = 'test';
define('API_PATH','http://api.tiqav.com/search.json?q=');

$req = $wf->request(API_PATH.$orig);
$content = json_decode($req);

$int = 1;
$cache = $wf->cache();
//$shell_cache = str_replace(' ','\ ',$cache);
//exec("rm -r $shell_cache*jpg");

foreach( $content as $val ):
	if ($int === 10) break;
	$id = $val->id;
	$ext = $val->ext;
	$src = "http://img.tiqav.com/$id.th.jpg";
	$query = "http://img.tiqav.com/$id.$ext";
	$icon = "$cache/$id.jpg";
	
	if (!file_exists($icon)) {
		$data = $wf->request($src);
		file_put_contents($icon, $data);
	}
	$wf->result($int.':'.time(), $query, $int.':'.$src, $src, $icon);
	$int++;
endforeach;

$results = $wf->results();
if ( count( $results ) == 0 ):
	$wf->result( 'ちくわぶ', $orig, 'No Image', 'No search image found. Search ちくわぶ for '.$orig, 'icon.png' );
endif;
echo $wf->toxml();