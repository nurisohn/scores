function init() {
	$.ajax({
		url: "sample_ok.php",
		type: "post",
		dataType: "json",
		data: {
			chk: "S"
		},
		success: function (data) {
			$("#datas").empty();
			var html = '';
			for (var i = 0; i < data.users.length; i++) {
				html = '<div id="d' + data.users[i].id + '" class="clear">';
				html += '<div class="w3-col l6 m6 s6 uid">' + data.users[i].userid + '&nbsp;</div>';
				html += '<div class="w3-col l6 m6 s6 uid2">';
				html += '<input type="text" id="userid' + data.users[i].id + '" class="w3-input w3-border" value="' + data.users[i].userid + '">';
				html += '</div>';
				html += '<div class="w3-col l6 m6 s6">';
				html += '<button class="w3-button w3-gray bt_up" onclick="up(' + data.users[i].id + ');" id="bt_up' + data.users[i].id + '">수정</button>';
				html += '<button class="w3-button w3-black bt_up2" onclick="up2(' + data.users[i].id + ');" id="bt2_up' + data.users[i].id + '">저장</button>';
				html += '<button class="w3-button w3-red bt_del" onclick="del(' + data.users[i].id + ');">삭제</button>';
				html += '</div>';
				html += '</div>';
				$("#datas").append(html);
				$(".uid2").hide();
				$(".bt_up2").hide();
			}
		},
		error: function (xhr, status, error) {
			console.log(xhr, status, error);
		}
	});
}
init();
$("#bt_wr").click(function () {
	var userid = $("#userid").val();
	if (userid == "") {
		alert("아이디를 입력하세요.");
		$("#userid").focus();
		return false;
	} else {
		$.ajax({
			url: "sample_ok.php",
			type: "post",
			dataType: "json",
			data: {
				chk: "I",
				userid: userid
			},
			success: function (data) {
				$("#userid").val('');
				init();
			},
			error: function (xhr, status, error) {
				console.log(xhr, status, error);
			}
		});
	}
});

function del(id) {
	$.ajax({
		url: "sample_ok.php",
		type: "post",
		dataType: "json",
		data: {
			chk: "D",
			id: id
		},
		success: function (data) {
			init();
		},
		error: function (xhr, status, error) {
			console.log(xhr, status, error);
		}
	});
}

function up(id) {
	var me = $("#bt_up" + id);
	var parent = me.parent().parent();
	$(".uid", parent).hide();
	$(".uid2", parent).show();
	$(".bt_up", parent).hide();
	$(".bt_up2", parent).show();
}

function up2(id) {
	$.ajax({
		url: "sample_ok.php",
		type: "post",
		dataType: "json",
		data: {
			chk: "U",
			id: id,
			userid: $("#userid" + id).val()
		},
		success: function (data) {
			init();
		},
		error: function (xhr, status, error) {
			console.log(xhr, status, error);
		}
	});
}