<?
include_once '../inc/init.php';
include_once '../inc/util.php';
include_once '../inc/connect.php';

$stdname = save_str($_POST['stdname']);
$kor = intval(save_str($_POST['kor']));
$eng = intval(save_str($_POST['eng']));
$math = intval(save_str($_POST['math']));
$tot = $kor + $eng + $math;
$avg = number_format($tot/3, 2, '.', '');

//" insert into score (stdname, kor) values ('홍길동', 80) ";
//" insert into score set stdname = '홍길동', kor = 90 ";
//$sql = $sql." a "; -> $sql.= " a ";
//$sql.= " stdname = '".$stdname."', ";
$sql = " insert into score set ";
$sql.= " stdname 			= '$stdname', ";
$sql.= " kor 					= '$kor', ";
$sql.= " eng 					= '$eng', ";
$sql.= " math 				= '$math', ";
$sql.= " tot 					= '$tot', ";
$sql.= " avg 					= '$avg', ";
$sql.= " wdate 				= '".date("Y-m-d H:i:s")."' ";
//echo $sql;
mysqli_query($db, $sql);
?>
<meta charset="utf-8">
<script>
alert("<?=$stdname?>님의 성적이 저장되었습니다.");
location.href = "sql.php"; 
</script>


























