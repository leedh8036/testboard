<?php

require_once (dirname(__FILE__).'/../../../../../lib/ucp/class/common/util/Protocol.php');
require_once (dirname(__FILE__).'/../../../../../lib/ucp/class/common/util/Log.php');

require_once (dirname(__FILE__).'/../../../../../lib/ucp/logic//auth/AuthService.php'); 
require_once (dirname(__FILE__).'/../../../../../lib/ucp/logic/main/common/CheckEmailAvailable.php'); 

function finish($data_service, $data_extra = null) {
	$return_array = array();
	$return_array[Protocol::$RES_NAME_RESULT_SERVICE] = $data_service;
	$return_array[Protocol::$RES_NAME_RESULT_EXTRA] = $data_extra;
	
	echo json_encode($return_array);
	exit;
}

$TAG = "API [check_email_available]";
$log = new Log($TAG);

/*테스트*/
/*
$request = array();
$request['app_token'] 	= "G_F_B";
$request['email']		= " dflai@dlfi.com";
$auth_service = new AuthService($request);
*/

$auth_service = new AuthService($_REQUEST);

if(!$auth_service->start()) {
	finish($auth_service->getData());
}

$check_email_available = new CheckEmailAvailable($_REQUEST);

if(!$check_email_available->start()) {
	finish($auth_service->getData(), $check_email_available->getResultSet());
}

finish($auth_service->getData(), $check_email_available->getResultSet());
?>