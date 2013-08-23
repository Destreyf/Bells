<?php defined('SYSPATH') or die('No direct access allowed.');

return array(

	'driver'       => 'file',
	'hash_method'  => 'sha256',
	'hash_key'     => 'o4NNpSZVqHBQW^QwHzZtCObpL-rV0)1h',
	'lifetime'     => 1209600,
	'session_type' => Session::$default,
	'session_key'  => 'auth_user',

	// Username/password combinations for the Auth File driver
	'users' => json_decode(file_get_contents(SYSPATH."/users.db"),true)

);