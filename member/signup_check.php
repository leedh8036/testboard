<?php
include_once ('../config.php');
$mysqli = new mysqli($DB['host'], $DB['id'], $DB['pw'], $DB['db']);
if (mysqli_connect_error()) {
    exit('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
}

extract($_POST);

echo "가입 하신 계정의 아이디는 $user_id." ;
echo '<br />';
echo "비밀번호는 $user_pass.";
echo '<br />';
echo "이메일은 $user_email. 입니다." ;
echo '<br />';

$encrypted_pass = sha1($user_pass);

$q = "INSERT INTO ap_member ( id, pw, email ) VALUES ( '$user_id', '$encrypted_pass', '$user_email' )";

$mysqli->query( $q);

$mysqli->close();

header("Location: http://35.164.158.103/member/signup_done.php");


exit();



?> 
