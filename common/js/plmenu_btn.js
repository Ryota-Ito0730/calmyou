$(function () {
  $('.pl_ctrl_btn').addClass('tl_y');
  // 読み込み完了直後のボタンの挙動
  $(window).on('load', function () {
    timeId_2 = setTimeout(function () {
      $('.pl_ctrl_btn').removeClass('tl_y');
      clearTimeout(timeId_2);
    }, 5000);
  });

  // 読み込み完了後の、マウス操作に応じたボタンの挙動
  let curr_x;
  let curr_y;
  let timeId_2 = null;
  $(window).on('mousemove', function (e) {
    // 座標取得
    curr_x = e.pageX;
    curr_y = e.pageY;
    // マウスが動いていた場合、基本的にif文内の処理は行わせない
    clearTimeout(timeId_2);
    $('.pl_ctrl_btn').addClass('tl_y');
    // マウス停止後、50ミリ秒間同じ座標であった場合、下記処理を実行する
    setTimeout(function () {
      // 不要な予約番号を消す
      clearTimeout(timeId_2);
      if (curr_x == e.pageX || curr_y == e.pageY) {
        // 5000ミリ秒マウスに動きがない場合、メニューボタンを画面外へ移動させる
        timeId_2 = setTimeout(function () {
          $('.pl_ctrl_btn').removeClass('tl_y');
          // 不要な予約番号を消す
          clearTimeout(timeId_2);
        }, 5000);
      } else {
        // 不要な予約番号を消す
        clearTimeout(timeId_2);
      }
    }, 50);
  })

  // モバイル端末用の処理ここから
  $(window).on('touchstart', function () {
    clearTimeout(timeId_2);
  });
  $(window).on('touchmove', function () {
    clearTimeout(timeId_2);
    $('.pl_ctrl_btn').addClass('tl_y');
    console.log('スワイプ');
  });
  $(window).on('touchend', function () {
    timeId_2 = setTimeout(function () {
      $('.pl_ctrl_btn').removeClass('tl_y');
      clearTimeout(timeId_2);
    }, 5000);
    console.log('はなした');
  });

  // プレイヤーモードのメニューボタン押下時の挙動
  let plMenu_btn = $('button.pl_ctrl_btn');
  plMenu_btn.on('click', function () {
    $('.pl_ctrl_1').addClass('on');
    $(plMenu_btn).addClass('btn_off');
    $(plMenu_btn).removeClass('btn_on');
  });

  // 1枚目の左ボタン
  let plLeft_1 = $('button.plLeft_btn_1')
  plLeft_1.on('click', function () {
    $('.pl_ctrl_1').removeClass('on');
    $(plMenu_btn).removeClass('on');
    $(plMenu_btn).addClass('btn_on');
    $(plMenu_btn).removeClass('btn_off');
  });
  // 1枚目の右ボタン
  let plRight_1 = $('button.plRight_btn_1');
  plRight_1.on('click', function () {
    $('.pl_ctrl_1').removeClass('on').delay(800);
    $('.pl_ctrl_2').addClass('on');
  });
  // 2枚目の左ボタン
  let plLeft_2 = $('button.plLeft_btn_2');
  plLeft_2.on('click', function () {
    $('.pl_ctrl_2').removeClass('on').delay(800);
    $('.pl_ctrl_1').addClass('on');
  });
  // 2枚目の右ボタン
  let plRight_2 = $('button.plRight_btn_2');
  plRight_2.on('click', function () {
    $('.pl_ctrl_2').removeClass('on').delay(800);
    $('.pl_ctrl_3').addClass('on');
  });
  // 3枚目の左ボタン
  let plLeft_3 = $('button.plLeft_btn_3');
  plLeft_3.on('click', function () {
    $('.pl_ctrl_3').removeClass('on').delay(800);
    $('.pl_ctrl_2').addClass('on');
  });
  // 3枚目の右ボタン
  let plRight_3 = $('button.plRight_btn_2');
  plRight_3.on('click', function () {
    $('.pl_ctrl_2').removeClass('on').delay(800);
    $('.pl_ctrl_3').addClass('on');
  });

});//////////////////////

