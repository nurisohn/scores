/***** AJax 객체를 생성하여 데이터/콜백 전달 */
// 문서가 로드되면 최초 한번 실행
var ajax = new AjaxObj("score_ok.php");
var score;
var tr = [];
ajax.commit({
	chk: "S"
}, scoreCallback);

// SELECT Callback
function scoreCallback(data) {
	score = new Score($("#tbodyScore"), $("#score_in"));
	score.init(data);
	$("#bt_save").click(function () {
		score.insert();
	});
}

//INSERT Callback
function insertCallback(data) {
	console.log(data);
	if (data.result) {
		tr = new Tr(score.parent);
		tr.init({
			id: data.id,
			stdname: data.stdname,
			kor: data.kor,
			eng: data.eng,
			math: data.math,
			avg: data.avg,
			tot: data.tot
		});
	}
}

//DELETE Callback
function deleteCallback(data) {
	if (data.result) {

		$("#tr" + data.id, score.parent).remove();
	}
}

//UPDATE Callback
function updateCallback(data) {
	if (data.result) {
		tr.init({
			id: data.id,
			stdname: data.stdname,
			kor: data.kor,
			eng: data.eng,
			math: data.math,
			avg: data.avg,
			tot: data.tot
		}, $("#tr" + data.id).prev());
	}
}

/***** Score 객체 *****/
// init() -> 점수생성
// insert() -> 입력한 데이터만 삽입
// delete() -> 선택된 tr 자체만 삭제
// update() -> 선택된 tr 자체만 업데이트
var Score = (function () {
	function Score(_parent, _ignore) {
		this.parent = _parent;
		this.ignore = _ignore;
		if (this.ignore != '')
			this.parent.filter(this.ignore).empty();
		else
			this.parent.empty();
	}
	//초기 데이터 생성
	Score.prototype.init = function (data) {
		console.log(data);
		var html = '';
		var tot = 0;
		var avg = 0;
		tr = new Tr(this.parent);
		for (i in data.scores) {
			tot = data.scores[i].kor + data.scores[i].eng + data.scores[i].math;
			avg = tot / 3;
			tr.init({
				id: data.scores[i].id,
				stdname: data.scores[i].stdname,
				kor: data.scores[i].kor,
				eng: data.scores[i].eng,
				math: data.scores[i].math,
				tot: tot,
				avg: avg
			});
		}
	}
	//입력한 데이터를 score_ok.php에 ajax로 전송
	Score.prototype.insert = function () {
		var stdname = $("#stdname").val();
		var kor = Number($("#kor").val());
		var eng = Number($("#eng").val());
		var math = Number($("#math").val());
		var tot = kor + eng + math;
		var avg = tot / 3;
		ajax.commit({
			chk: "I",
			stdname: stdname,
			kor: kor,
			eng: eng,
			math: math,
			tot: tot,
			avg: avg
		}, insertCallback);
	}
	//삭제할 id를 score_ok.php에 ajax로 전송
	Score.prototype.delete = function (id) {
		ajax.commit({
			chk: "D",
			id: id
		}, deleteCallback);
	}
	Score.prototype.update = function (id) {
		var tr = $("#tr" + id);
		var stdname = $("input[name='stdname']", tr).val();
		var kor = Number($("input[name='kor']", tr).val());
		var eng = Number($("input[name='eng']", tr).val());
		var math = Number($("input[name='math']", tr).val());
		var tot = kor + eng + math;
		var avg = tot / 3;
		console.log(id, stdname, kor, eng, math, tot, avg);
		ajax.commit({
			chk: "U",
			id: id,
			stdname: stdname,
			kor: kor,
			eng: eng,
			math: math,
			tot: tot,
			avg: avg
		}, updateCallback);
	}
	return Score;
}());

/***** TR생성 ******/
var Tr = (function () {
	function Tr(_parent) {
		this.parent = _parent;
	}
	Tr.prototype.init = function (_data, prev = "") {
		this.data = _data;
		var html = '<tr id="tr' + this.data.id + '">';
		html += '<td>' + this.data.stdname + '</td>';
		html += '<td>' + this.data.kor + '</td>';
		html += '<td>' + this.data.eng + '</td>';
		html += '<td>' + this.data.math + '</td>';
		html += '<td>' + this.data.tot + '</td>';
		html += '<td>' + this.data.avg.toFixed(2) + '</td>';
		html += '<td>';
		html += '<button class="w3-button w3-black del_bt" data="' + this.data.id + '">삭제</button> ';
		html += '<button class="w3-button w3-red up_bt" data="' + this.data.id + '">수정</button>';
		html += '</td>';
		html += '</tr>';
		if (prev == "") this.parent.append(html);
		else {
			$("#tr" + this.data.id).remove();
			prev.after(html);
		}
		tr[this.data.id] = $("#tr" + this.data.id);
		$("input[type='text']", score.ignore).val("");
		$(".del_bt", tr[this.data.id]).click(function (e) {
			score.delete($(this).attr("data"));
		});
		$(".up_bt", tr[this.data.id]).click(function () {
			var id = $(this).attr("data");
			tr[id].children(":nth-child(1)").html('<input type="text" name="stdname" value="' + tr[id].children(":nth-child(1)").html() + '">');
			tr[id].children(":nth-child(2)").html('<input type="text" class="onlyScore"  name="kor" value="' + tr[id].children(":nth-child(2)").html() + '">');
			tr[id].children(":nth-child(3)").html('<input type="text" class="onlyScore"  name="eng" value="' + tr[id].children(":nth-child(3)").html() + '">');
			tr[id].children(":nth-child(4)").html('<input type="text" class="onlyScore"  name="math" value="' + tr[id].children(":nth-child(4)").html() + '">');
			tr[id].children(":nth-child(7)").html('<button class="w3-button w3-black" data="' + id + '">삭제</button> <button class="w3-button w3-pink save_bt" data="' + id + '">저장</button>');
			$(".save_bt", tr[id]).click(function () {
				score.update($(this).attr("data"));
			});
		});
	}
	return Tr;
}());