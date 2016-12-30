<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/preset.php';
include $_SERVER['DOCUMENT_ROOT'].'/header.php';
?>
<?php
$q = "SELECT * FROM ap_bbs";
$result = $mysqli->query( $q);
$total_record = $result->num_rows;
?>
<?php if($total_record==0) :?>
    글이 없습니다.
<?php else :?>
 
<?php endif?>

<?php
if( isset($page) ) {
    $now_page = $page;
}
else {
    $now_page = 1;
}

$record_per_page = 5;
$start_record = $record_per_page*($now_page-1);
$record_to_get = $record_per_page;

if( $start_record+$record_to_get > $total_record) {
  $record_to_get = $total_record - $start_record;
}

$q = "SELECT * FROM ap_bbs WHERE 1 ORDER BY doc_idx DESC LIMIT $start_record, $record_to_get";
$result = $mysqli->query($q);






$page_per_block = 10;
$now_block = ceil($now_page / $page_per_block);

?>




        <th>글 목록</th><br />
        <a href="../bbs/write.php" class = "btn">글 작성</a>
<table class="table">
    <thead>
        <th>글번호</th>
        <th>제목</th>
        <th>작성자index</th>
        <th>등록일시</th>
    </thead>
<?php while($data = $result->fetch_array()) :?>
    <tr>
        <td><?php echo $data['doc_idx']?></td>
        


<td><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/bbs/view.php?doc_idx=<?php echo $data['doc_idx']; ?>" ><?php echo $data['subject']?></a></td>


        <td><?php echo $data['member_idx']?></td>
        <td><?php echo $data['reg_date']?></td>
    </tr>
    
<?php endwhile ?>


</table>

<div class="pagination">
    <ul>
<?php
$total_page = ceil($total_record / $record_per_page);
$total_block = ceil($total_page / $page_per_block);

if(1<$now_block ) {
  $pre_page = ($now_block-1)*$page_per_block;
  echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/bbs/list.php?page='.$pre_page.'">이전</a>';

}

$start_page = ($now_block-1)*$page_per_block+1;
$end_page = $now_block*$page_per_block;
if($end_page>$total_page) {
  $end_page = $total_page;
}

?>
    
<?php for($i=$start_page;$i<=$end_page;$i++) :?>
    <li><a href="./list.php?id=<?php echo $id ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
<?php endfor?>
</ul>
<?php
if($now_block < $total_block) {
  $post_page = ($now_block)*$page_per_block+1;
  echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/bbs/list.php?page='.$post_page.'">다음</a>';
}

?>
</div><!-- .pagination --> 

        
<?php
    include $_SERVER['DOCUMENT_ROOT'].'/footer.php';
?> 
