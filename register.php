<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="utf8">
<title>マイページ　会員登録</title>
<link rel="stylesheet" type="text/css" href="register.css">
</head>

<body>

<header>
    <div class="logo">
        <img src="4eachblog_logo.jpg">
    </div>
</header>

<main>
    
    <div class="form">
        <h1>会員登録</h1>

        <form method="post" action="register_confirm.php" enctype="multipart/form-data">
            <div class="form_contents">
                <div class="green_hilight">必須</div><label>氏名</label>
                <br>
                <input type="text" name="name" size="40" required>
            </div>

            <div class="form_contents">
                <div class="green_hilight">必須</div><label>メールアドレス</label>
                <br>
                <input type="text" name="mail_adress" size="40" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
            </div>

            <div class="form_contents">
                <div class="green_hilight">必須</div><label>パスワード(半角英数6文字以上)</label>
                <br>
                <input type="text" name="password" size="40" id="password" pattern="^[a-zA-Z0-9]{6,}$" required>
            </div>

            <div class="form_contents">
                <div class="green_hilight">必須</div><label>パスワード確認</label>
                <br>
                <input type="text" name="PS_check" size="40" id="confirm" oninput="ConfirmPassword(this)" required>
            </div>

            <div class="form_contents">
                <label>プロフィール写真</label>
                <br>
                <input type="hidden" name="max_file_size" value="1000000"/>
                <input type="file" name="picture" size="40">
            </div>

            <div class="form_contents">
                <label>コメント</label>
                <br>
                <textarea name="comments" rows="3" cols="50"></textarea>
            </div>

            <div class="button">
                <input type="submit" class="submit" value="登録する">
            </div>

        </form>
    </div> 
    
</main>

    <footer>
       © 2018 Internous.inc. All rights reserved 
    </footer>

<script>
    function ConfirmPassword(confirm) {
        var input1 = password.value;
        var input2 = confirm.value;
        if (input1 != input2) {
            confirm.setCustomValidity("パスワードが一致しません。");
        } else {
            confirm.setCustomValidity("");
        }
     } 
</script>

    </body>
    </html>