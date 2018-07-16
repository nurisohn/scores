// 숫자만 입력받기
$(document).on("input", ".onlyNum", function () {
	this.value = this.value.replace(/[^0-9\.]/g, '');
});

// 점수만 입력받기
$(document).on("input", ".onlyScore", function () {
	this.value = this.value.replace(/[^0-9\.]/g, '');
	if (Number(this.value) > 100) this.value = 100;
});

// Ajax 객체
var AjaxObj = (function () {
	function AjaxObj(_file) {
		this.file = _file;
	}
	AjaxObj.prototype.commit = function (_data, _callback) {
		$.ajax({
			url: this.file,
			type: "post",
			dataType: "json",
			data: _data,
			success: _callback,
			error: function (status, xhr, error) {
				console.log(status, xhr, error);
			}
		});
	}
	return AjaxObj;
}());


// <input id="" value="100,000"> --> <input id="" value="100000">
function vCommaHide(obj) {
	var str = "" + String(obj.value).replace(/,/gi, '');
	obj.value = str;
}
// <input id="" value="100000"> --> <input id="" value="100,000">
function vCommaShow(obj) {
	var str = "" + String(obj.value).replace(/,/gi, '');
	var regx = new RegExp(/(-?\d+)(\d{3})/);
	var bExists = str.indexOf(".", 0);
	var strArr = str.split('.');
	while (regx.test(strArr[0])) {
		strArr[0] = strArr[0].replace(regx, "$1,$2");
	}
	if (bExists > -1) val = strArr[0] + "." + strArr[1];
	else val = strArr[0];
	obj.value = val;
}
// 100000 --> 100,000
function vComma(val) {
	var str = "" + String(val).replace(/,/gi, '');
	var regx = new RegExp(/(-?\d+)(\d{3})/);
	var bExists = str.indexOf(".", 0);
	var strArr = str.split('.');
	while (regx.test(strArr[0])) {
		strArr[0] = strArr[0].replace(regx, "$1,$2");
	}
	if (bExists > -1) val = strArr[0] + "." + strArr[1];
	else val = strArr[0];
	return val;
}
// 100,000 --> 100000
function vCommaDel(vals) {
	var str = "" + String(vals).replace(/,/gi, '');
	return Number(str);
}

// IE 버전 확인
function get_version_of_IE() {
	var word = "";
	var agent = navigator.userAgent.toLowerCase();
	// IE old version ( IE 10 or Lower )
	if (navigator.appName == "Microsoft Internet Explorer") word = "msie";
	// IE 11
	else if (agent.search("trident") > -1) word = "trident/.*rv:";
	// Microsoft Edge
	else if (agent.search("edge/") > -1) word = "edge/";
	// 그외, IE가 아니라면 ( If it's not IE or Edge )
	else return -1;
	var reg = new RegExp(word + "([0-9]{1,})(\\.{0,}[0-9]{0,1})");
	if (reg.exec(agent) != null) return parseFloat(RegExp.$1 + RegExp.$2);
	return -1;
}

/***** 음악플레이어 ******/
$("#music_bt").click(function () {
	console.log(this);
	console.log($(this));
	if ($(".fa", $(this)).hasClass("fa-play-circle-o")) {
		//Pause
		$(".fa", $(this)).removeClass("fa-play-circle-o");
		$(".fa", $(this)).addClass("fa-pause-circle-o");
		$("#music")[0].play();
	} else {
		//Play
		$(".fa", $(this)).removeClass("fa-pause-circle-o");
		$(".fa", $(this)).addClass("fa-play-circle-o");
		$("#music")[0].pause();
	}
});



/*
var Car = (function(){
	function Car(_name, _color) {
		this.name = _name;
		this.color = _color;
	}
	Car.prototype.drive = function(speed) {
		console.log(this.name+" 이(가) "+speed+" 속도로 달립니다.");
	}
	Car.prototype.stop = function() {
		console.log(this.name+" 이(가) 멈췄습니다.");
	}
	return Car;
}());
var myCar = new Car("나의똥차", "Accent RED");
console.log(myCar.name);
console.log(myCar.color);
myCar.drive("100km");
myCar.stop();
var myCar2 = new Car("나의 신차", "Blue");
console.log(myCar2.name);
console.log(myCar2.color);
myCar2.drive("120km");
myCar2.stop();
*/