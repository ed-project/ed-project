<?php
function base_protocol() {
	return stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
}

function redirect_back() {
	$url = @$_SERVER['HTTP_REFERER'];
	if( empty( $url ) ) {
		$url = base_protocol() . base_url();
	}
	redirect( $url );
}

function redirect_main() {
	redirect( base_protocol() . base_url() );
}