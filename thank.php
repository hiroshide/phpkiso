<?php
//扱いやすいように変数に代入
$nickname =  htmlspecialchars($_POST["nickname"]);
$email = htmlspecialchars($_POST["email"]);
$phone = htmlspecialchars($_POST["phone"]);
$content = htmlspecialchars($_POST["content"]);



// データベースの処理を書く所
// ステップ１ 接続
// データベース接続文字列
// mysql:データベースの種類
// dbname：データベースの名前
// host：パソのアドレス　localhost
// このプログラムがある場所と同じサーバー
// 空欄入れないルール
  // $dsn = 'mysql:dbname=phpkiso;host=localhost';

  // // データーベース接続用のユーザー
  // // パスワード
  // $user = 'root';
  // $password='';

  // // データーベース接続オブジェクト
  // $dbh = new PDO($dsn, $user, $password);

  // // 今から実行するSqLをUTF８で送るという設定
  // $dbh->query('SET NAMES utf8');
  require('dbconect.php');
// ステップ２　実行
  $sql = 'INSERT INTO `survey` (`nickname`,`email`,`content`)  VALUES ("'.$nickname.'","'.$email.'","'.$content.'");';

  // sqlを実行する準備
  // ＝＞アロー演算子
  $stmt = $dbh->prepare($sql);

// 実行
  $stmt->execute();

// ステップ３　切断　オブジェクトを空にする
  $dbh = null;


?>
<!DOCTYPE html>
<html>
<head>
  <title>送信完了</title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/kiso.css">

  <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <meta charset="utf-8">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <br><br>
        <div class="offer offer-success">
          <div class="shape">
            <div class="shape-text">
              完了                
            </div>
          </div>
          <div class="offer-content">
            <h3 class="lead">
              お問い合わせ<br>ありがとうございました。
            </h3>
            <h3 class="lead">
              ニックネーム<br><?php echo htmlspecialchars($_POST["nickname"]); ?>
            </h3> 
            <h3 class="lead">
              メールアドレス<br></p><?php echo htmlspecialchars($_POST["email"]); ?>
            </h3> 
            <h3 class="lead">
              電話番号<br><?php  echo htmlspecialchars($_POST["phone"]).'<br>'; ?>
            </h3>
            <h3 class="lead">
              お問い合わせ内容<br></p><?php  echo htmlspecialchars($_POST["content"]); ?>
            </h3> 
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>