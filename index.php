<?php 
  //get theme directory name.
  session_start();
  $t_arr = ['flower', 'koyo', 'cat'];
  $i=0;
  $count = count($t_arr);
  for($i; $i < $count; $i++) {
    $_SESSION[$t_arr[$i]] = $t_arr[$i];
  }



  
  if (isset($_SESSION["count"])) {
    $_SESSION["count"]++;
  } else {
    $_SESSION["count"] = 1;
  }
  $loading_cout = $_SESSION["count"];
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
  <!-- <meta property="og:url" content="https://intp.site/221/Henrik/index.html">
  <meta property="og:image" content="https://intp.site/221/Henrik/img/henrik_og.png"> -->
  <meta property="og:description" content="Calmyou(カーミュー) オンライン上で楽しめる癒しのフォトフレーム あなたにひとときの安らぎを提供します">
  <meta http-equiv="x-ua-compatible" content="IE=9">
  <meta http-equiv="x-ua-compatible" content="IE=EmulateIE9">
  <title>TOP | Calmyou</title>
  <!-- <link rel="icon" href="img/favicon.ico"> -->
  <link rel="stylesheet" href="common/css/style.css">
  <link rel="stylesheet" href="common/css/loading.css">
</head>
<?php if($loading_cout == 1): ?>
<div id="top_loading">
    <h1>初回</h1>
</div>
<?php else: ?>
<div id="top_loading">
  <h1>TOP</h1>
</div>
<?php endif; ?>

<body id="top">
  <header>
    <div class="hkv_filter">
      <div class="site_title">
        <p>Online</p>
        <p>Photo</p>
        <p>Frame</p>
        <h1>Calmyou</h1>
      </div>
      <p class="vertical">scroll</p>
      <div class="arrow_down"></div>
      <div class="arrow_diagonal"></div>
    </div>
  </header>
  <div id="sp_menu">
    <div class="sp_kv_filter">
      <nav class="inner side">
        <ul>
          <li>Themes</li>
          <li>
            <ul>
              <li><a href="themes/player.php?date=<?= $_SESSION[$t_arr[0]] ?>"><img src="common/img/thumbnail/thumbnail_cherry_blossom.png"
                    alt="花のテーマ画像"><span>花</span></a></li>
              <li><a href="themes/player.php?date=<?= $_SESSION[$t_arr[1]] ?>"><img src="common/img/thumbnail/thumbnail_koyo.png" alt="紅葉のテーマ画像"><span>紅葉</span></a></li>
              <li><a href="themes/player.php?date=<?= $_SESSION[$t_arr[2]] ?>"><img src="common/img/thumbnail/thumbnail_cat.png" alt="猫のテーマ画像"><span>猫</span></a></li>
            </ul>
          </li>
          <li><a href="">Contact</a></li>
          <li><a href="">Top</a></li>
        </ul>
      </nav>
    </div>
  </div>
  <button id="top_menu" class="btn hover">
    <span>menu</span>
    <div class="right_line"></div>
    <div class="left_line"></div>
  </button>
  <button id="top_reverse" class="btn hover"><img src="common/img/el_parts/top_triangle2.png"
      alt=""><span>Top</span></button>
  <main id="top_main" class="row">
    <section class="inner">
      <h1>Calm ＆ Peace of mind-<br>
        ...and Healing to You.</h1>
      <P class="lead side">
        Calmyou(カーミュー)は癒しにつながる様々なジャンルの画像を、オンラインで利用できるデジタルフォトフレームです。日常のほんのひとときに、ささやかな安らぎをあなたにお届けします。
      </P>
    </section>
    <section id="themes" class="inner row">
      <h2>Themes</h2>
      <P class="lead side">Calmyouでは癒しにつながる画像のジャンル(テーマ)を、現在、3種類ご用意しています。あなたにとってのお好みのテーマが見つかりますように。</P>
      <div class="fl_box">
        <div class="theme row side el_display">
          <a href="themes/player.php?date=<?= $_SESSION[$t_arr[0]] ?>">
            <h3>花</h3>
            <img src="common/img/theme_img/theme_cherry_blossom.png" alt="花のテーマ画像">
            <p class="lead">美しさや華やかさ、時に儚さすら感じさせてくれる花は、様々な表現で私たちを魅了します。懸命に咲く、瞬間の芸術をご堪能ください。</p>
          </a>
        </div>
        <div class="theme row side el_display">
        <a href="themes/player.php?date=<?= $_SESSION[$t_arr[1]] ?>">
            <h3>紅葉</h3>
            <img src="common/img/theme_img/theme_koyo.png" alt="紅葉のテーマ画像">
            <p class="lead">秋の風物詩、紅葉は季節の移り変わりを暖かみのある表情で伝えてくれます。艶やかな情緒ある風景をお楽しみください。</p>
          </a>
        </div>
        <div class="theme row side el_display">
        <a href="themes/player.php?date=<?= $_SESSION[$t_arr[2]] ?>">
            <h3>猫</h3>
            <img src="common/img/theme_img/theme_cat.png" alt="猫のテーマ画像">
            <p class="lead">そのモフモフ感、自由な振る舞い、愛くるしさの化身ともいえる猫達。その可愛さや奔放さを目の前にしたら、悶えること間違いなしです。</p>
          </a>
        </div>
      </div>
    </section>
    <section id="information" class="inner row el_display">
      <h2>information</h2>
      <p class="side">Calmyouからのお知らせ</p>
      <ul class="side">
        <li>
          <time datetime="2020-10-26">2020年10月26日</time><br>オンラインフォトフレーム"Calmyou"がオープンしました。
        </li>
        <li>
          <time datetime="2020-10-26">2020年10月26日</time><br>新しい追加テーマを現在準備中です。
        </li>
        <li>
          <time datetime="2020-10-26">2020年10月26日</time><br>モバイル用テーマ表示画面の更新を予定しています。
        </li>
        <li>
          <time datetime="2020-10-26">2020年10月26日</time><br>撮影した画像をオンラインフォトフレームにまとめてプレゼントできるように、新機能の追加を予定しています。
        </li>
      </ul>
    </section>
  </main>
  <footer class="row">
    <div class="fkv_filter">
      <nav class="inner side">
        <ul>
          <li>Themes</li>
          <li>
            <ul>
              <li><a href="themes/player.php?date=<?= $_SESSION[$t_arr[0]] ?>"><img src="common/img/thumbnail/thumbnail_cherry_blossom.png"
                    alt="花のテーマ画像"><span>花</span></a></li>
              <li><a href="themes/player.php?date=<?= $_SESSION[$t_arr[1]] ?>"><img src="common/img/thumbnail/thumbnail_koyo.png" alt="紅葉のテーマ画像"><span>紅葉</span></a></li>
              <li><a href="themes/player.php?date=<?= $_SESSION[$t_arr[2]] ?>"><img src="common/img/thumbnail/thumbnail_cat.png" alt="猫のテーマ画像"><span>猫</span></a></li>
            </ul>
          </li>
          <li><a href="">Contact</a></li>
          <li><a href="">Top</a></li>
        </ul>
      </nav>
      <div class="sns_icon">
        <p>
          <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-lang="ja"
            data-show-count="false">Tweet</a>
        </p>
        <div class="line-it-button" data-lang="ja" data-type="share-a" data-ver="3"
          data-url="https://social-plugins.line.me/ja/how_to_install" data-color="default" data-size="small"
          data-count="false" style="display: none;"></div>
        <p>
          <iframe
            src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&layout=button&size=small&width=69&height=20&appId"
            width="69" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
            allowTransparency="true" allow="encrypted-media"></iframe>
        </p>
      </div>
      <p class="copy"><small>&copy;2020Calmyou </small></p>
    </div>
  </footer>
  <!-- twitter -->
  <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
  <!-- LINE -->
  <script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async"defer="defer"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="common/js/jquery-3.5.1.min.js"><\/script>');</script>
  <script src="common/js/main.js"></script>

</body>

</html>