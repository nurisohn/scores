<style>
	.pagers {margin:3rem 0;}
</style>
<?/*=$_SERVER['PHP_SELF'];*/?>
<?/*=$_SERVER['DOCUMENT_ROOT'];*/?>
<div class="w3-center pagers">
	<div class="w3-bar w3-border">
	<?
	/*
	$pageTotal = 11			//전체페이지 수
	$G['PAGE'] = 2			//현재페이지
	$G['PCNT'] = 9			//한페이지에 보여질 게시글 갯수
	$G['PDIV'] = 3			//페이저안의 페이지 묶음 갯수
	$pagerCnt	-> 4개		//페이저 묶음의 갯수 (0,1,2,3)
	$pagerNow -> 0			//현재 표시될 페이저 묶음 
	$pagerPrev ->				// ['<']버튼을 눌렀을때 보여질 페이지
	$pagerNext ->				// ['>']버튼을 눌렀을때 보여질 페이지
	$n									// 현재페이지
	*/
	$pagerCnt = ceil($pageTotal/$G['PDIV']);
	$pagerNow = floor(($G['PAGE'] - 1) / $G['PDIV']);
	$pagerPrev = (($pagerNow - 1) * $G['PDIV']) + $G['PDIV'];
	$pagerNext = (($pagerNow + 1) * $G['PDIV']) + 1;
	if($pagerNow == 0) echo '<span class="w3-bar-item w3-button w3-dark-gray w3-disabled">&lt;</span>';
	else echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$pagerPrev.'" class="w3-bar-item w3-button w3-dark-gray">&lt;</a>';
	for($i=1; $i<=$G['PDIV']; $i++) {
		$n = $pagerNow * $G['PDIV'] + $i;
		if($n > $pageTotal) break;
		if($n == $G['PAGE']) $className = 'w3-indigo';
		else $className = '';
		echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$n.'" class="w3-bar-item w3-button '.$className.'">'.$n.'</a>';
	}
	if($pagerCnt - 1 == $pagerNow) echo '<span class="w3-bar-item w3-button w3-dark-gray w3-disabled">&gt;</span>';
	else echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$pagerNext.'" class="w3-bar-item w3-button w3-dark-gray">&gt;</a>';
	?>
	</div>
</div>