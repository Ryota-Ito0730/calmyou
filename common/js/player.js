// *************************************************
// 各テーマをクリック後のプレーヤー画面内の処理のうち、
// 最初に表示される要素に対しての処理はここに記載する。
// *************************************************
$(function () {

  // ↓ブラウザ読込時に表示される要素の個数番目とあわせる
  let num = 5;
  // ↓ブラウザ読込時の初期値↓(クリックと同時に表示を消す)
  $('ul.pltm_wrapp > li:nth-child(5)').addClass('on');
  // slowボタン押下時の処理
  $('.slow').on('click', function (e) {
    // ↓クリックされる度、指定要素の個数番目を増やす
    num++;
    // ↓連続クリック数が合計要素数を超えない限り、if内の処理を実行k
    if (!(num > 12)) {
      $(`ul.pltm_wrapp > li:nth-child(${num})`).addClass('on');
      $(`ul.pltm_wrapp > li:not(:nth-child(${num}))`).removeAttr('class');
      // ボタン表示非表示
      if (num >= 2) {
        $('button.fast').addClass('visible');
      }
      if (num >= 12) {
        $('button.slow').addClass('hidden');
        $('button.slow').removeClass('visible');
      }
    } else {
      // ↓連続クリック数が合計要素数を超えた後、それ以上の値にならないよう調整
      e.preventDefault();
      num--;
    }
  });
  // fastボタン押下時の処理
  $('.fast').on('click', function (e) {
    num--;
    if (!(num < 3)) {
      $(`ul.pltm_wrapp > li:nth-child(${num})`).addClass('on');
      $(`ul.pltm_wrapp > li:not(:nth-child(${num}))`).removeAttr('class');
      if (num <= 12) {
        $('button.fast').addClass('visible');
        $('button.slow').addClass('visible');
      }
      if (num == 3) {
        $('button.fast').removeClass('visible');
        $('button.fast').addClass('hidden');
      }
    } else {
      e.preventDefault();
      num++;
    }
  });
  // ===========================================
  // play duration time and select directory
  // ===========================================
  function slideNumber() {
    // total play files each directory.
    let files = php_json[0]; // 6
    // directory name on play files.
    let dir_name = php_json[1]; //dir_name
    // minimum value
    let mn = 1;
    // max value
    let mx = files;
    // designate number of image file
    let theme_num = Math.floor(Math.random() * mx) + mn;
    //basis : player.php
    let photo_wrapp = $("#photo_wrapp");
    let bgimg = `url("../common/img/main_themes/${dir_name}/${dir_name}_${theme_num}.jpg")`;

    photo_wrapp.css('background-image', bgimg).css({
      'opacity': '1',
      'transition': `opacity ${Math.floor(num - 1)}s`
    }).on('transitionend', function () {
      photo_wrapp.css({
        'opacity': '0',
        'transition': `opacity ${Math.floor(num - (num - 1)) - 0.1}s`
      });
    });

    setTimeout(slideNumber, `${num}000`);
  }

  slideNumber();

});//////////////////////

