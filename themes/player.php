<?php
    session_start();
    $t_arr = ['flower', 'koyo', 'cat'];
    $i=0;
    $count = count($t_arr);
    for($i; $i < $count; $i++) {
      $_SESSION[$t_arr[$i]] = $t_arr[$i];
    }
    //selected directory
    $selected_dir = htmlspecialchars($_GET['date']);
    // when uploded to server, need to fix below.
    $total_files = glob('../common/img/main_themes/'.$selected_dir.'/*.jpg');
    // get total files in theme directory:int(6)
    $file_count = count($total_files);
    $play_data = [$file_count, $selected_dir];
    // ready to send for player.js
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
  <link rel="stylesheet" href="../common/css/loading.css">
  <link rel="stylesheet" href="../common/css/player.css">
  <link rel="stylesheet" href="../common/css/filter.css">
  <link rel="stylesheet" href="../common/css/plmenu_btn.css">
  <script>
    let php_json = JSON.parse('<?php echo $php_json; ?>');
  </script>
  <!-- read into basic js files blow. -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="../common/js/jquery-3.5.1.min.js"><\/script>');</script>
  <script src="../common/js/loading.js"></script>
  <script src="../common/js/player.js"></script>
  <script src="../common/js/effect.js"></script>
  <script src="../common/js/plmenu_btn.js"></script>
  <script src="../common/js/theme_select.js"></script>
</head>
<div id="loading">
    <h1></h1>
</div>
<body id="player_top">
  <main id="player_main">
    <div id="photo_wrapp">
         <!--
          
          ここにimgが生成される
        
        -->
      
    </div><!-- id="photo_wrapp"ここまで -->
    <div id="photo_filter">    
      <div class="pl_ctrl_1">
        <div class="tm_wrapp">
          <button class="tm_up"><img  src="../common/img/el_parts/pl_up.svg" alt=""></button>
            <ul class="pltheme_wrapp">
              <li><a href="player.php?date=<?= $_SESSION[$t_arr[0]] ?>"><img src="../common/img/thumbnail/thumbnail_cherry_blossom.png"alt="花のテーマ画像"><span>花</span></a></li>
              <li><a href="player.php?date=<?= $_SESSION[$t_arr[1]] ?>"><img src="../common/img/thumbnail/thumbnail_koyo.png" alt="紅葉のテーマ画像"><span>紅葉</span></a></li>
              <li><a href="player.php?date=<?= $_SESSION[$t_arr[2]] ?>"><img src="../common/img/thumbnail/thumbnail_cat.png" alt="猫のテーマ画像"><span>猫</span></a></li>
            </ul>
          <button class="tm_down"><img  src="../common/img/el_parts/pl_down.svg" alt=""></button>
        </div>
        <button class="plLeft_btn_1"><img  src="../common/img/el_parts/pl_left.svg" alt=""></button>
        <button class="plRight_btn_1"><img  src="../common/img/el_parts/pl_right.svg" alt=""></button>
      </div>

      <div class="pl_ctrl_2">
        <div class="pl_wrapp">
          <button class="slow"><img  src="../common/img/el_parts/pl_up.svg" alt=""></button>
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
          <button class="fast"><img  src="../common/img/el_parts/pl_down.svg" alt=""></button>
        </div>
        <button class="plLeft_btn_2"><img  src="../common/img/el_parts/pl_left.svg" alt=""></button>
        <button class="plRight_btn_2"><img  src="../common/img/el_parts/pl_right.svg" alt=""></button>
      </div>

      <div class="pl_ctrl_3">
        <div class="fl_wrapp">
          <button class="fl_cl">CLEAR</button>
          <button class="fl_up"><img  src="../common/img/el_parts/pl_up.svg" alt=""></button>
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
          <button class="fl_dw"><img  src="../common/img/el_parts/pl_down.svg" alt=""></button>
        </div>
        <button class="plLeft_btn_3"><img  src="../common/img/el_parts/pl_left.svg" alt=""></button>
        <button class="plRight_btn_3"><img  src="../common/img/el_parts/pl_right.svg" alt=""></button>
      </div>    
    </div><!-- id="photo_filter"ここまで -->
  </main>
  <!-- <div id="pl_menu">
    <div class="pl_kv_filter">
      <nav class="inner side">
        <ul>
          <li>Themes</li>
          <li><a href="">Contact</a></li>
          <li><a href="">Top</a></li>
        </ul>
      </nav>
    </div>
  </div> -->
  <!-- <button id="top_menu" class="btn hover">
    <span>menu</span>
    <div class="right_line"></div>
    <div class="left_line"></div>
  </button>
  <button id="top_reverse" class="btn hover"><img src="../common/img/el_parts/top_triangle2.png"alt=""><span>Top</span></button> -->
  <!-- play time duration -->

  <button class="pl_ctrl_btn">Menu</button>



</body>

</html>