// =========================
// トップページ内の処理を記述
// =========================
$(function () {
  if (loaded_count == 1) {
    // 初回ローディングの処理
    // 縦スクロール禁止
    $('html').addClass('scroll_prevent');
    let p = $('div.site_title p');
    let title_h1 = $('div.site_title h1');
    let p_1 = $('div.site_title p:nth-child(1)');
    let p_2 = $('div.site_title p:nth-child(2)');
    let p_3 = $('div.site_title p:nth-child(3)');
    // 文字を配列として取得
    let all_p_arr = p.text().split('');//onlinephotpframe
    // let h1_str = title_h1.text();//calmyou
    // 上記の配列同士を結合
    p.text('');
    // "Online Photo Frame calmyou"を1文字ずつspanで出力
    $.each(all_p_arr, function (idx) {
      let displayed_str = $(`<span>${all_p_arr[idx]}</span>`).css({
        'opacity': '0',
        'transition': '1s'
      });
      //online:0-5
      //photo:6-10
      //frame:11-15
      if (idx <= 5) {
        displayed_str.appendTo(p_1).delay(idx * 180);
      } else if (idx <= 10) {
        displayed_str.appendTo(p_2).delay(idx * 180);
      } else if (idx <= 14) {
        displayed_str.appendTo(p_3).delay(idx * 180);
      } else if (idx == 15) {
        displayed_str.appendTo(p_3).delay(idx * 180);
      }
      // "Online Photo Frame"をdelayで出力
      displayed_str.animate({
        'opacity': '1',
      }, 4000);

    });
    // サイトタイトルに続いて疑似要素(- カーミュー -)もアニメーション出力
    // 該当::afterのcontentプロパティより文字取得の上、不要な文字列は削除
    let af_cont_el = window.getComputedStyle($('.site_title')[0], '::after').getPropertyValue('content');
    af_cont_el.slice(1);
    af_cont_el.slice(0, 1);
    // contentの文字をheadに設置準備
    let head = $('head');
    let style = $(`<style>#top header div.site_title::after {content:${af_cont_el}; visibility:visible;   transform: translate3d(0,0,0); opacity: 1;</style>`);
    // 遅延処理でheadタグに設置
    function display() {
      title_h1.addClass('d_on');
      style.appendTo(head);
    }
    setTimeout(display, 5000);
    // フォントカラーを白系へ変更
    function f_color_change() {
      $('#top header div.site_title p span').addClass('on');
      $('#top header .hkv_filter').addClass('on');
      title_h1.addClass('on');
      $('#top header div.site_title').addClass('on');
    }
    setTimeout(f_color_change, 6000);

    // ★このタイミングでメニューボタン、スクロールアロー、トップへ戻るボタンを表示させる
    function sc_prvent() {
      $('html').removeClass('scroll_prevent');
    }
    setTimeout(sc_prvent, 8000);




    $(window).on('load', function () {
      // ローディング完了後、下記クラスを追加
      // ★削除要検討

      $('#top_loading').addClass('first_loaded');

    });
  }



  // =========================
  // ランダムキービジュアル機能
  // =========================
  let min = 1;
  let max = 3;
  let top_num = Math.floor(Math.random() * (max + 1 - min)) + min;
  let key_visual = $('#top header, #top footer, #top #sp_menu');
  key_visual.css({
    'background-image': `URL("common/img/key_visual/top_key${top_num}.jpg")`
  });
  // =================================
  // アドレスバーの高さを除いた値を取得
  // =================================
  let except_address_bar = $('header, .hkv_filter, #sp_menu, .sp_kv_filter');
  let current_wh = $(window).height();
  except_address_bar.css({ 'height': current_wh, 'transition': '1s' });

  // ===============================
  // 横幅に応じてクラスの付け外しを実行
  // ===============================
  let first_ww = $(window).width();
  let sec_themes = $('section#themes');
  let some_el = $('#sp_menu li a, footer li a');
  let top_buttons = $('button#top_menu, button#top_reverse');
  let themes = $('.theme');
  let inner = 'inner';
  let hover = 'hover';
  let hov_smth = 'hover smooth';
  let pc_effects = 'smooth, hover_shadow';

  //remove and add class"inner". 
  function add_remove(input_ww) {
    const brake_p1 = 1000;
    if (input_ww > brake_p1) {
      sec_themes.removeClass(inner);
    } else {
      sec_themes.addClass(inner);
    }
  }

  //remove and add class"smooth hover_shadow".  
  function add_remove_2(input_ww_2) {
    const brake_p2 = 769;
    if (input_ww_2 > brake_p2) {
      some_el.addClass(hov_smth);
      top_buttons.addClass(hover);
      themes.addClass(pc_effects);
    } else {
      some_el.removeClass(hov_smth);
      top_buttons.removeClass(hover);
      themes.removeClass(pc_effects);
    }
  }

  add_remove(first_ww);
  add_remove_2(first_ww);

  $(window).resize(function () {
    let current_ww = $(window).width();
    // add to css"height:100vh".
    let except_address_bar = $('header, .hkv_filter');
    let current_wh = $(window).height();

    except_address_bar.css('height', current_wh);
    $('#sp_menu, .sp_kv_filter').css('height', '100vh');

    add_remove(current_ww);
    add_remove_2(current_ww);

  });


  // ===================================
  // トップページ中のMENUボタン押下時の処理
  // ===================================
  let top_menu_btn = $('#top_menu');
  let left_line = $('.left_line');
  let right_line = $('.right_line');

  top_menu_btn.on('click', function () {
    $('html').toggleClass('scroll_prevent');
    // btn,menu,top_reverse btn display off
    let arr = [$(this), left_line, right_line, $('div#sp_menu'), $('#top_reverse')];
    let i;
    for (i = 0; i < arr.length; i++) {
      arr[i].toggleClass('on');
    }
  });

  // =====================================
  // トップページ中のトップへ戻る押下時の処理
  // =====================================
  $('#top_reverse').on('click', function () {
    $('body,html').animate({ scrollTop: 0 }, 500);
    except_address_bar.css({ 'height': '100vh', 'transition': '.4s' });
  });

  // ================================
  // スクロール量に応じた要素の表示処理
  // ================================
  $(window).on("scroll", function () {
    let scroll = $(this).scrollTop();
    let wh = $(this).height();
    $(".el_display").each(function () {
      let target_pos = $(this).offset().top;
      if (scroll > target_pos - wh + 200) {
        $(this).addClass("on");
      }
    });
  });

});//////////////////////