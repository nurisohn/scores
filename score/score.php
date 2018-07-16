<?
include_once '../inc/header.php';
include_once '../inc/top.php';
?>

<table class="table table-hover" id="scores">
	<colgroup>
		<col width="15%">
		<col width="12%">
		<col width="12%">
		<col width="12%">
		<col width="12%">
		<col width="12%">
		<col width="25%">
	</colgroup>
	<thead>
		<tr>
			<th>이름</th>
			<th>국어</th>
			<th>영어</th>
			<th>수학</th>
			<th>총점</th>
			<th>평균</th>
			<th>비고</th>
		</tr>
	</thead>
	<tbody id="tbodyScore">
		<tr id="score_in">
			<td>
				<input type="text" name="stdname" id="stdname" placeholder="이름">
			</td>
			<td>
				<input type="text" name="kor" id="kor" placeholder="국어" maxlength="3" class="onlyScore">
			</td>
			<td>
				<input type="text" name="eng" id="eng" placeholder="영어" maxlength="3" class="onlyScore">
			</td>
			<td>
				<input type="text" name="math" id="math" placeholder="수학" maxlength="3" class="onlyScore">
			</td>
			<td class="score_tot"></td>
			<td class="score_avg"></td>
			<td class="bts">
				<button id="bt_save" class="w3-button w3-gray">저장</button>
			</td>
		</tr>
	</tbody>
</table>
<? include_once '../inc/footer.php'; ?>
