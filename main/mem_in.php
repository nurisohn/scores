<? 
include_once '../inc/header.php';
include_once '../inc/top.php';
?>
<div class="join_tits">
	<h2>
	<span class="glyphicon glyphicon-user"></span>
	Member Join
	</h2>
</div>
<form name="joinForm" method="post" action="join_ok.php">
	<ul id="joins" class="clear">
		<li class="join_tit">아이디</li>
		<li class="join_input">
			<input type="text" class="w3-input w3-border req" name="userid" placeholder="아이디">
		</li>
		<li class="join_tit">패스워드</li>
		<li class="join_input"><input type="text" class="w3-input w3-border req" name="userpw" placeholder="패스워드"></li>
		<li class="join_tit">이름</li>
		<li class="join_input"><input type="text" class="w3-input w3-border req" name="username" placeholder="이름"></li>
		<li class="join_tit">이메일</li>
		<li class="join_input"><input type="text" class="w3-input w3-border req" name="email" placeholder="이메일"></li>
	</ul>
	<div class="join_bts">
		<button type="button" id="join_bt" class="w3-button w3-red">확인</button>
		<button type="reset" class="w3-button w3-dark-grey">재작성</button>
	</div>
</form>
<? include_once '../inc/footer.php' ?>


























