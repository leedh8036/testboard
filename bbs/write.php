<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/preset.php';
include $_SERVER['DOCUMENT_ROOT'].'/header.php';
?>
글쓰기<br />
<form name ="write_form" method = "POST" action = "./write_check.php">
<input type="hidden" name="member_idx" value="<?php echo $_SESSION['member_idx'] ?>">
<table>
    <tr>
        <td>
    제목
    </td>
    <td>
            <input type ="text" name = "subject" size ="90">
    </td>
    </tr>
    <tr>
        <td>
            내용
    </td>
    <td>
            <textarea name="content" cols="100" rows="10"></textarea>
    </td>
    </tr>
</table>

<div>
    <input type = "submit" value = "저장">
</div>
    

</form>
        
<?php
    include $_SERVER['DOCUMENT_ROOT'].'/footer.php';
?>