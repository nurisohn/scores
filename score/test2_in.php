<?
include "../inc/connect.php";

$userid = $_POST['userid'];
$userpw = $_POST['userpw'];
$username = $_POST['username'];
$sql = " INSERT INTO test1 SET userid='$userid', userpw='$userpw', username='$username' ";
$result = mysqli_query($connect, $sql);	
?>
<script>
location.href = "test2.php";
</script>