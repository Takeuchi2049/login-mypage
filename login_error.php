<?php
session_start();
if (isset($_SESSION['id'])) {
    heaader("Location:mypage.php");
}
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
    <meta charset="utf8">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    </head>

    <body>
        <header>
            <img src="4eachblog_logo.jpg">
        </header>

        <main>
            <form action="mypage.php" method="post">
                <div class="form_contents">
                    <div class="error_message">メールアドレスまたはパスワードが間違っています。</div>
                    <div class="mail">
                        <label>メールアドレス</label><br>
                        <input type="text" class="formbox" size="40" name="mail_adress">
                    </div>

                    <div class="password">
                        <label>パスワード</label><br>
                        <input type="password" class="formbox" size="40" name="password">
                    </div>


                    <div class="login_button">
                        <input type="submit" class="submit_button" size="35" value="ログイン">
                    </div>
                </form>
        </main>

        <footer>
            © 2018 InterNous.Inc. All rights reserved
        </footer>
    </body>
</html>