<?
include_once '../inc/util.php';
include_once '../inc/connect.php';

$chk = '';
if(isset($_POST['chk'])) $chk = $_POST['chk'];
$id = '';
if(isset($_POST['id'])) $id = $_POST['id'];
$stdname = '';
if(isset($_POST['stdname'])) $stdname = $_POST['stdname'];
$kor = '';
if(isset($_POST['kor'])) $kor = $_POST['kor'];
$eng = '';
if(isset($_POST['eng'])) $eng = $_POST['eng'];
$math = '';
if(isset($_POST['math'])) $math = $_POST['math'];
$tot = '';
if(isset($_POST['tot'])) $tot = $_POST['tot'];
$avg = '';
if(isset($_POST['avg'])) $avg = $_POST['avg'];
$wdate = date("Y-m-d H:i:s");

if($chk == "I") {
	$sql = " INSERT INTO score SET ";
	$sql.= " stdname = '".$stdname."', ";
	$sql.= " kor = '".$kor."', ";
	$sql.= " eng = '".$eng."', ";
	$sql.= " math = '".$math."', ";
	$sql.= " tot = '".$tot."', ";
	$sql.= " avg = '".$avg."', ";
	$sql.= " wdate = '".$wdate."' ";
	$result = mysqli_query($db, $sql);
	$id = mysqli_insert_id($db);
	$str = '{"result":true,';
	$str.= '"id":"'.$id.'",';
	$str.= '"stdname":"'.$stdname.'",';
	$str.= '"kor":'.$kor.',';
	$str.= '"eng":'.$eng.',';
	$str.= '"math":'.$math.',';
	$str.= '"tot":'.$tot.',';
	$str.= '"avg":'.$avg;
	$str.= '}';
	echo $str;
}
else if($chk == "U") {
	$sql = " UPDATE score SET ";
	$sql.= " stdname = '".$stdname."', ";
	$sql.= " kor = '".$kor."', ";
	$sql.= " eng = '".$eng."', ";
	$sql.= " math = '".$math."', ";
	$sql.= " tot = '".$tot."', ";
	$sql.= " avg = '".$avg."', ";
	$sql.= " wdate = '".$wdate."' ";
	$sql.= " WHERE id=".$id;
	$result = mysqli_query($db, $sql);
	$str = '{"result":true,';
	$str.= ' "id":"'.$id.'", ';
	$str.= ' "stdname":"'.$stdname.'", ';
	$str.= ' "kor":'.$kor.', ';
	$str.= ' "eng":'.$eng.', ';
	$str.= ' "math":'.$math.', ';
	$str.= ' "tot":'.$tot.', ';
	$str.= ' "avg":'.$avg;
	$str.= '}';
	echo $str;
}
else if($chk == "D") {
	$sql = " DELETE FROM score WHERE id = ".$id;
	$result = mysqli_query($db, $sql);
	echo '{"result":true, "id":"'.$id.'"}';
}
else if($chk == "S") {
	$sql = " SELECT * FROM score ORDER BY id DESC ";
	$result = mysqli_query($db, $sql);
	$str = '{"result":true, "scores":[';
	if(mysqli_num_rows($result) > 0) {
		while($rs = mysqli_fetch_array($result)) {
			$str.= '{';
			$str.= ' "id":"'.$rs['id'].'", ';
			$str.= ' "stdname":"'.$rs['stdname'].'", ';
			$str.= ' "kor":'.$rs['kor'].', ';
			$str.= ' "eng":'.$rs['eng'].', ';
			$str.= ' "math":'.$rs['math'].', ';
			$str.= ' "tot":'.$rs['tot'].', ';
			$str.= ' "avg":'.$rs['avg'];
			$str.= '},';
		}
		$str = substr($str, 0, -1);
		$str.= ']}';
	}
	else $str = '{"scores":[]}';
	echo $str;
}
else {
	echo '{"result":false, "chk":'.$chk.'}';
}
?>














