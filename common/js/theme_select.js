// ============================================================
// コントロールメニューのテーマセレクトUIの挙動は本ファイルに記述する
// ============================================================
$(function () {

  // ↓ブラウザ読込時に表示される要素の個数番目とあわせる
  let theme_num = 1;
  // ↓ブラウザ読込時の初期値↓(クリックと同時に表示を消す)
  $('ul.pltheme_wrapp > li:nth-child(1)').addClass('visible');
  $(`ul.pltheme_wrapp > li:not(:nth-child(1))`).addClass('hidden');
  // 初期値はdwボタンは非表示
  if (theme_num == 1) {
    $('button.tm_down').addClass('hidden');
  }

  // UPボタン押下時の処理
  $('button.tm_up').on('click', function (e) {
    // ↓クリックされる度、指定要素の個数番目を増やす
    theme_num++;
    // ↓連続クリック数が合計要素数を超えない限り、if内の処理を実行
    if (!(theme_num > 3)) {
      $(`ul.pltheme_wrapp > li:nth-child(${theme_num})`).removeClass('hidden');
      $(`ul.pltheme_wrapp > li:nth-child(${theme_num})`).addClass('visible');

      $(`ul.pltheme_wrapp > li:not(:nth-child(${theme_num}))`).removeClass('visible');
      $(`ul.pltheme_wrapp > li:not(:nth-child(${theme_num}))`).addClass('hidden');

      if (theme_num >= 2) {
        $('button.tm_down').addClass('visible');
      }
      if (theme_num >= 3) {
        $('button.tm_up').addClass('hidden');
        $('button.tm_up').removeClass('visible');
      }
    } else {
      // ↓連続クリック数が合計要素数を超えた後、それ以上の値にならないよう調整
      e.preventDefault();
      theme_num--;
    }
  });

  // DOWNボタン押下時の処理
  $('button.tm_down').on('click', function (e) {
    theme_num--;
    if (!(theme_num < 1)) {
      $(`ul.pltheme_wrapp > li:nth-child(${theme_num})`).removeClass('hidden');
      $(`ul.pltheme_wrapp > li:nth-child(${theme_num})`).addClass('visible');

      $(`ul.pltheme_wrapp > li:not(:nth-child(${theme_num}))`).removeClass('visible');
      $(`ul.pltheme_wrapp > li:not(:nth-child(${theme_num}))`).addClass('hidden');
      if (theme_num <= 3) {
        $('button.tm_down').addClass('visible');
        $('button.tm_up').addClass('visible');
      }
      if (theme_num == 1) {
        $('button.tm_down').removeClass('visible');
        $('button.tm_down').addClass('hidden');
      }
    } else {
      e.preventDefault();
      theme_num++;
    }
  });
});//////////////////////