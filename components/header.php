<header>
    <div class="container mx-auto flex justify-between items-center h-16">
        <div class="flex items-center gap-12">
            <h1>IW ECサイト</h1>
            <nav>
                <ul class="flex items-center gap-4">
                    <li><a href="./index.php">ホーム</a></li>
                    <li><a href="./signin.php">サインイン</a></li>
                </ul>
            </nav>
        </div>

        <div>
            <?php
            if (isAuth()) {
                echo '<a href="./signout.php">サインアウト</a>';
            }
            ?>

        </div>
    </div>
</header>
