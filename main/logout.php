<?
include '../inc/init.php';
$_SESSION = array();
session_unset();
?>
<meta charset="utf-8">
<script>
	alert("로그아웃 되었습니다.");
	location.href = 'main.php';
</script>