<? 
include_once '../inc/header.php'; 
include_once '../inc/top.php';

if(emptyYes($_SESSION['UID'])) {
	include_once '../inc/md_login.php';
}
else {
	include_once '../inc/md_main.php';
}

include_once '../inc/footer.php' 
?>


























