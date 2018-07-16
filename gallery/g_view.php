<?
include_once '../inc/init.php';
include_once '../inc/util.php';
include_once '../inc/connect.php'; 
include_once '../inc/header.php'; 
include_once '../inc/top.php';
$id = '';
if(isset($_GET['id'])) $id = $_GET['id'];
if(emptyNo($id)) {
  $sql = " SELECT * FROM gallery WHERE id='$id' ";
  $result = mysqli_query($db, $sql);
  $rs = mysqli_fetch_array($result);
  $id = $rs['id'];
  $title = decode_str($rs['title']);
  $writer = decode_str($rs['writer']);
  $email = decode_str($rs['email']);
  $wdate = $rs['wdate'];
  $content = decode_str($rs['content']);
  $pds = $rs['pds'];
  if(emptyNo($pds)) {
    $src = '/UPLOAD/'.substr($rs['pds'], 0, 4).'/'.$rs['pds'];
    $img = '<img src="'.$src.'" class="img">';
  }
  else {
    $img = '<i class="w3-text-gray">등록된 이미지가 없습니다.</i>';
  }
}
?>
  <ul class="board_wrap board_view clear">
    <li class="gv_tit l2 m2 w3-col">제목</li>
    <li class="gv_cont l5 m5 w3-col"><b><?=$title?></b></li>
    <li class="gv_tit l2 m2 w3-col">작성일</li>
    <li class="gv_cont l3 m3 w3-col"><?=$wdate?></li>
    <? if($email == "") { ?>
    <li class="gv_tit l2 m2 w3-col">작성자</li>
    <li class="gv_cont l10 m10 w3-col"><?=$writer?></li>
    <? } else { ?>
      <li class="gv_tit l2 m2 w3-col">작성자</li>
      <li class="gv_cont l5 m5 w3-col"><?=$writer?></li>
      <li class="gv_tit l2 m2 w3-col">이메일</li>
      <li class="gv_cont l3 m3 w3-col"><?=$email?></li>
    <? } ?>
    <li class="gv_cont l12 m12 w3-col">
      <p><?=$img?></p>
      <p style="margin-top:3rem;"><?=$content?></p>
    </li>
    <li class="gv_cont l12 m12 w3-col w3-center">
      <button class="w3-button w3-red" onclick="delData(<?=$id?>);">삭제</button>
      <a href="g_wr.php?page=<?=$G['PAGE']?>&id=<?=$id?>"><button class="w3-button w3-indigo">수정</button></a>
      <a href="g_list.php?page=<?=$G['PAGE']?>"><button class="w3-button w3-dark-gray">목록보기</button></a>
    </li>
  </ul>
  <script>
    function delData(id) {
      if(id != '') {
        if(confirm("정말로 삭제하시겠습니까?")) {
          location.href = 'g_wr_ok.php?chk=D&id='+id;
        }
      }
    }
  </script>
  <? include_once '../inc/footer.php'; ?>