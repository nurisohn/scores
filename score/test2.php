<?
include "../inc/connect.php";	
?>
<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<title>예제1</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
@import "../css/base.css";
.wrap {width:100%; max-width:800px; margin:100px auto; font-size:2rem;}
.wrap > div {border-bottom:1px solid #999;}
.wrap > div > div {float:left; min-width:130px; padding:10px;}
input {width:140px;}
</style> 
</head>

<body>
<form name="form_in" method="post" action="test2_in.php">
<div class="wrap">
	<div class="clear">
		<div><input type="text" name="userid" placeholder="아이디"></div>
		<div><input type="text" name="userpw" placeholder="패스워드"></div>
		<div><input type="text" name="username" placeholder="이름"></div>
		<div><button class="w3-button w3-black">저장</button></div>
	</div>
</div>
</form>
<? 
$id = '';	
if(isset($_GET['id'])) $id = $_GET['id']; 	
if(emptyNo($id)) { 
	$sql = " SELECT * FROM test1 WHERE id='$id' ";
	$result = mysqli_query($connect, $sql);
	$rs = mysqli_fetch_array($result);
?>
<form name="form_up" method="post" action="test2_up.php">
<input type="hidden" name="id" value="<?=$rs['id']?>">
<div class="wrap">
	<div class="clear">
		<div><input type="text" name="userid" value="<?=$rs['userid']?>"></div>
		<div><input type="text" name="userpw" value="<?=$rs['userpw']?>"></div>
		<div><input type="text" name="username" value="<?=$rs['username']?>"></div>
		<div><button class="w3-button w3-black">저장</button></div>
	</div>
</div>
</form>
<? } ?>
<div class="wrap">
<?
$sql = " SELECT * FROM test1 ORDER BY id DESC ";
$result = mysqli_query($connect, $sql);	
while($rs = mysqli_fetch_array($result)) {
?>
	<div class="clear">
		<div><?=$rs['id']?></div>
		<div><?=$rs['userid']?></div>
		<div><?=$rs['userpw']?></div>
		<div><?=$rs['username']?></div>
		<div>
			<a href="test2_del.php?id=<?=$rs['id']?>"><button class="w3-button w3-black">삭제</button></a>
		</div>
		<div>
			<a href="test2.php?id=<?=$rs['id']?>"><button class="w3-button w3-red">수정</button></a>
		</div>
	</div>
<? } ?>
</div>
</body>
</html>








