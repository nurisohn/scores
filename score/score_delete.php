<?
include_once '../inc/init.php';
include_once '../inc/util.php';
include_once '../inc/connect.php';

$id = $_GET['id'];
$sql = " delete from score where id = '$id' ";
$result = mysqli_query($db, $sql);
if($result) {
?>
	<meta charset="utf-8">
	<script>
	alert("데이터가 삭제되었습니다.");
	location.href = "sql.php"; 
	</script>
<? } else { ?>
	<meta charset="utf-8">
	<script>
	alert("서버가 정상작동 하지 않았습니다.\n다시 시도해 주세요");
	location.href = "sql.php"; 
	</script>
<? } ?>




