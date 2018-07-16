<?
include '../inc/util.php';
include '../inc/connect.php';
$userid = '';
$userpw = '';
$username = '';
$email = '';
if(isset($_POST['userid'])) $userid = $_POST['userid'];
if(isset($_POST['userpw'])) $userpw = $_POST['userpw'];
if(isset($_POST['username'])) $username = $_POST['username'];
if(isset($_POST['email'])) $email = $_POST['email'];

$sql = " SELECT count(*) FROM member WHERE ";
$sql.= " userid = '$userid' OR email = '$email' ";
$result = mysqli_query($db, $sql);
$rs = mysqli_fetch_array($result);
if($rs[0] == 0) {
	//$sql = " INSERT INTO member (userid, userpw, username, email, wdate, lev) values ('','','','','','')";
	$sql = " INSERT INTO member SET ";
	$sql.= " userid = '$userid', ";
	$sql.= " userpw = '$userpw', ";
	$sql.= " username = '$username', ";
	$sql.= " email = '$email', ";
	$sql.= " wdate = '".date('Y-m-d H:i:s')."', ";
	$sql.= " lev = '2' ";
	//echo $sql;
	$result = mysqli_query($db, $sql);
	if($result === true) {
?>
	<script>
	alert("회원가입이 완료되었습니다.");
	location.href= "main.php";
	</script>
<? 
	} 
} else {
?>
	<script>
	alert("중복되는 아이디나 이메일이 존재합니다.\n회원이신지 확인하세요.");
	location.href= "main.php";
	</script>
<? } ?>








































