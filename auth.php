<?php

// セッションを使えるようにする
session_start();

// もし、ログインする前にemailがセッションに保存されていたら、トップへ飛ばす
if (isset($_SESSION['email'])) {
    header('Location: ./index.php');
    exit;
}

// ログイン(サインイン)できるPHPシステムを作る

// index.php
// - トップページ
// - ログインしないと見れない
// - ログインしていない場合はsignin.phpにリダイレクト
// - ログインしているときは、ログアウトボタンを表示

// signin.php
// - ログインフォームが表示されているページ
// - ログインしている場合はindex.phpにリダイレクト

// auth.php
// - signin.phpからデータが送られてきてログイン処理を行う
// - データが間違っていたら、signin.phpに飛ばしてエラーを表示
// - 正しい組み合わせだったら、index.phpに飛ばす

// ログイン処理
// 1. フォームから送られてきたデータを受け取る
// email & password

// もし、emailとpasswordが送られて来なかったら

// isset => 変数がセットされているかどうかを調べる関数
// つまり、emailとpasswordが送られてされていなかったら、という条件

// issetがfalseの場合,直接アクセスしてきた場合など
// => エラーにしないで、サインインページにリダイレクト

// emptyがtrueの場合,空文字の場合
// => emailかpasswordでエラーを表示
// => emailが空だった場合は、「メールアドレスが入力されてません」
// => passが空だった場合は、「パスワードが入力されてません」

// error => エラーの場所を示す
// 1 => email
// 2 => password
// 3 => 全体

// errorCode => エラーの種類を表す
// 1 => 空
// 2 => データ不整合
// 3 => フォーマットエラー
// 4 => その他

$isError = false;
$params  = "?dummy=1";

if (
    isset($_POST['email']) === false ||
    isset($_POST['password']) === false
) {
    $isError = true;
} elseif (empty($_POST['email'])) {
    $isError               = true;
    $_SESSION['error']     = 1;
    $_SESSION['errorCode'] = 1;
} elseif (empty($_POST['password'])) {
    $isError               = true;
    $_SESSION['error']     = 2;
    $_SESSION['errorCode'] = 1;
}

if ($isError) {
    $_SESSION['email']    = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];

    // サインインページにリダイレクト
    header('Location: ./signin.php');
    exit;
}

$email    = $_POST['email'];
$password = $_POST['password'];

if ("ths99999@ths.hal.ac.jp" === $email && "password" === $password) {
    $_SESSION['user'] = $email;
    // トップページにリダイレクト
    header('Location: ./index.php');
    exit;
} else {
    // ログイン失敗
    // サインインページにリダイレクト
    $_SESSION['email']    = $email;
    $_SESSION['password'] = $password;

    $_SESSION['error']     = 3;
    $_SESSION['errorCode'] = 2;
    header('Location: ./signin.php');
    exit;
}
