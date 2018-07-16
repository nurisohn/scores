<?
//특수문자 처리
function decode_editor($str) {
	$str = html_entity_decode($str);
	$str = stripslashes($str);
	return $str;
}
function decode_naver($str) {
	$str = str_replace("\n", "", $str);
	$str = str_replace(chr(13), "", $str);
	$str = html_entity_decode($str);
	$str = stripslashes($str);
	return $str;
}
function decode_str($str) {
	$str = html_entity_decode($str);
	$str = str_replace("<br>", chr(13), $str);
	$str = stripslashes($str);
	return $str;
}
function save_editor($str) {
	$str = addslashes($str);
	$str = htmlentities($str, ENT_QUOTES, "UTF-8");
	return $str;
}
function save_str($str) {
	$str = addslashes($str);
	$str = str_replace(chr(13), "<br>", $str);
	$str = htmlentities($str, ENT_QUOTES, "UTF-8");
	return $str;
}
function trims($str) {
	return save_str(trim($str));
}
/* 날짜의 차이를 계산해 주는 함수 */
function dateDiff($date1, $date2) {
	$date1 = date_parse($date1);
	$date2 = date_parse($date2);
	return (
		(gmmktime(0, 0, 0, $date1['month'], $date1['day'], $date1['year']) - gmmktime(0, 0, 0, $date2['month'], $date2['day'], $date2['year']))/3600/24);
}
/* 시간의 차이를 계산해 주는 함수 */
function timeDiff($date1, $date2) {
	$date1 = date_parse($date1);
	$date2 = date_parse($date2);
	return (
		(gmmktime($date1['hour'], $date1['minute'], $date1['second'], $date1['month'], $date1['day'], $date1['year']) - gmmktime($date2['hour'], $date2['minute'], $date2['second'], $date2['month'], $date2['day'], $date2['year']))/3600);
}
/*** 변수가 존재하고 비어있지 않으면 TRUE ***/
function emptyNo($val) {
	if(isset($val)) {
		if(!empty($val) && !is_null($val)) return true;
		else return false;
	}
	else return false;
}
/*** 변수가 비어있으면 TRUE ***/
function emptyYes($val) {
	if(empty($val) || is_null($val)) return true;
	else return false;
}
/*** 파일업로드 / 성공하면 파일명,원본파일명을 리턴 ***/
/*
$_FILES['pds']['name'] => file이름
$_FILES['pds']['tmp_name'] => 서버가 임시로 부여한 이름
*/
$PDS = ['gif','jpg','jpeg','bmp','png','tif','tiff','zip','hwp','ppt','pptx','mp3','doc','docx','xls','xlsx','alx','pdf','txt'];
$IMG = ['gif','jpg','jpeg','bmp','png','tif','tiff'];
$WEB = ['gif','jpg','jpeg','png'];
function fileUpload($file, $folder, $allowExt) {
  $ext = strtolower(preg_replace('/^.*\.([^.]+)$/D','$1', $file['name']));
  $name = date('ymd').'_'.time().rand(10,99);
  if(in_array($ext, $allowExt)) {
    $files = array();
    $files[0] = $name.'.'.$ext;
    $files[1] = $file['name'];
    if(@move_uploaded_file($file['tmp_name'], $folder.$files[0])){
      @chmod($folder.$files[0], 0707);
      return $files;
    }
    else {
      exit('<script>alert("파일 업로드에 실패하였습니다."); history.go(-1);</script>');
    }
  }
  else {
    exit('<script>alert("'.$ext.' 파일은 업로드 하실 수 없습니다."); history.go(-1);</script>');
  }
}
?>