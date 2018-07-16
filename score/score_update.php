<?
include_once '../inc/init.php';
include_once '../inc/util.php';
include_once '../inc/connect.php';

$id = trims($_POST['id']);
$stdname = trims($_POST['stdname']);
$kor = intval(trims($_POST['kor']));
$eng = intval(trims($_POST['eng']));
$math = intval(trims($_POST['math']));
$tot = $kor + $eng + $math;
$avg = number_format($tot/3, 2, '.', '');

$sql = " update score set ";
$sql.= " stdname 			= '$stdname', ";
$sql.= " kor 					= '$kor', ";
$sql.= " eng 					= '$eng', ";
$sql.= " math 				= '$math', ";
$sql.= " tot 					= '$tot', ";
$sql.= " avg 					= '$avg', ";
$sql.= " wdate 				= '".date("Y-m-d H:i:s")."' ";
$sql.= " where id=".$id;
//echo $sql;
mysqli_query($db, $sql);
?>
<meta charset="utf-8">
<script>
alert("<?=$stdname?>님의 성적이 수정되었습니다.");
location.href = "sql.php"; 
</script>


























