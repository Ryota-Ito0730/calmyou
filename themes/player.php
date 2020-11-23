<?php
    session_start();
    $t_arr = ['flower', 'koyo', 'cat'];
    $i=0;
    $count = count($t_arr);
    for($i; $i < $count; $i++) {
      $_SESSION[$t_arr[$i]] = $t_arr[$i];
    }
    // Get送信された値のチェック
    $selected_dir = htmlspecialchars($_GET['date']);
    // ディレクトリ名を元に設置済みディレクトリよりファイル一覧を配列として取得
    $total_files = glob('../common/img/main_themes/'.$selected_dir.'/*.jpg');
    // 配列として取得したファイル一覧の合計数を計算
    $file_count = count($total_files);
    // 配列としてファイル数、選択されたディレクトリ名をセット
    $play_data = [$file_count, $selected_dir];
    // JS側へ渡す準備
    $php_json = json_encode($play_data, JSON_HEX_TAG | JSON_HEX_AMP);
?>

<!DOCTYPE html>
<html lang="ja">
<head prefix="og:http://ogp.me/ns#">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Calmyou(カーミュー) オンライン上で楽しめる癒しのフォトフレーム あなたにひとときの安らぎを提供します">
  <meta property="og:locale" content="ja_JP">
  <meta property="og:site_name" content="Calmyou(カーミュー) オンライン上で楽しめる癒しのフォトフレームサービス">
  <meta property="og:title" content="TOP | Calmyou(カーミュー) オンライン上で楽しめる癒しのフォトフレームサービス">
  <meta property="og:type" content="website">
  <meta property="og:description" content="Calmyou(カーミュー) オンライン上で楽しめる癒しのフォトフレーム あなたにひとときの安らぎを提供します">
  <meta http-equiv="x-ua-compatible" content="IE=9">
  <meta http-equiv="x-ua-compatible" content="IE=EmulateIE9">
  <title>TOP | Calmyou</title>
  <link rel="stylesheet" href="../common/css/common.css">
  <link rel="stylesheet" href="../common/css/loading.css">
  <link rel="stylesheet" href="../common/css/player_main.css">
  <link rel="stylesheet" href="../common/css/filter.css">
  <link rel="stylesheet" href="../common/css/plmenu_btn.css">
  <script>
    // 上記PHPで処理した値を下記JSファイルへ渡すための変数を定義
    let php_json = JSON.parse('<?php echo $php_json; ?>');
  </script>
  <!-- CDN通信ができなかった時の対処 -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="../common/js/jquery-3.5.1.min.js"><\/script>');</script>
  <!-- ページ読み込み後からの処理ファイルを設置 -->
  <script src="../common/js/loading.js"></script>
  <script src="../common/js/player.js"></script>
  <script src="../common/js/filter.js"></script>
  <script src="../common/js/plmenu_btn.js"></script>
  <script src="../common/js/theme_select.js"></script>
</head>
<div id="und_loading">
  <h1></h1>
</div>
<body id="player_top">
  <main id="player_main">
    <div id="photo_wrapp"><!--画像表示箇所--></div>
    <div id="photo_filter">    
      <div class="pl_ctrl_1">
        <h4>Theme</h4>
        <button class="pl_top_btn btn hover" ontouchstart="">
          <a href="../index.php" alt="">TOP</a>
        </button>
        <button class="tm_up" ontouchstart="">
          <img  src="../common/img/el_parts/pl_up.svg" alt="">
        </button>
        <div class="tm_wrapp">
          <ul class="pltheme_wrapp" ontouchstart="">
            <li>
              <a href="player.php?date=<?= $_SESSION[$t_arr[0]] ?>">
                <img src="../common/img/thumbnail/thumbnail_cherry_blossom.png"alt="花のテーマ画像">
                <span>Flower</span>
              </a>
            </li>
            <li>
              <a href="player.php?date=<?= $_SESSION[$t_arr[1]] ?>">
                <img src="../common/img/thumbnail/thumbnail_koyo.png" alt="紅葉のテーマ画像">
                <span>Koyo</span>
             </a>
            </li>
            <li>
              <a href="player.php?date=<?= $_SESSION[$t_arr[2]] ?>">
                <img src="../common/img/thumbnail/thumbnail_cat.png" alt="猫のテーマ画像">
                <span>Cat</span>
              </a>
            </li>
          </ul>
        </div>
        <button class="tm_down" ontouchstart="">
          <img  src="../common/img/el_parts/pl_down.svg" alt="">
        </button>
        <button class="plLeft_btn_1" ontouchstart="">
          <img  src="../common/img/el_parts/pl_left.svg" alt="">
        </button>
        <button class="plRight_btn_1" ontouchstart="">
          <img  src="../common/img/el_parts/pl_right.svg" alt="">
        </button>
      </div>
      <div class="pl_ctrl_2">
        <h4>Interval</h4>
        <button class="pl_top_btn interval_tr btn hover" ontouchstart="">
          <a href="../index.php" alt="">TOP</a>
        </button>
        <button class="slow" ontouchstart="">
          <img  src="../common/img/el_parts/pl_up.svg" alt="">
        </button>
        <div class="pl_wrapp">
          <ul class="pltm_wrapp">
            <li>1sec</li>
            <li>2sec</li>
            <li>3sec</li>
            <li>4sec</li>
            <li>5sec</li>
            <li>6sec</li>
            <li>7sec</li>
            <li>8sec</li>
            <li>9sec</li>
            <li>10sec</li>
            <li>11sec</li>
            <li>12sec</li>
          </ul>
        </div>
        <button class="fast" ontouchstart="">
          <img  src="../common/img/el_parts/pl_down.svg" alt="">
        </button>
        <button class="plLeft_btn_2" ontouchstart="">
          <img  src="../common/img/el_parts/pl_left.svg" alt="">
        </button>
        <button class="plRight_btn_2" ontouchstart="">
          <img  src="../common/img/el_parts/pl_right.svg" alt="">
        </button>
      </div>
      <div class="pl_ctrl_3">
        <h4>Filter</h4>
        <button class="pl_top_btn btn hover" ontouchstart="">
          <a href="../index.php" alt="">TOP</a>
        </button>
        <button class="fl_cl" ontouchstart="">CLEAR</button>
        <button class="fl_up" ontouchstart="">
          <img  src="../common/img/el_parts/pl_up.svg" alt="">
        </button>
        <div class="fl_wrapp">
          <ul class="flval_wrapp">
            <li>normal</li>
            <li>filter-1</li>
            <li>filter-2</li>
            <li>filter-3</li>
            <li>filter-4</li>
            <li>filter-5</li>
            <li>filter-6</li>
            <li>filter-7</li>
            <li>filter-8</li>
            <li>filter-9</li>
            <li>filter-10</li>
            <li>filter-11</li>
            <li>filter-12</li>
          </ul>
        </div>
        <button class="fl_dw" ontouchstart="">
          <img  src="../common/img/el_parts/pl_down.svg" alt="">
        </button>
        <button class="plLeft_btn_3" ontouchstart="">
          <img  src="../common/img/el_parts/pl_left.svg" alt="">
        </button>
        <button class="contact_btn" onclick="location.href='../contact/form.php'">
          <span class="icon-contact_icon_master"></span>
        </button>
      </div>    
    </div><!-- // id="photo_filter" -->
  </main>
  <!-- menuボタン -->
  <button class="pl_ctrl_btn btn hover" ontouchstart="">
    <span>menu</span>
    <div class="pl_right_line"></div>
    <div class="pl_left_line"></div>
  </button>
</body>
</html>