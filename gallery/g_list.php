<?
include_once '../inc/init.php';
include_once '../inc/util.php';
include_once '../inc/connect.php'; 
include_once '../inc/header.php'; 
include_once '../inc/top.php';
?>
<div id="wr_bt_wrap">
  <button type="button" class="w3-button w3-black" onclick="location.href='g_wr.php';">새글등록</button>
</div>
<section class="board_wrap">
  <div class="masonry_sizer"></div>
  <?
  $sql = " SELECT count(id) FROM gallery ";
  $result = mysqli_query($db, $sql);
  $rs = mysqli_fetch_array($result);
  $totalRs = $rs[0];
  $pageTotal = ceil($totalRs / $G['PCNT']);
  $pageStart = ($G['PAGE'] - 1) * $G['PCNT'];
  $sql = " SELECT * FROM gallery ORDER BY id DESC ";
  $sql.= " LIMIT $pageStart, {$G['PCNT']} ";
  $result = mysqli_query($db, $sql);
  while($rs=mysqli_fetch_array($result)) {
    $src = '/UPLOAD/'.substr($rs['pds'],0, 4).'/'.$rs['pds'];
    $title = decode_str($rs['title']);
  ?>
    <ul class="gallerys">
      <li>
        <a href="g_view.php?id=<?=$rs['id']?>&page=<?=$G['PAGE']?>">
          <? if(emptyNo($rs['pds'])) { ?>
          <img src="<?=$src?>" class="img hover hand">
          <? } else { ?>
          <img src="../img/noimg.jpg" class="img hover hand">  
          <? } ?>
        </a>
      </li>
      <li>
        <i class="fa fa-bars"></i> <?=$title?>
      </li>
    </ul>
  <? } ?>
</section>
<? include_once '../inc/pager.php';?>

<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script>
/***** g_list Masonry ******/
$(".board_wrap").imagesLoaded(function () {
  $(".board_wrap").masonry({
    itemSelector: '.gallerys',
    columnWidth: '.masonry_sizer',
    percentPosition: true,
    horizontalOrder: true
  });
});
</script>
<? include_once '../inc/footer.php'; ?>