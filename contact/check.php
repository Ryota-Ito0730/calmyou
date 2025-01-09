<?php
require_once('is_mail.php');
session_start();
$_SESSION = [];
$t_arr = ['flower', 'koyo', 'cat'];
$i = 0;
$count = count($t_arr);
for ($i; $i < $count; $i++) {
  $_SESSION[$t_arr[$i]] = $t_arr[$i];
}
$customer_name = htmlspecialchars($_POST['customer_name']);
$email = htmlspecialchars($_POST['email']);
$message = htmlspecialchars($_POST['message']);
$_SESSION['customer_name'] = $customer_name;
$_SESSION['email'] = $email;
$_SESSION['message'] = $message;

$flg = 0;
if (empty($customer_name)) {
  $flg = 1;
  $_SESSION['customer_name_error'] = '※Nameが入力されていません。';
}
if (empty($email)) {
  $flg = 1;
  $_SESSION['email_error'] = '※E-mailが入力されていません。';
} elseif (!is_mail($email)) {
  $flg = 1;
  $_SESSION['email_error'] = '※E-mailを確認してください。';
}
if (empty($message)) {
  $flg = 1;
  $_SESSION['message_error'] = '※お問い合わせ内容の入力をお願いします。';
}
if ($flg) {
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}

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

<body id="contact_check">
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
              <li>入力</li>
              <li><img src="../common/img/el_parts/right_triangle.svg" alt=""></li>
              <li class="current">確認</li>
              <li><img src="../common/img/el_parts/right_triangle.svg" alt=""></li>
              <li>送信</li>
            </ul>
            <p class="contact_notice">※以下の内容で送信いたします。<br>よろしければSENDボタンを押してください。</p>
          </div>
          <div class="inner">
            <dl>
              <dt>Name</dt>
              <dd class="check_item"><?= $customer_name; ?></dd>
            </dl>
            <dl>
              <dt>E-mail</dt>
              <dd class="check_item"><?= $email; ?></dd>
            </dl>
            <dl>
              <dt>Message</dt>
              <dd class="check_item "><?= $message; ?></dd>
            </dl>
          </div>
          <div class="check_btn_wrapper">
            <p style="padding:0;"><a href="send.php">SEND</a></p>
            <p style="padding:0;"><a href="index.php">BACK</a></p>
          </div>
        </div>
        <div>
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