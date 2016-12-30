<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/preset.php';
include $_SERVER['DOCUMENT_ROOT'].'/header.php';

$q = "SELECT * FROM ap_bbs WHERE doc_idx = $doc_idx";
$result = $mysqli->query($q);
$data = $result->fetch_array();


?>

<table>
    <tr>
        <td>
    제목
    </td>
    <td>
            <?php echo $data['subject']; ?>
    </td>
    </tr>
    <tr>
        <td>
    작성자
    </td>
    <td>
            <?php echo $data['member_idx']; ?>
    </td>
    </tr>
    <tr>
        <td>
            내용
    </td>
    <td>
            <?php echo $data['content']; ?>
    </td>
    </tr>
</table> 

<?php
    echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/bbs/list.php" class="btn" >목록</a>';
?>
    
<?php
    if( $_SESSION['member_idx']==$data['member_idx']) {
        echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/bbs/modify.php?doc_idx='.$doc_idx.'">수정</a>';
    }
?>

<?php
    if( $_SESSION['member_idx']==$data['member_idx']) {
        echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/bbs/delete.php?doc_idx='.$doc_idx.'">삭제</a>';
    }
?>
    
<?php
    include $_SERVER['DOCUMENT_ROOT'].'/footer.php';
?>