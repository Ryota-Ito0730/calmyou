$(function () {
  let dir_name = php_json[1];

  $(window).on('load', function () {
    let h1_text = dir_name.split("");
    let h1 = $('#loading h1');

    $.each(h1_text, function (idx, val) {
      let displayed_str = $(`<span>${h1_text[idx]}</span>`).css({
        'opacity': '0',
      });
      displayed_str.appendTo(h1).delay(idx * 220);
      displayed_str.animate({
        opacity: '1',
      }, 3000);
    });
    $('#loading').addClass('loaded');
  });
});//////////////////////