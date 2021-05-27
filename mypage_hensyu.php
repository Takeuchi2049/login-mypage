<?php
mb_internal_encoding("utf8");

session_start();

if (empty($_SESSION['id'])) {
    header("Location:login_error.php");
}

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
    <meta charset="utf8">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="mypage_hensyu.css">
    </head>

    <body>
    <header>
            <div class="logo">
                <img src="4eachblog_logo.jpg">
                <div class="log_out">
                    <a href="http://localhost/login_mypage/log_out.php">ログアウト</a>
            </div>
    </header>

    <main>
        <div class="info">
            <h1>会員情報</h1>
            <p>こんにちは！　<?php echo $_SESSION['name'];?> さん</p>

            <div class=yokonarabi>
                <div class="photo">
                    <img src="<?php echo $_SESSION['picture'];?>" class="profile">
                </div>

            <form action="mypage_update.php" method="post">
                <div class="accounts">
                    <p>氏名 : 
                        <input type="text" name="name" size="40" value="<?php echo $_SESSION['name'];?>">
                    </p>   

                    <p>メール　:
                        <input type="text" name="mail_adress" size="40" value="<?php echo $_SESSION['mail_adress'];?>">
                    </p>

                    <p>パスワード :
                        <input type="text" name="password" size="40" value="<?php echo $_SESSION['password'];?>">
                    </p>
                </div>
            </div>

                <input type="text" name="comments" size="80" value="<?php echo $_SESSION['comments'];?>">

                <div class="button">
                    <input type="submit" class="submit" value="この内容に変更する">
                </div>
            </form>
        </div>
    </main>

    <footer>
            © InterNous.Inc. All rights reserved
    </footer>

    </body>