<!doctype HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>4eachblog 掲示板</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <?php
            mb_internal_encoding("utf8");
            $pdo = new PDO("mysql:dbname=lesson01;host=localhost;", "root", "");
            $stmt = $pdo -> query("select * from 4each_keijiban");

        ?>

        <div class="logo"><img src="4eachblog_logo.jpg" class="logo"></div>
        <header>
            <ul>
                <li>トップ</li>
                <li>プロフィール</li>
                <li>4eachについて</li>
                <li>登録フォーム</li>
                <li>問い合わせ</li>
                <li>その他</li>
            </ul>
        </header>
        <main>
            <div class="left">
                <h1>プログラミングに役立つ掲示板</h1>
                <form method="post" action="insert.php">
                    <h2>入力フォーム</h2>
                    <p>
                        <label>ハンドルネーム</label>
                        <br>
                        <input type="text" class="handlename" name="handlename">
                    </p>
                    <p>
                        <label>タイトル</label>
                        <br>
                        <input type="text" class="title" name="title">
                    </p>
                    <p>
                        <label>コメント</label>
                        <br>
                        <textarea rows="7" cols="50" class="comments" name="comments"></textarea>
                    </p>
                    <input type="submit" class="button1" value="投稿する">
                </form>
                <?php

                    while($row = $stmt -> fetch()){
                        echo "<div class='kiji'>";
                        echo "<h3>".$row['title']."</h3>";
                        echo "<div class='contents'>";
                        echo "<div class='comments'>";
                        echo $row['comments'];
                        echo "</div>";
                        echo "<div class='handlename'>posted by "
                        .$row['handlename']."</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                ?>
            </div>
            <div class="right">
                <h2>人気の記事</h2>
                <div class="link">
                    <a href="">PHPオススメ本</a>
                    <a href="">PHP MyAdminの使い方</a>
                    <a href="">今人気のエディタ Top5</a>
                    <a href="">HTMLの基礎</a>
                </div>

                <h2>オススメリンク</h2>
                <div class="link">
                    <a href="">インターノウス株式会社</a>
                    <a href="">XAMPPのダウンロード</a>
                    <a href="">Eclipseのダウンロード</a>
                    <a href="">Bracketsのダウンロード</a>
                </div>

                <h2>カテゴリ</h2>
                <div class="link">
                    <a href="">HTML</a>
                    <a href="">PHP</a>
                    <a href="">MySQL</a>
                    <a href="">JavaScript</a>
                </div>
            </div>
        </main>
        <footer>
            copyright © internous | 4each blog the which provides A to Z about programming.
        </footer>
    </body>