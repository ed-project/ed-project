<?php
//получение содержимого страницы через CURL
function file_get_contents_curl( $url ) {
	$ch = curl_init();
	curl_setopt( $ch, CURLOPT_AUTOREFERER, TRUE );
	curl_setopt( $ch, CURLOPT_HEADER, 0 );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt( $ch, CURLOPT_URL, $url );
	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, TRUE );
    curl_setopt( $ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13' );
	$data = curl_exec( $ch );
	curl_close( $ch );
	return $data;
}

function is404( $url ) {
	$handle = curl_init( $url );
	curl_setopt( $handle,  CURLOPT_RETURNTRANSFER, TRUE );
	$response = curl_exec( $handle );
	$httpCode = curl_getinfo( $handle, CURLINFO_HTTP_CODE );
	curl_close( $handle );
	if( $httpCode == 404 ) {
		return true;
	} else {
		return false;
	}
}