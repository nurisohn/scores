<? 
include_once '../inc/header.php'; 
include_once '../inc/top.php';
?>
<form name="score_in_form" id="score_in_form" method="post" action="score_update.php">
	<input type="hidden" name="id" value="">  
	<input type="hidden" name="stdname" value="">
	<input type="hidden" name="kor" value="">
	<input type="hidden" name="eng" value="">
	<input type="hidden" name="math" value="">
</form>
<table id="scores" class="table table-hover">
	<thead>
		<tr>
			<th>이름</th>
			<th>국어</th>
			<th>영어</th>
			<th>수학</th>
			<th>총점</th>
			<th>평균</th>
			<th>입력일</th>
			<th>비고</th>
		</tr>
	</thead>
	<tbody>
		<form name="score_form" id="score_form" method="post" action="score_input.php">
			<tr>
				<td> 
					<input type="text" name="stdname" id="stdname">
				</td>
				<td>
					<input type="text" name="kor" id="kor" class="onlyScore">
				</td>
				<td>
					<input type="text" name="eng" id="eng" class="onlyScore">
				</td>
				<td>
					<input type="text" name="math" id="math" class="onlyScore">
				</td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td>
					<button class="w3-button w3-green">저장</button>
				</td>
			</tr>
		</form>
	<?
	$sql = " select * from score order by id desc ";
	$resuslt = mysqli_query($db, $sql);
	?>
	<? while($rs = mysqli_fetch_array($result)) { ?>
		<tr> 
			<td class="ori_data"><?=$rs['stdname']?></td>
			<td class="ins_data">
				<input type="text" name="stdname" value="<?=$rs['stdname']?>">
			</td>
			<td class="ori_data"><?=$rs['kor']?></td>
			<td class="ins_data">
				<input type="text" name="kor" value="<?=$rs['kor']?>" class="onlyScore">
			</td>
			<td class="ori_data"><?=$rs['eng']?></td>
			<td class="ins_data">
				<input type="text" name="eng" value="<?=$rs['eng']?>" class="onlyScore">
			</td>
			<td class="ori_data"><?=$rs['math']?></td>
			<td class="ins_data">
				<input type="text" name="math" value="<?=$rs['math']?>" class="onlyScore">
			</td>
			<td><?=$rs['tot']?></td>
			<td><?=$rs['avg']?></td>
			<td><?=substr($rs['wdate'], 0, 10)?></td>
			<td class="ori_data">
				<button class="w3-button w3-red bt_del" 
				data="<?=$rs['id']?>">삭제</button>
				<button class="w3-button w3-blue bt_up">수정</button>
			</td>
			<td class="ins_data">
				<button class="w3-button w3-orange bt_update" 
				data="<?=$rs['id']?>">확인</button>
				<button class="w3-button w3-gray bt_cancel">취소</button> 
			</td>
		</tr>
	<? } ?>
	</tbody>
</table>
<? include '../inc/footer.php' ?>














