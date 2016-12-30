<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/preset.php';
?>
<?php

$q = "DELETE FROM ap_bbs WHERE doc_idx=$doc_idx";
$result = $mysqli->query($q);

if ($result==false) {
    $_SESSION['delete_status'] = 'NO';
}
else {
    $_SESSION['delete_status'] = 'YES';
}

//$result->free();

$mysqli->close();
//var_dump($url);

header('Location: '.$url['root'].'bbs/delete_done.php');
exit();

?> 