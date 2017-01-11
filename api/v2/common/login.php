<?php

require_once (dirname(__FILE__).'/../../../../../lib/ucp/class/common/util/Protocol.php');
require_once (dirname(__FILE__).'/../../../../../lib/ucp/class/common/util/Log.php');

require_once (dirname(__FILE__).'/../../../../../lib/ucp/logic/auth/AuthService.php'); 
require_once (dirname(__FILE__).'/../../../../../lib/ucp/logic/main/common/Login.php');

function finish($data_service, $data_extra = null) {
	
	//$TAG = "API [login]";
	//$log = new Log($TAG);
	
	$return_array = array();
	$return_array[Protocol::$RES_NAME_RESULT_SERVICE] = $data_service;
	$return_array[Protocol::$RES_NAME_RESULT_EXTRA] = $data_extra;
	
	//$log->out(json_encode($return_array));
	echo json_encode($return_array);
	
	exit;
}



/*테스트*/
/*
$request = array();
$request['app_token'] = "G_F_B";

$request['email'] = "in.yeop.hwang@fallin.me";

$request['type_join'] = 4;
$request['password'] = "aaaaaaaaaaaa";

$request['code_gen'] = "1";
$request['date_birth'] = "1989";
$request['name_nick'] = "안녕ㄴ";
$request['code_job'] = 2;
$request['code_city'] = 1;

$auth_service = new AuthService($request);
*/

/*테스트*/
/*
$request = array();
$request['app_token'] = "G_F_B";
$request['type_login'] = 4;
$request['id'] = "test3@creationpot.com";
$request['password'] = "aaaaaaaaaaaa";
*/

$auth_service = new AuthService($_REQUEST);

if(!$auth_service->start()) {
	finish($auth_service->getData());
}

$login = new Login($_REQUEST, $auth_service->getApp());

if(!$login->start()) {
	finish($auth_service->getData(), $login->getResultSet());
}

finish($auth_service->getData(), $login->getResultSet());

?>