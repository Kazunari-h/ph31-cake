<?php
// index.php
// - トップページ
// - ログインしないと見れない
// - ログインしていない場合はsignin.phpにリダイレクト
// - ログインしているときは、ログアウトボタンを表示

// session セッション
// - サーバー側にデータを保存する仕組み
// - クッキーと違い、データが見えない
// - 連想配列のように使うことができる
// - ログイン状態を保持するために使うことが多いです
// - セッションを使うには最初に宣言をしなければならない

// セッションを使うためには、session_start()を宣言する
// これを宣言することで、$_SESSIONという変数が使えるようになる

include './functions/common.php';
redirectIfUnauth();

?>
<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TOP</title>
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries">
        </script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    </head>

    <body class="flex flex-col w-screen min-h-screen">

        <?php include './components/header.php'; ?>
        <main class="grid flex-1 grid-cols-1 gap-36">
            <!-- Hero (スライドショー) -->
            <section class="px-4 py-8 swiper mySwiper">
                <div class=" max-w-screen swiper-wrapper">
                    <?php include "./components/index/slide-item.php"?>
                    <?php include "./components/index/slide-item.php"?>
                    <?php include "./components/index/slide-item.php"?>
                </div>
            </section>

            <!-- <section class="container mx-auto">
                <h2 class="mb-2 text-lg font-bold">ホーム</h2>
                <p>ログインしているユーザーのみが見れるページです</p>
            </section> -->

            <!-- レコメンド(おすすめ) -->
            <section class="container mx-auto">
                <h2 class="mb-2 text-lg font-bold">商品一覧</h2>
                <ul class="grid grid-cols-4 gap-8 py-8">
                    <?php include "./components/index/product-card.php"?>
                </ul>

            </section>

            <?php include "./components/index/genre.php" ?>
            
            <?php include "./components/index/product.php"?>

            <!-- バナー -->
            <section class="container grid grid-cols-3 gap-8 mx-auto">
                <img class="rounded-lg" src="https://placehold.jp/600x200.png" alt="バナー">
                <img class="rounded-lg" src="https://placehold.jp/600x200.png" alt="バナー">
                <img class="rounded-lg" src="https://placehold.jp/600x200.png" alt="バナー">
            </section>
            <!-- 問い合わせ -->
            <section class="container mx-auto">
                <div class="p-8 bg-white shadow-lg rounded-2xl">
                    <h2 class="mb-2 text-lg font-bold">お問い合わせ</h2>
                    <form class="flex flex-col gap-4 px-4 py-8">
                    </form>
                </div>
            </section>
        </main>
        <?php include './components/footer.php'; ?>
        <script>
        /* var swiper = new Swiper(".mySwiper", {
            slidesPerView: 2,
            spaceBetween: 80,
            loop: true,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            }
        });
        */
        </script>
    </body>

</html>
