<?
include "../inc/connect.php";

$id = $_POST['id'];
$userid = $_POST['userid'];
$userpw = $_POST['userpw'];
$username = $_POST['username'];

$sql = " UPDATE test1 SET userid='$userid', userpw='$userpw', username='$username' WHERE id='$id' ";
mysqli_query($connect, $sql);
?>
<script>
location.href = "test.php";
</script>