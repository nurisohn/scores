var gWrForm = $("form[name='g_wr_form']");

function gSubmit() {
  if ($("input[name='title']", gWrForm).val() == "") {
    alert("제목을 입력하세요.");
    $("input[name='title']", gWrForm).focus();
    return false;
  }
  if ($("input[name='writer']", gWrForm).val() == "") {
    alert("작성자를 입력하세요.");
    $("input[name='writer']", gWrForm).focus();
    return false;
  }
  if ($("textarea[name='content']", gWrForm).val() == "") {
    alert("내용을 입력하세요.");
    $("textarea[name='content']", gWrForm).focus();
    return false;
  }
  return true;
}


$(".pds_thumb > div").click(function () {
  //var data = $(this).attr("data");
  var id = $(this).data("id");
  var pds = $(this).data("pds");
  var ajax = new AjaxObj("g_wr_ok.php");
  ajax.commit({
    chk: "DI",
    id: id,
    imgname: pds
  }, function (data) {
    console.log(data);
    $(".pds_thumb").remove();
  });
});