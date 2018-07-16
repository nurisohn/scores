<?
include_once '../inc/util.php';
include_once '../inc/connect.php';

$chk = '';
if(isset($_POST['chk'])) $chk = $_POST['chk'];
$id = '';
if(isset($_POST['id'])) $id = $_POST['id'];
$userid = '';
if(isset($_POST['userid'])) $userid = $_POST['userid'];

if($chk == "I") {
	$sql = "INSERT INTO sample SET userid='$userid' ";
	mysqli_query($db, $sql);
	$id = mysqli_insert_id($db);
	$str='{"result":true}';
	echo $str; 
}
else if($chk == "U") {
	$sql = "UPDATE sample SET userid='$userid' WHERE id=".$id;
	mysqli_query($db, $sql);
	$str='{"result":true}';
	echo $str;
}
else if($chk == "D") {
	$sql = "DELETE FROM sample WHERE id=".$id;
	mysqli_query($db, $sql);
	$str='{"result":true}';
	echo $str; 
}
else if($chk == "S") {
	//{"result":true, "users":[{"id":1, "userid":"hong"},{}]}
	$sql = " SELECT * FROM sample ORDER BY id DESC ";
	$result = mysqli_query($db, $sql);
	$str = '{"result":true, "users":[';
	while($rs=mysqli_fetch_array($result)){
		$str.= '{';
		$str.= '"id":'.$rs['id'].',';	
		$str.= '"userid":"'.$rs['userid'].'"';
		$str.= '},';
	}
	if(mysqli_num_rows($result) > 0) $str = substr($str, 0, -1);
	$str.= ']}';
	echo $str;
}
?>

