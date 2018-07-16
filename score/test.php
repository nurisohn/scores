<? include "../inc/connect.php" ?>
<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>회원가입</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	html, body {font-size:20px;}
	.wrap {width:100%; max-width:800px; margin:60px auto;}
	input {font-size:1.25rem; margin-top:0.5rem;}
	button {margin-top:0.5rem;}
</style>
</head>
<body>
<div class="wrap">
	<form name="test_form" method="post" action="test_in.php">
		<h3>데이터 입력</h3>
		<input type="text" name="userid" placeholder="아이디"><br>
		<input type="text" name="userpw" placeholder="비번"><br>
		<input type="text" name="username" placeholder="이름"><br>
		<button class="w3-button w3-black">저장</button>
	</form>
</div>
<?
//if(!empty($_GET[id]) && !is_null($_GET[id])) { 
if(emptyNo($_GET[id])) {
	$sql = " SELECT * FROM test1 WHERE id='$_GET[id]' ";
	$result = mysqli_query($connect, $sql);
	$rs = mysqli_fetch_array($result);
?> 
<div class="wrap">
	<form name="test_form" method="post" action="test_up.php">
		<h3>데이터 수정</h3>
		<input type="hidden" name="id" value="<?=$rs[id]?>">
		<input type="text" name="userid" value="<?=$rs[userid]?>" placeholder="아이디"><br>
		<input type="text" name="userpw" value="<?=$rs[userpw]?>" placeholder="비번"><br>
		<input type="text" name="username" value="<?=$rs[username]?>" placeholder="이름"><br>
		<button class="w3-button w3-black">저장</button>
	</form>
</div>
<? } ?>
<div class="wrap">
	<h3>
	데이터 리스트 <small><a href="test.php">전체보기</a></small>
	</h3>
	<?
	//mysql_query($sql) 5.5이하
	$sql = " SELECT * FROM test1 ORDER BY id DESC "; //ASC
	$result = mysqli_query($connect, $sql); 
	while($rs = mysqli_fetch_array($result)) {
		$id = $rs[id];
		$userid = $rs[userid];
		$userpw = $rs[userpw];
		$username = $rs[username];
	?>
		<span><?=$id?> | </span>
		<span><?=$userid?> | </span>
		<span><?=$userpw?> | </span>
		<span><?=$username?> | </span>
		<span><a href="test.php?id=<?=$id?>">수정</a> | </span>
		<span><a href="test_del.php?id=<?=$id?>">삭제</a> </span>
		<br> 
	<? } ?>
</div>
</body>
</html>












