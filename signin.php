<?php

include './functions/common.php';
redirectIfAuth();

$emailError    = "";
$passwordError = "";
$errorMessage  = "";

// error => エラーの場所を示す
// 1 => email
// 2 => password
// 3 => 全体

// errorCode => エラーの種類を表す
// 1 => 空
// 2 => データ不整合
// 3 => フォーマットエラー
// 4 => その他

$errors = getErrorMessage();
$emailError    = $errors['emailError'];
$passwordError = $errors['passwordError'];
$errorMessage  = $errors['errorMessage'];

// $email    = getSessionValue('email');
// $password = getSessionValue('password');
$email    = "ths99999@ths.hal.ac.jp";
$password = "password";

$email    = null === $email ? "" : $email;
$password = null === $password ? "" : $password;

$hasEmailError    = empty($emailError) === false;
$hasPasswordError = empty($passwordError) === false;
$hasErrorMessage  = empty($errorMessage) === false;

?>

<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>サインイン</title>
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries">
        </script>

    </head>

    <body class="w-screen min-h-screen flex flex-col">

        <?php include './components/header.php'; ?>
        <main class="flex-1 flex justify-center items-center">
            <form class="flex flex-col gap-6 px-10 py-16 max-w-lg w-full" action="./auth.php" method="POST">

                <h2 class="text-2xl text-center text-gray-900 font-bold">サインイン</h2>
                <!-- メールアドレスの入力欄 -->
                <!-- メールアドレスエラーメッセージ -->

                <div class="flex flex-col gap-1">
                    <label class="text-xs text-gray-500" for="email">メールアドレス</label>
                    <input class="rounded-3xl" type="email" name="email" id="email" value="<?php echo $email; ?>">
                    <p class="text-xs text-rose-500">
                        <?php
                    if ($hasEmailError) {
                        echo $emailError;
                    }
                    ?>
                    </p>
                </div>

                <!-- パスワードの入力欄 -->
                <div class="flex flex-col gap-1">
                    <label class="text-xs text-gray-500" for="password">パスワード</label>
                    <input class="rounded-3xl" type="password" name="password" id="password"
                        value="<?php echo $password; ?>">
                    <p class="text-xs text-rose-500">
                        <?php
                    if ($hasPasswordError) {
                        echo $passwordError;
                    }
                    ?>
                    </p>
                </div>
                <!-- パスワードエラーメッセージ -->
                <!-- パスワードを忘れた方 -->

                <!-- サインインボタン -->

                <div class="text-right">
                    <button type="submit" class="bg-blue-500 text-white rounded-3xl py-2 px-4 text-sm">サインイン</button>
                </div>
                <!-- エラーメッセージ -->

                <div>
                    <p class="text-xs text-rose-500">
                        <?php
                    if ($hasErrorMessage) {
                        echo $errorMessage;
                    }
                    ?>
                    </p>
                </div>

            </form>
        </main>
        <?php include './components/footer.php'; ?>
    </body>

</html>
