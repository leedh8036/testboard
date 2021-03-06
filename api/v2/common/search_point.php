<?php

require_once (dirname(__FILE__).'/../../../../../lib/ucp/class/common/util/Protocol.php');
require_once (dirname(__FILE__).'/../../../../../lib/ucp/class/common/util/Log.php');

require_once (dirname(__FILE__).'/../../../../../lib/ucp/logic/auth/AuthService.php'); 
require_once (dirname(__FILE__).'/../../../../../lib/ucp/logic/auth/AuthUser.php'); 
require_once (dirname(__FILE__).'/../../../../../lib/ucp/logic/main/common/SearchPoint.php');

function finish($data_service, $data_user = null, $data_extra = null) {
	$return_array = array();
	$return_array[Protocol::$RES_NAME_RESULT_SERVICE] = $data_service;
	$return_array[Protocol::$RES_NAME_RESULT_USER] = $data_user;
	$return_array[Protocol::$RES_NAME_RESULT_EXTRA] = $data_extra;
	
	echo json_encode($return_array);
	exit;
}

$auth_service = new AuthService($_REQUEST); 

if(!$auth_service->start()) {
	finish($auth_service->getData());
}

$auth_user = new AuthUser($_REQUEST, $auth_service->getAppIdx());

if(!$auth_user->start()) {
	finish($auth_service->getData(), $auth_user->getData());
}

$search_point = new SearchPoint(
	$_REQUEST, 
	$auth_service->getApp(),
	$auth_user->getAccountExternal(),
	$auth_user->getAccountUsageExternal());

if(!$search_point->start()) {
	finish($auth_service->getData(), $auth_user->getData(), $search_point->getResultSet());
}

finish($auth_service->getData(), $auth_user->getData(), $search_point->getResultSet());