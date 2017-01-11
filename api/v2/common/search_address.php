<?php

require_once (dirname(__FILE__).'/../../../../../lib/ucp/class/common/util/Protocol.php');
//require_once (dirname(__FILE__).'/../../../../../lib/ucp/class/common/util/Log.php');

require_once (dirname(__FILE__).'/../../../../../lib/ucp/logic/auth/AuthService.php'); 
require_once (dirname(__FILE__).'/../../../../../lib/ucp/logic/main/common/SearchAddress.php'); 

function finish($data_service, $data_extra = null) {
	$return_array = array();
	$return_array[Protocol::$RES_NAME_RESULT_SERVICE] = $data_service;
	$return_array[Protocol::$RES_NAME_RESULT_EXTRA] = $data_extra;
	
	echo json_encode($return_array);
	exit;  
}

//$TAG = "API [search_address]";
//$log = new Log($TAG);

$auth_service = new AuthService($_REQUEST);

if(!$auth_service->start()) {
	finish($auth_service->getData());
}

$search_address = new SearchAddress($_REQUEST);

if(!$search_address->start()) {
	finish($auth_service->getData(), $search_address->getResultSet());
}

finish($auth_service->getData(), $search_address->getResultSet());
