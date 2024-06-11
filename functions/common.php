<?php
session_start();
// ここには、共通の処理を書く

// 最初にsession_start()を宣言する
// 例えば、issetで確認して値を取り出してセッションから削除する処理
// PHPの関数
// function 関数名(引数1, 引数2, ...) { 処理 }
function getSessionValue($key)
{
    // セッションに値が入っているか確認
    if (isset($_SESSION[$key])) {
        // セッションから値を取り出す
        $value = $_SESSION[$key];
        // セッションから値を削除する
        unset($_SESSION[$key]);
        // 取り出した値を返す
        return $value;
    }
    // セッションに値が入っていない場合はnullを返す
    return null;
}

// sessionにuserの値が入っていたら認証状態、入っていなかったら非認証状態
// 認証状態の場合は、signin.phpにリダイレクト
function isAuth()
{
    if (isset($_SESSION['user'])) {
        return true;
    }
    return false;
}

function redirectIfUnauth()
{
    if (!isAuth()) {
        header('Location: ./signin.php');
        exit;
    }
}

function redirectIfAuth()
{
    if (isAuth()) {
        header('Location: ./index.php');
        exit;
    }
}

// エラーメッセージを作成する関数
// error => エラーの場所を示す
// errorCode => エラーの種類を表す

// {
//     emailError: string;
//     passwordError: string;
//     errorMessage: string;
// }

function getErrorMessage()
{

    $emailError    = "";
    $passwordError = "";
    $errorMessage  = "";

    if (isset($_SESSION['error']) && isset($_SESSION['errorCode'])) {
        $error     = $_SESSION['error'];
        $errorCode = $_SESSION['errorCode'];
        if (1 === $error) {
            if (1 === $errorCode) {
                $emailError = "メールアドレスが入力されていません";
            } elseif (2 === $errorCode) {
                $emailError = "メールアドレスが間違っています";
            } elseif (3 === $errorCode) {
                $emailError = "メールアドレスの形式のエラーです";
            } else {
                $emailError = "エラーが発生しました";
            }
        } elseif (2 === $error) {
            if (1 === $errorCode) {
                $passwordError = "パスワードが入力されていません";
            } elseif (2 === $errorCode) {
                $passwordError = "パスワードが間違っています";
            } elseif (3 === $errorCode) {
                $passwordError = "パスワードの形式のエラーです";
            } else {
                $passwordError = "エラーが発生しました";
            }
        } else {
            if (1 === $errorCode) {
                $errorMessage = "データが不整合です";
            } elseif (2 === $errorCode) {
                $errorMessage = "メールアドレスまたはパスワードが間違っています";
            } elseif (3 === $errorCode) {
                $errorMessage = "データの形式のエラーです";
            } else {
                $errorMessage = "エラーが発生しました";
            }
        }
        // セッションから削除
        unset($_SESSION['error']);
        unset($_SESSION['errorCode']);
    }


    return [
        'emailError'    => $emailError,
        'passwordError' => $passwordError,
        'errorMessage'  => $errorMessage,
    ];
}
