<?php
session_start();
$is_logged = $_SESSION['is_logged'];
if($is_logged=='YES') {
    $user_id = $_SESSION['user_id'];
    $message = $user_id . ' 님, 로그인 했습니다.';
}
else {
    $message = '로그인이 실패했습니다.';
}

?>
<html>
    <head>
        <title>로그인 완료 페이지</title>
        <meta charset="utf-8" >
    </head>
    <body>
        login_done.php - 로그인 완료 페이지<br />
        <hr />
<?php
    echo $message;
?>
	<br><a href="../bbs/write.php" class = "btn">글 작성</a>
	<br><a href="../bbs/list.php" class = "btn">글 목록</a>
    </body>
</html> 

