$(".ins_data").hide();
$("#stdname").focus();
$(document).on("input", ".numOnly", function () {
	this.value = this.value.replace(/[^0-9\.]/g, '');
	if (Number(this.value) > 100) this.value = 100;
});
$(".bt_del").click(function(){
	if(confirm("진짜루~ 삭제하시겠습니까?")) {
		var id = $(this).attr("data");
		location.href = "score_delete.php?id="+id;
	}
});
$(".bt_update").click(function(){
	var tr = $(this).parent().parent();
	var f = $("#score_in_form");
	$("input[name='id']", f).val($(this).attr("data"));
	$("input[name='stdname']", f).val($("input[name='stdname']", tr).val());
	$("input[name='kor']", f).val($("input[name='kor']", tr).val());
	$("input[name='eng']", f).val($("input[name='eng']", tr).val());
	$("input[name='math']", f).val($("input[name='math']", tr).val());
	f.submit(); 
});
$(".bt_up").click(function(){
	var tr = $(this).parent().parent();
	$(".ori_data", tr).hide();
	$(".ins_data", tr).show();
});
$(".bt_cancel").click(function(){
	var tr = $(this).parent().parent();
	$(".ori_data", tr).show();
	$(".ins_data", tr).hide();
});



















