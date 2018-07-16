<?
include "../inc/connect.php";
$id = $_GET['id'];
$sql = " DELETE FROM test1 WHERE id='$id' ";
mysqli_query($connect, $sql);
?>
<script>
location.href = "test.php"; 
</script>