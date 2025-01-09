<?php
session_start();

$t_arr = ['flower', 'koyo', 'cat'];
$i = 0;
$count = count($t_arr);
for ($i; $i < $count; $i++) {
  $_SESSION[$t_arr[$i]] = $t_arr[$i];
}

if (isset($_SESSION['customer_name'])) {
  $customer_name = $_SESSION['customer_name'];
} else {
  $customer_name = '';
}
if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
} else {
  $email = '';
}
if (isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
} else {
  $message = '';
}
$customer_name_error = isset($_SESSION['customer_name_error']) ? $_SESSION['customer_name_error'] : '';
$email_error = isset($_SESSION['email_error']) ? $_SESSION['email_error'] : '';
$message_error = isset($_SESSION['message_error']) ? $_SESSION['message_error'] : '';
?>

<!DOCTYPE html>
<html lang="ja">

<head prefix="og:http://ogp.me/ns#">
  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-TRD8H7V');
  </script>
  <!-- End Google Tag Manager -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Calmyou(カーミュー) オンライン上で楽しめる癒しのフォトフレーム あなたにひとときの安らぎを提供します">
  <meta property="og:locale" content="ja_JP">
  <meta property="og:site_name" content="Calmyou(カーミュー) オンライン上で楽しめる癒しのフォトフレームサービス">
  <meta property="og:title" content="TOP | Calmyou(カーミュー) オンライン上で楽しめる癒しのフォトフレームサービス">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://intp.site/221/calmyou/">
  <!-- <meta property="og:image" content="https://intp.site/221/Henrik/img/henrik_og.png"> -->
  <meta property="og:description" content="Calmyou(カーミュー) オンライン上で楽しめる癒しのフォトフレーム あなたにひとときの安らぎを提供します">
  <meta http-equiv="x-ua-compatible" content="IE=9">
  <meta http-equiv="x-ua-compatible" content="IE=EmulateIE9">
  <title>TOP | Calmyou</title>
  <!-- <link rel="icon" href="img/favicon.ico"> -->
  <link rel="stylesheet" href="../common/css/common.css">
  <link rel="stylesheet" href="../common/css/contact_main.css">

  <!-- twitter -->
  <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
  <!-- LINE -->
  <script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
  <!-- CDN通信できなかった時の対処 -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    window.jQuery || document.write('<script src="../common/js/jquery-3.5.1.min.js"><\/script>');
  </script>
  <script src="../common/js/contact_main.js"></script>
</head>

<body id="contact">
  <!-- Google Tag Manager (noscript) -->
  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TRD8H7V" height="0" width="0" style="display:none;"></iframe>
  </noscript>
  <!-- End Google Tag Manager (noscript) -->
  <header>
    <h1>Contact</h1>
  </header>
  <div class="header_cover"></div>
  <main id="top_main">
    <section id="forms" class="inner">
      <P class="lead side"><span class="text_ib">Calmyouについての感想や、掲載テーマのご希望等、是非お気軽に</span><span class="text_ib">お問い合わせください。</span></P>
      <p class="lead side"><span class="text_ib">※お問い合わせ内容を送信後、以下のメールアドレスから受付完了メールが自動送信されます。</span><br> ■メールアドレス：info@calmyou.com </p>
      <p class="lead side"><span class="text_ib">※受付完了メールが受信できるように、あらかじめ迷惑メール受信拒否の設定の確認をお願いいたします。</span></p>
      <p class="lead side contact_row"><span class="text_ib">※お問い合わせいただいた内容への返信には、送信日から2日程、</span><span class="text_ib">お時間をいただくことがあります。</span></p>
      <div class="form_container">
        <div class="side form_wrapper">
          <div class="flow_area">
            <ul>
              <li class="current">入力</li>
              <li><img src="../common/img/el_parts/right_triangle.svg" alt=""></li>
              <li>確認</li>
              <li><img src="../common/img/el_parts/right_triangle.svg" alt=""></li>
              <li>送信</li>
            </ul>
            <p class="contact_notice">※必要事項をご入力後、NEXTボタンを押してください。</p>
          </div>

          <form action="check.php" method="POST">
            <dl>
              <dt><label for="customer_name" class="contact_bottom_gap"><span class="form_el contact_right_gap">必須</span>Name</label>
                <!-- I:各項目に対し、エラーメッセージを表示できるよう、下記1行を設置<span>～</span>まで -->
                <!-- 入力フォーム送信後の自動メール送信後に、sessionを削除するため、send.phpへ -->
                <span class='attention'><?= $customer_name_error; ?></span>
              </dt>
              <!-- 最上行から記載していたsessionの情報があった場合、value属性値として出力される -->
              <dd><input class="textlines" type="text" name="customer_name" id="customer_name" value="<?= $customer_name; ?>"></dd>
            </dl>
            <dl>
              <dt>
                <label for="email" class="contact_bottom_gap"><span class="form_el contact_right_gap">必須</span>E-mail</label>
                <span class='attention'><?= $email_error; ?></span>
              </dt>
              <dd>
                <input class="textlines" type="text" name="email" id="email" value="<?= $email; ?>">
              </dd>
            </dl>
            <dl>
              <dt>
                <label for="message" class="contact_bottom_gap"><span class="form_el contact_right_gap">必須</span>Message</label>
                <span class='attention'><?= $message_error; ?></span>
              </dt>
              <!-- textareaタグではsessionで取得した情報は、通常のテキストのようにタグで囲む -->
              <dd><textarea class="textlines" id="message" name="message" cols="50" rows="10"><?= $message; ?></textarea></dd>
            </dl>
            <p><input type="submit" value="NEXT"></p>
          </form>
        </div>
      </div>
    </section>
  </main>
  <footer>
    <div class="fkv_filter">
      <nav class="inner side">
        <ul ontouchstart="">
          <li>Themes</li>
          <li>
            <ul ontouchstart="">
              <li>
                <a href="../themes/player.php?date=<?= $_SESSION[$t_arr[0]] ?>">
                  <img src="../common/img/thumbnail/thumbnail_cherry_blossom.png" alt="花のテーマ画像">
                  <span class="footer_list">Flower</span>
                </a>
              </li>
              <li>
                <a href="../themes/player.php?date=<?= $_SESSION[$t_arr[1]] ?>">
                  <img src="../common/img/thumbnail/thumbnail_koyo.png" alt="紅葉のテーマ画像">
                  <span class="footer_list">Koyo</span>
                </a>
              </li>
              <li>
                <a href="../themes/player.php?date=<?= $_SESSION[$t_arr[2]] ?>">
                  <img src="../common/img/thumbnail/thumbnail_cat.png" alt="猫のテーマ画像">
                  <span class="footer_list">Cat</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="contact_list_top">
            <a href="../">Top</a>
          </li>
        </ul>
      </nav>
      <div class="sns_icon">
        <p>
          <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-lang="ja" data-show-count="false">Tweet</a>
        </p>
        <div class="line-it-button" data-lang="ja" data-type="share-a" data-ver="3" data-url="https://social-plugins.line.me/ja/how_to_install" data-color="default" data-size="small" data-count="false" style="display: none;"></div>
        <p>
          <iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&layout=button&size=small&width=69&height=20&appId" width="69" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
        </p>
      </div>
      <p class="copy">
        <small>&copy;2020Calmyou </small>
      </p>
    </div>
  </footer>
</body>

</html>