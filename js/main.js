function loginChk() {
	var f = document.memForm;
	if(f.userid.value == "") {
		alert("아이디를 입력하세요.");
		f.userid.focus();
		return false;
	}
	if(f.userpw.value == "") {
		alert("패스워드를 입력하세요.");
		f.userpw.focus();
		return false;
	}
	return true;
}

/*$("#mem_join").click(function(){
	location.href = "mem_in.php";
});*/

$("#join_bt").click(function(){
	var f = document.joinForm;
	var chk = true;
	for(var i=0; i<$(".req").length; i++){
		if($(".req").eq(i).val() == "") {
			alert($(".req").eq(i).attr("placeholder") + "은(는) 필수입력사항 입니다.");
			$(".req").eq(i).focus();
			chk = false;
			break;
		}
		/*if($(".req").eq(i).val() == "") {
			alert($(this).attr("palceholder")+"는(은) 필수입력사항 입니다.")
		}*/
	}
	if(chk) f.submit();
});















