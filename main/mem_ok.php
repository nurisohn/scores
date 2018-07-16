<?
include_once '../inc/init.php';
include_once '../inc/util.php';
include_once '../inc/connect.php';

$userid = '';
$userpw = '';
if(isset($_POST['userid'])) $userid = $_POST['userid'];
if(isset($_POST['userpw'])) $userpw = $_POST['userpw'];

$sql = " SELECT count(*) FROM member ";
$sql.= " WHERE userid='$userid' AND userpw='$userpw' ";
$result = mysqli_query($db, $sql);
$rs = mysqli_fetch_array($result);
if($rs[0] < 1) {
	$_SESSION['UID'] = null;
?>
<script>
	alert("회원 아이디와 패스워드를 확인하세요.\n회원이 아니면 회원가입을 진행하세요.");
	location.href = 'main.php';
</script>
<? 
} else { 
	$_SESSION['UID'] = $userid;
?>
<script>
	alert("<?=$userid?>님 환영합니다.");
	location.href = 'main.php';
</script>
<? } ?>






