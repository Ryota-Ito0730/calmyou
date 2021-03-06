$(function () {
  let curr_x;
  let curr_y;
  let timeId_2 = null;

  $('.pl_ctrl_btn').addClass('tl_y');
  // 読み込み完了直後のボタンの挙動
  $(window).on('load', function () {
    timeId_2 = setTimeout(function () {
      $('.pl_ctrl_btn').removeClass('tl_y');
      clearTimeout(timeId_2);
    }, 5000);
  });

  // 読み込み完了後の、マウス操作に応じたボタンの挙動
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
  });

  // モバイル端末用の処理ここから
  $(window).on('touchstart', function () {
    clearTimeout(timeId_2);
  });
  $(window).on('touchmove', function () {
    clearTimeout(timeId_2);
    $('.pl_ctrl_btn').addClass('tl_y');
  });
  $(window).on('touchend', function () {
    timeId_2 = setTimeout(function () {
      $('.pl_ctrl_btn').removeClass('tl_y');
      clearTimeout(timeId_2);
    }, 5000);
  });

  // ===================================
  // プレイヤーモードのmenuボタン押下時の挙動
  // ===================================
  let plMenu_btn = $('button.pl_ctrl_btn')
  let pl_left_line = $('.pl_left_line');
  let pl_right_line = $('.pl_right_line');
  let push_time = 0;
  plMenu_btn.on('click', function () {
    $('.pl_ctrl_1').addClass('on');
    let arr = [$(this), pl_left_line, pl_right_line];
    let i;
    for (i = 0; i < arr.length; i++) {
      arr[i].toggleClass('on');
      $(this).toggleClass('fixed_y');
    }
    clearTimeout(timeId_2);
    if (push_time % 2 == 1) {
      // どのメニュー表示が出ていても、一旦外側に移動させる
      // メニュー1、２、３、の要素をセレクタとして設定
      // 引っ込んだ後(transitionend後)本処理内と、本来のメニュー1枚ごとに追加されるクラスも削除する
      $('.pl_ctrl_1').addClass('outside').removeClass('outside');
      $('.pl_ctrl_2').addClass('outside').removeClass('outside');
      $('.pl_ctrl_3').addClass('outside').removeClass('outside');
      $('.pl_ctrl_1').removeClass('tl_y on');
      $('.pl_ctrl_2').removeClass('tl_y on');
      $('.pl_ctrl_3').removeClass('tl_y on');

    }
    push_time++;
  });

  // 1枚目の左ボタン
  let plLeft_1 = $('button.plLeft_btn_1');
  plLeft_1.on('click', function () {
    let line_arr = [pl_left_line, pl_right_line];
    let i;
    for (i = 0; i < line_arr.length; i++) {
      line_arr[i].removeClass('on');
    }
    $('.pl_ctrl_1').removeClass('on');
    $('.pl_ctrl_btn').removeClass('fixed_y');
    $(plMenu_btn).removeClass('on');
    clearTimeout(timeId_2);
    push_time = 0;
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

    // 数秒遅れさせてコンタクトマークを回転させる
    function contact_ani() {
      $('.contact_btn').addClass('contact_rotate').on('animationend', function () {
        $('.contact_btn').removeClass('contact_rotate');
      });
    }
    setTimeout(contact_ani, 2500);
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

