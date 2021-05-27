<?php
mb_internal_encoding("utf8");
session_start();

if(empty($_SESSION['id'])) {

try {
    $pdo=new PDO("mysql:dbname=lesso00;host=localhost;","root","");
} catch(PDOException $e) {
    die("<p>申し訳ございません。現在サーバーが混みあっており一時的にアクセスができません。<br>
        しばらくしてから再度ログインしてください。</p>
        <a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>");    
}

$stmt=$pdo->prepare("select * from login_mypage where mail_adress=? && password=?");

$stmt->bindValue(1,$_POST["mail_adress"]);
$stmt->bindValue(2,$_POST["password"]);

$stmt->execute();
$pdo=NULL;

while ($row=$stmt->fetch()) {
    $_SESSION['id']=$row['id'];
    $_SESSION['name']=$row['name'];
    $_SESSION['mail_adress']=$row['mail_adress'];
    $_SESSION['password']=$row['password'];
    $_SESSION['picture']=$row['picture'];
    $_SESSION['comments']=$row['comments'];
}

if (empty($_SESSION['id'])) {
    header('Location:login_error.php');
}

if(!empty($_POST['login_keep'])) {
    $_SESSION['login_keep']=$_POST['login_keep'];
}
}

if(!empty($_SESSION['id']) && !empty($_SESSION['login_keep'])) {
    setcookie('mail_adress',$_SESSION['mail_adress'],time()+60*60*24*7);
    setcookie('password',$_SESSION['password'],time()+60*60*24*7);
    setcookie('login_keep',$_SESSION['login_keep'],time()+60*60*24*7);

} else if (empty($_SESSION['login_keep'])) {
    setcookie('mail_adress','',time()-1);
    setcookie('password','',time()-1);
    setcookie('login_keep','',time()-1);
}
?>

<!DOCTYPE html>
<html lang="ja">
<meta charset="utf8">
    <head>
        <title>マイページ登録</title>
        <link rel="stylesheet" type="text/css" href="mypage.css">
    </head>

    <body>

        <header>
            <div class="logo">
                <img src="4eachblog_logo.jpg">

                <div class=log_out>
                    <a href="http://localhost/login_mypage/log_out.php">ログアウト</a>
                </div>
            </div>
        </header>

        <main>
            <div class="info">
                <h1>会員情報</h1>
                <p>こんにちは！　<?php echo $_SESSION['name'];?> さん</p>

                <div class="yokonarabi">
                    <div class="photo">
                        <img src="<?php echo $_SESSION['picture'];?>" class="profile"> 
                    </div>

                    <div class="accounts">
                        <p>氏名　: <?php echo $_SESSION['name'];?> </p>
                        <p>メール : <?php echo $_SESSION['mail_adress'];?> </p>
                        <p>パスワード : <?php echo $_SESSION['password'];?> </p>
                    </div>
                </div>

                <div class="comments">
                    <?php echo $_SESSION['comments'];?>
                </div>

                <form action="mypage_hensyu.php" method="post" class="form_center">
                    <input type="hidden" value="<?php echo rand(1,10);?>" name="form_mypage">
                    <div class="button">
                        <input type="submit" class="submit" value="編集する">
                    </div>
                </form>
            </div> 
        </main>

        <footer>
            © InterNous.Inc. All rights reserved
        </footer>
            


    </body>