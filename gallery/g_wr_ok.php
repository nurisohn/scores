<?
include_once '../inc/init.php';
include_once '../inc/util.php';
include_once '../inc/connect.php';

$chk = '';
if(isset($_REQUEST['chk'])) $chk = $_REQUEST['chk'];
$id = '';
if(isset($_REQUEST['id'])) $id = $_REQUEST['id'];
$title = '';
if(isset($_POST['title'])) $title = save_str($_POST['title']);
$writer = '';
if(isset($_POST['writer'])) $writer = save_str($_POST['writer']);
$email = '';
if(isset($_POST['email'])) $email = save_str($_POST['email']);
$content = '';
if(isset($_POST['content'])) $content = save_str($_POST['content']);
$imgname = '';
if(isset($_POST['imgname'])) $imgname = $_POST['imgname'];
if(isset($_FILES['pds'])) {
  $pds = '';
  if(isset($_FILES['pds'])) $pds = $_FILES['pds'];
  if(emptyNo($_FILES['pds']['name'])) {
    $upFolder = $_SERVER['DOCUMENT_ROOT'].'/UPLOAD/'.date('ym').'/';
    if(!is_dir($upFolder)) {
      mkdir($upFolder, 0707);
      chmod($upFolder, 0707);
    }
  }
}
if($chk == "I") {
  if(emptyNo($_FILES['pds']['name'])) $upfile = fileUpload($pds, $upFolder, $WEB);
  $sql = " INSERT INTO gallery SET ";
  $sql.= " title = '$title', ";
  $sql.= " writer = '$writer', ";
  $sql.= " email = '$email', ";
  $sql.= " content = '$content', ";
  if(emptyNo($_FILES['pds']['name'])) {
    $sql.= " pds = '$upfile[0]', ";
    $sql.= " pdsname = '$upfile[1]', ";
  }
  else {
    $sql.= " pds = '', ";
    $sql.= " pdsname = '', ";
  }
  $sql.= " wdate = now() ";
  mysqli_query($db, $sql);
  echo '<script>location.href = "g_list.php";</script>';
}
else if($chk == "D") {
  if(emptyNo($id)) {
    $sql = " DELETE FROM gallery WHERE id='$id' ";
    mysqli_query($db, $sql);
    $sql = " SELECT pds FROM gallery WHERE id='$id' ";
    $result = mysqli_query($db, $sql);
    $rs = mysqli_fetch_array($result);
    @unlink($_SERVER['DOCUMENT_ROOT'].'/UPLOAD/'.substr($rs[0], 0, 4).'/'.$rs[0]);
  }
  echo '<script>location.href = "g_list.php?page='.$G['PAGE'].'";</script>';
}
else if($chk == "DI") {
  $sql = " UPDATE gallery SET pds='' WHERE id='$id' ";
  mysqli_query($db, $sql);
  $file = $_SERVER['DOCUMENT_ROOT'].'/UPLOAD/'.substr($imgname, 0, 4).'/'.$imgname;
  @unlink($file);
  echo '{"result":true}';
}
else if($chk == "U") {
  $sql = " UPDATE gallery SET ";
  $sql.= " title = '$title', ";
  $sql.= " writer = '$writer', ";
  $sql.= " email = '$email', ";
  $sql.= " content = '$content', ";
  if(emptyNo($_FILES['pds']['name'])) {
    $sql2 = " SELECT pds FROM gallery WHERE id='$id' ";
    $result = mysqli_query($db, $sql2);
    $rs = mysqli_fetch_array($result);
    @unlink($_SERVER['DOCUMENT_ROOT'].'/UPLOAD/'.substr($rs[0], 0, 4).'/'.$rs[0]);
    $upfile = fileUpload($pds, $upFolder, $WEB);
    $sql.= " pds = '$upfile[0]', ";
    $sql.= " pdsname = '$upfile[1]', ";
  }
  $sql.= " wdate = now() ";
  $sql.= " WHERE id='$id' ";
  mysqli_query($db, $sql);
  echo '<script>location.href = "g_list.php?page='.$G['PAGE'].'";</script>';
}
?>
