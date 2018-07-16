<? 
include_once '../inc/header.php'; 
include_once '../inc/top.php';

$id = '';
if(isset($_REQUEST['id'])) $id = $_REQUEST['id'];
if(emptyNo($id)) {
  $sql = " SELECT * FROM gallery WHERE id='$id' ";
  $result = mysqli_query($db, $sql);
  $rs = mysqli_fetch_array($result);
  $chk = 'U';
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
}
else {
  $chk = 'I';
  $title = '';
  $writer = '';
  $email = '';
  $wdate = '';
  $content = '';
  $pds = '';
}
?>
  <section class="board_wrap">
    <form name="g_wr_form" method="post" action="g_wr_ok.php" onsubmit="return gSubmit();" enctype="multipart/form-data">
      <input type="hidden" name="chk" value="<?=$chk?>">
      <input type="hidden" name="id" value="<?=$id?>">
      <table class="table table-border">
        <colgroup>
          <col width="25%">
          <col width="75%">
        </colgroup>
        <tbody>
          <tr>
            <td>제목
              <span class="fa fa-asterisk w3-text-red"></span>
            </td>
            <td>
              <input type="text" name="title" class="w3-input w3-border" placeholder="제목" value="<?=$title?>">
            </td>
          </tr>
          <tr>
            <td>작성자
              <span class="fa fa-asterisk w3-text-red"></span>
            </td>
            <td>
              <input type="text" name="writer" class="w3-input w3-border" placeholder="작성자" value="<?=$writer?>">
            </td>
          </tr>
          <tr>
            <td>이메일</td>
            <td>
              <input type="text" name="email" class="w3-input w3-border" placeholder="작성자 이메일" value="<?=$email?>">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <textarea name="content" class="w3-input w3-border" rows="10" placeholder="내용을 작성하세요"><?=$content?></textarea>
            </td>
          </tr>
          <tr>
            <td>첨부이미지</td>
            <td>
              <? if(emptyNo($pds)) { ?>
                <div class="pds_thumb">
                  <?=$img?>
                  <div data-id="<?=$id?>" data-pds="<?=$pds?>">x</div>
                </div>
              <? } ?>
              <input type="file" name="pds" class="w3-input w3-border">
              <div class="w3-text-red">
                * gif, png, jpg, jpeg 만 첨부 가능
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2" class="w3-center">
              <button type="submit" id="bt_save" class="w3-button w3-indigo">저장</button>
              <button type="reset" class="w3-button w3-dark-gray">재작성</button>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </section>
  <? include_once '../inc/footer.php'; ?>