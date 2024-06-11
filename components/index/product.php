
<?php

// データベースに接続し、
// Mac用の設定
$dbh = new PDO("mysql:dbname=iw13;host=localhost;port=8889", "root", "root");

// Windows用の設定
// $dbh = new PDO("mysql:dbname=iw13;host=localhost", "root", "");

$sql = "SELECT * FROM products LEFT JOIN product_images ON products.id = product_images.product_id";

// ジャンルの一覧を取得する
$stmt = $dbh->query($sql);
$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- 商品一覧 -->
<section class="container mx-auto">
    <h2 class="mb-2 text-lg font-bold">商品一覧</h2>
    <ul class="grid grid-cols-4 gap-8 py-8">
        <?php
        foreach ($list as $product) {
            ?>
            <li>
                <a href="" class="flex flex-col justify-between h-full gap-4">
                    <?php
                    if ($product["image_path"]) {
                        echo '<img class="object-cover rounded-lg" src="' . $product["image_path"] . '" alt="商品">';
                    } else {
                        echo '<img class="object-cover rounded-lg" src="https://placehold.jp/300x300.png" alt="商品">';
                    }
                    ?>
                    <p class="text-sm text-center"><?= $product["name"] ?></p>
                    <p class="text-sm text-center"><?= number_format($product["price"]) ?>円</p>
                </a>
            </li>
            <?php
        }
        ?>
    </ul>

    <!-- ページネーション -->
    <div>
        <ul class="flex justify-center gap-4">
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href="">5</a></li>
        </ul>
    </div>
</section>

