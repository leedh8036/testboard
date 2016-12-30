<!DOCTYPE HTML>
<HTML>
    <HEAD>
        <TITLE>게시판</TITLE>
        <meta charset="utf-8">
        <link href ="./bootstrap/css/bootstrap.css" rel = "stylesheet">
    </HEAD>
    <BODY>
    <div class="header">
            ----------------------------------------------------------------------------------------------------------------------------
            <div class="header">
            <a href="http://<?php echo $_SERVER['HTTP_HOST'];?>">홈</a> <br />
            로그인 상태: 
            <?php if($_SESSION['is_logged']=='YES') {
                echo '로그인 되었습니다. '; 
                echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/member/logout.php">로그아웃</a>'; 
            }
				else
				echo '로그인 X';
                ?>
    </div><!-- .header -->
    </div>
    <div class="content">