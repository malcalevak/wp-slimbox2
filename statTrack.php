<?php
//error_reporting(0);
function statTrack(&$options) {
	if(!isset($options['lang_track']) OR $options['lang_track']=='false') {
		$data = array(
			'table' => 'wp_slimbox2',
			'lang' => WPLANG
		);
		 
		list($header, $content) = PostRequest(
			"http://www.transientmonkey.com/statTrack.php",$_SERVER['PHP_SELF'],
			$data
		);

		if(strpos($content, 'true')=== false) $content = 'false';
		else $content = 'true';

		$options['lang_track'] = $content;
	}
}

function PostRequest($url, $referer, $_data) {
 
    // convert variables array to string:
    $data = array();    
    while(list($n,$v) = each($_data)){
        $data[] = "$n=$v";
    }    
    $data = implode('&', $data);
    // format --> test1=a&test2=b etc.
 
    // parse the given URL
    $url = parse_url($url);
    if ($url['scheme'] != 'http') { 
        die('Only HTTP request are supported !');
    }
 
    // extract host and path:
    $host = $url['host'];
    $path = $url['path'];
 
    // open a socket connection on port 80
    $fp = fsockopen($host, 80);
	if ($fp) {
		// send the request headers:
		fputs($fp, "POST $path HTTP/1.1\r\n");
		fputs($fp, "Host: $host\r\n");
		fputs($fp, "Referer: $referer\r\n");
		fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n");
		fputs($fp, "Content-length: ". strlen($data) ."\r\n");
		fputs($fp, "Connection: close\r\n\r\n");
		fputs($fp, $data);
	 
		$result = ''; 
		while(!feof($fp)) {
			// receive the results of the request
			$result .= fgets($fp, 128);
		}
	 
		// close the socket connection:
		fclose($fp);
	 
		// split the result header from the content
		$result = explode("\r\n\r\n", $result, 2);
	}
 
    $header = isset($result[0]) ? $result[0] : '';
    $content = isset($result[1]) ? $result[1] : '';
 
    // return as array:
    return array($header, $content);
}
?>