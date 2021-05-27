<?php
mb_internal_encoding("utf8");

$temp_pic_name=$_FILES['picture']['tmp_name'];

$original_pic_name=$_FILES['picture']['name'];
$path_filename='./image/'.$original_pic_name;

move_uploaded_file($temp_pic_name,'./image/'.$original_pic_name);

?>

<DOCTYPE HTML>
<html lang="ja">
    <head>
    <title>マイページ登録</title>
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
            <h1>会員登録 確認</h1>
            <p>こちらの内容で登録してもよろしいでしょうか？</p>

            <p>氏名 : <?php echo $_POST['name'];?></p>

            <p>メール : <?php echo $_POST['mail_adress'];?></p>

            <p>パスワード : <?php echo $_POST['password'];?></p>

            <p>プロフィール写真 : <?php echo $_FILES['picture']['name'];?></p>

            <p>コメント : <?php echo $_POST['comments'];?></p>

            <div class="button">
                <div class="button3">   
                <form action="register.php">
                    <input type="submit" class="button1" value="戻って修正する"/>
                </form>
                </div>

                <div class="button3">
                <form action="register_insert.php" method="post" enctype="multipart/form-data">
                    <input type="submit" class="button2" value="登録する"/>
                </div>
                    <input type="hidden" value="<?php echo $_POST['name'];?>" name="name">
                    <input type="hidden" value="<?php echo $_POST['mail_adress'];?>" name="mail_adress">
                    <input type="hidden" value="<?php echo $_POST['password'];?>" name="password">
                    <input type="hidden" value="<?php echo $path_filename;?>" name="path_filename">
                    <input type="hidden" value="<?php echo $_POST['comments'];?>" name="comments">
                </form>
            </div>
        </div>
    </main>

    <footer>
        © 2018 Internous.inc. All rights reserved 
    </footer>

    </body>
    </html>

