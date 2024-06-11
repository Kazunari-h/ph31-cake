<?php

// データベースに接続し、
// Mac用の設定
$dbh = new PDO("mysql:dbname=iw13;host=localhost;port=8889", "root", "root");

// Windows用の設定
// $dbh = new PDO("mysql:dbname=iw13;host=localhost", "root", "");

$sql = "SELECT * FROM genres";

// ジャンルの一覧を取得する
$stmt = $dbh->query($sql);
$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!-- ジャンル -->
<section class="container mx-auto">
    <h2 class="mb-2 text-lg font-bold">おすすめのジャンル</h2>
    <ul class="grid grid-cols-6 gap-8 py-8">
        <?php
        // 一つ一つの処理しながら、
        foreach ($list as $genre) {
            // ジャンルの名前を表示する
            ?>
            <li>
                <a href="" class="flex flex-col justify-center gap-4">
                    <img class="object-cover rounded-full aspect-[1/1]" src="<?= $genre["photo"] ?>" alt="ジャンル">
                    <p class="text-sm text-center"><?= $genre["name"] ?></p>
                </a>
            </li>
            <?php
        }
        ?>
    </ul>
</section>
