<?php
// session利用のための宣言
session_start();

$customer_name = $_SESSION['customer_name'];
$email = $_SESSION['email'];
$message = $_SESSION['message'];

// J:メール送信後にsession内の情報は削除
$_SESSION = [];

mb_internal_encoding('UTF-8');
mb_language('Japanese');

$email_title = '【Calmyou】お問い合わせありがとうございます';
$email_from = 'From:info@calmyou.com';
$email_body =<<<email

※本メールは自動送信メールで送信をしています。
※info@calmyou.comは自動送信専用ですので、ご返信いただいても受付できませんのでご注意ください。

==本文ここから==

{$customer_name}様

この度はお問い合わせいただきありがとうございます。

お問合せ内容
{$message}

お問い合わせいただきました内容のうち、ご回答が必要な場合は、送信後2日間以内にご返信いたしますので、少々おまちくださいませ。

オンライン・フォトフレーム Calmyou

==ここまで==

email;

mb_send_mail($email, $email_title, $email_body, $email_from);

mb_internal_encoding('UTF-8');
mb_language('Japanese');

$resp_title = 'お客様よりお問合せがありました';
$resp_from = 'From:info@calmyou.com';
$resp_email = 'calmyou2020main@gmail.com';


$resp_body =<<<resp

下記のお客様よりお問合せがありました。

ユーザー名
{$customer_name}

お問合せ内容
{$message}

resp;

mb_send_mail($resp_email, $resp_title, $resp_body, $resp_from);

header('Location:https://intp.site/221/calmyou/contact/thanks.php');
?>