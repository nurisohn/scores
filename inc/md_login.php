<div class="login_tits">
	<h2>
	<span class="glyphicon glyphicon-user"></span>
	Login
	</h2>
</div>
<form name="memForm" method="post" action="mem_ok.php" onsubmit="return loginChk();">
	<ul id="logins">
		<li><input type="text" class="w3-input w3-border" name="userid" placeholder="아이디" value="test"></li>
		<li><input type="password" class="w3-input w3-border" name="userpw" placeholder="패스워드" value="1111"></li>
	</ul>
	<div class="login_bts">
		<button type="submit" id="mem_bt" class="w3-button w3-red">로그인</button>
		<a href="mem_in.php"><button type="button" id="mem_join" class="w3-button w3-black">회원가입</button></a>
	</div>
</form>