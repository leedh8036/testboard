<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/preset.php';
include $_SERVER['DOCUMENT_ROOT'].'/header.php';


$modify_status = $_SESSION['modify_status'];
if($modify_status=='YES') {
    $message = '글이 수정되었습니다.';
}
else {
    $message = '수정 실패했습니다.';
}
?>
        modify_done.php - 게시판 글 수정 완료 페이지<br />
        <hr />
<?php
    echo $message;
?>
<?php
    include $_SERVER['DOCUMENT_ROOT'].'/footer.php';
?>
 <hr />
        <a href="../bbs/list.php" class = "btn">글 목록으로</a>