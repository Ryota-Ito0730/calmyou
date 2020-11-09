//============================================
//プレーヤー画面中のフィルタ選択とフィルタクリアUI
//============================================
$(function () {
  // ↓ブラウザ読込時に表示される要素の個数番目とあわせる
  let num = 1;
  // ↓ブラウザ読込時の初期値↓(クリックと同時に表示を消す)
  $('ul.flval_wrapp > li:nth-child(1)').addClass('on');

  // 初期値はdwボタンは非表示
  if (num == 1) {
    $('button.fl_dw').addClass('hidden');
  }

  // フィルター部のli要素数取得の上、フィルタの種類を配列化
  let flli_cout = $('ul.flval_wrapp > li').length;
  let f = 0;
  let fl_arr = [];
  for (f; f < flli_cout; f++) {
    fl_arr[f] = "fl_" + f;
  }
  console.log('fl_arr: ', fl_arr);

  // フィルタークリアボタンを非表示
  $('.fl_cl').addClass('hidden');

  // upボタン押下時の処理
  $('.fl_up').on('click', function (e) {
    // フィルタークリアボタンを表示させる
    $('.fl_cl').removeClass('hidden');
    $('.fl_cl').addClass('visible');
    // ↓クリックされる度、指定要素の個数番目を増やす
    num++;
    // ↓連続クリック数が合計要素数を超えない限り、if内の処理を実行
    if (!(num > 13)) {
      $(`ul.flval_wrapp > li:nth-child(${num})`).addClass('on');
      $(`ul.flval_wrapp > li:not(:nth-child(${num}))`).removeAttr('class');

      // console.log('[num]:', fl_arr[num]);
      // console.log('[num - 1]:', fl_arr[num - 1]);

      // console.log('▲指定直前num：', num);
      console.log("▲fl_arr[num]", fl_arr[num - 1]);
      // console.log("▲fl_arr[num - 1]", fl_arr[num - 1]);
      $('#photo_wrapp').addClass(`${fl_arr[num - 1]}`);
      $('#photo_wrapp').removeClass(`${fl_arr[num - 2]}`);

      // ボタン表示非表示
      if (num >= 2) {
        $('button.fl_dw').addClass('visible');
      }
      if (num >= 13) {
        $('button.fl_up').addClass('hidden');
        $('button.fl_up').removeClass('visible');
      }

    } else {
      // ↓連続クリック数が合計要素数を超えた後、それ以上の値にならないよう調整
      e.preventDefault();
      num--;
    }
  });

  // フィルタークリア
  $('.fl_cl').on('click', function () {
    // ブラウザ読み込み時の要素表示部分のみクラス付与。他は削除
    $('ul.flval_wrapp > li:nth-child(1)').addClass('on');
    $('ul.flval_wrapp > li:not(:nth-child(1)').removeClass('on');
    // dwボタンは非表示にする
    $('button.fl_dw').removeClass('visible');
    $('button.fl_dw').addClass('hidden');
    // 最高値で押下された時の為、upボタンは表示させる
    $('button.fl_up').addClass('visible');
    $('button.fl_up').removeClass('hidden');
    // numは初期値に設定
    num = 1;

    // 正規表現で検索の上、フィルタークラスのみ削除
    let temp = $('#photo_wrapp').attr('class');
    console.log(temp);
    let fl_x = /fl_(1?[0-9])/;
    let gotten_class = temp.match(fl_x);
    let deleted = gotten_class[0];
    console.log(deleted);
    $('#photo_wrapp').removeClass(deleted);

    // 一度押下後にフィルタークリアボタンは非表示に
    $('.fl_cl').addClass('hidden');
    $('.fl_cl').removeClass('visible');
  });//onクリックメソッド閉め

  // フィルターDownボタンを押下時の処理ここから
  $('.fl_dw').on('click', function (e) {
    num--;
    if (!(num < 1)) {
      $(`ul.flval_wrapp > li:nth-child(${num})`).addClass('on');
      $(`ul.flval_wrapp > li:not(:nth-child(${num}))`).removeAttr('class');
      console.log('▼指定直前num：', num);
      console.log('▼fl_arr[num-2]：', fl_arr[num - 1]);

      $('#photo_wrapp').addClass(`${fl_arr[num - 1]}`);
      $('#photo_wrapp').removeClass(`${fl_arr[num]}`);

      if (num <= 12) {
        $('button.fl_up').addClass('visible');
      }
      if (num == 1) {
        $('button.fl_dw').addClass('hidden');
        $('button.fl_dw').removeClass('visible');
        $('.fl_cl').addClass('hidden');
        $('.fl_cl').removeClass('visible');
      }
    } else {
      e.preventDefault();
      num++;
    }
  });

});//////////////////////

