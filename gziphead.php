<?php
	if ( extension_loaded('zlib') and !ini_get('zlib.output_compression') and ini_get('output_handler') != 'ob_gzhandler' and ((version_compare(phpversion(), '5.0', '>=') and ob_get_length() == false) or ob_get_length() === false) ) {
		ob_start('ob_gzhandler');
	}
	header("Cache-Control: public");
	header("Pragma: cache");
	header("Expires: ".gmdate("D, d M Y H:i:s", time() + 604800)." GMT");// 60 * 60 * 24 * 7
	header("Last-Modified: ".gmdate("D, d M Y H:i:s", filemtime($_SERVER['SCRIPT_FILENAME']))." GMT");
	header('Content-Type: text/javascript; charset: UTF-8');
?>
