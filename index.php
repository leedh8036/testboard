<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/preset.php';
include $_SERVER['DOCUMENT_ROOT'].'/header.php';
?>

        첫 페이지
        <hr />
        <a href="./member/signup.php" class = "btn">회원가입</a>
        <hr />
        <a href="./member/login.php" class = "btn">로그인</a>
        <hr />
        <a href="../bbs/list.php" class = "btn">글 목록</a>
<?php
    include $_SERVER['DOCUMENT_ROOT'].'/footer.php';
?>
