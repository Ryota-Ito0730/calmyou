// =========================
// トップページ内の処理を記述
// =========================
$(function () {
  // ↓ common variable
  let html = $('html');
  let body = $('body');
  let topButtonArrow = $('button#top_menu, button#top_reverse, p.vertical, div.arrow_down, div.arrow_diagonal');
  let top_buttons = $('button#top_menu, button#top_reverse');
  // ↑ common variable

  top_buttons.removeClass('d_non');
  let p = $('div.site_title p');
  // $('#contact header div.site_title').addClass('on');
  // $('#contact header .hkv_filter').addClass('on');
  let title_h1 = $('div.site_title h1');
  title_h1.addClass('on').css({
    'transition': 'none',
    'opacity': '1',
    'color': 'rgb(221, 221, 221)',
    'transform': 'translate3d(0, 0, 0)',
  });


  // =========================
  // ランダムキービジュアル機能
  // =========================
  // let min = 1;
  // let max = 3;
  // let top_num = Math.floor(Math.random() * (max + 1 - min)) + min;
  // let key_visual = $('#contact header, #contact footer, #contact #sp_menu');
  // key_visual.css({
  //   'background-image': `URL("../common/img/key_visual/top_key${top_num}.jpg")`
  // });
  // =================================
  // アドレスバーの高さを除いた値を取得
  // =================================
  // let except_address_bar = $('header, .hkv_filter, #sp_menu, .sp_kv_filter');
  // let current_wh = $(window).height();
  // except_address_bar.css({ 'height': current_wh, 'transition': '.4s linear' });

  // ===============================
  // 横幅に応じてクラスの付け外しを実行
  // ===============================
  let first_ww = $(window).width();
  let sec_themes = $('section#themes');
  let some_el = $('#sp_menu li a, footer li a');
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

    // except_address_bar.css('height', current_wh);
    $('#sp_menu, .sp_kv_filter').css('height', '100vh');

    add_remove(current_ww);
    add_remove_2(current_ww);

  });

  // ===================================
  // コンタクトページ中のMENUボタン押下時の処理
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