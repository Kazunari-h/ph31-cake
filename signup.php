<?php

include './functions/common.php';
redirectIfAuth();

?>
<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>新規登録</title>
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries">
        </script>

        <!-- <link rel="stylesheet" href="./assets/css/common.css"> -->

    </head>

    <body class="w-screen min-h-screen flex flex-col">

        <?php include './components/header.php'; ?>
        <main class="flex-1">
            <section>
                <h2>新規登録画面</h2>
                <p>
                    新規登録画面です
                </p>
            </section>
        </main>
        <?php include './components/footer.php'; ?>
    </body>

</html>
