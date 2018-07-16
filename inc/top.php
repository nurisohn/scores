<div id="navs" class="w3-bar w3-black">
	<a href="../main/main.php" class="w3-bar-item w3-button w3-mobile">Home</a>
	<a href="../score/sql.php" class="w3-bar-item w3-button w3-mobile">PHP 성적관리</a>
	<a href="../score/score.php" class="w3-bar-item w3-button w3-mobile">Ajax/Json 성적관리</a>
	<a href="#" class="w3-bar-item w3-button w3-mobile">일반게시판</a>
	<a href="../gallery/g_list.php" class="w3-bar-item w3-button w3-mobile">갤러리게시판</a>
	<a id="music_bt" class="w3-bar-item w3-button w3-mobile fr">
		<i class="fa fa-pause-circle-o"></i>
	</a>
	<? if(emptyNo($_SESSION['UID'])) { ?>
		<a href="../main/logout.php" class="w3-bar-item w3-button w3-mobile fr">
			<i class="fa fa-sign-out"></i>
		</a>
		<a href="#" class="w3-bar-item w3-button w3-mobile fr">
			<?=$_SESSION['UID']?>
		</a>
		<? } else { ?>
			<a href="../main/main.php" class="w3-bar-item w3-button w3-mobile fr">
				로그인
			</a>
			<a href="../main/mem_in.php" class="w3-bar-item w3-button w3-mobile fr">회원가입</a>
			<? } ?>
</div>
<div class="jumbotron">
	<h2>
		<?=$jumboH2[$fileName[1]]?>
	</h2>
	<h4>
		<?=$jumboH4[$fileName[1]]?>
	</h4>
</div>
<audio id="music" autoplay loop>
	<source src="" type="audio/mpeg">
</audio>
<!-- 내용 시작 -->