<?php

// 変数の中身を表示する　UNDEFINE が表示される場合POST送信されていない
   // var_dump($_POST["code"]);
//扱いやすいように変数に代入



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
// SQLインジェクション
  // 
  if ((isset($_POST['code']))  &&  ($_POST['code'] !='')){
// post送信されている ？は置き換えたい値があるところに記述
      $sql = 'SELECT * FROM `survey`WHERE `code`=?;';
// 置き換えたいデータを配列の形で保存
      // 配列の末尾に追加される
      // $data = $_POST['code'] $dataの中に記述された文字が入る
      // $data[] = $_POST['code'] [0]の中に格納
      $data[] = $_POST['code'];
        // sqlを実行する準備
      
  // ＝＞アロー演算子
       $stmt = $dbh->prepare($sql);

// 実行
        $stmt->execute($data);
  }else{
// されていない
      $sql = 'SELECT * FROM `survey`;';

        // sqlを実行する準備
  // ＝＞アロー演算子
      $stmt = $dbh->prepare($sql);

// 実行
      $stmt->execute();

  }



// ステップ３　切断　オブジェクトを空にする
  // $dbh = null;


?>
<!DOCTYPE html>
<html>
  <head>
    <title>お問い合わせ一覧</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/kiso.css">
  </head>
  <body>
    <div class="otoiawase">
      <h1><img class="zaki" src="zaki.png">お問い合わせ一覧<img class="zaki" src="zaki.png"></h1>
    </div>
    <form action="" method="post">
    <p class="ii">検索したい文字を入力</p>
    <div class="i">
      <input type="text" name="code" >
      <input type="submit" name="検索">
    </div>
    <div class="container">
      <div class="row">
        <div class="panel panel-primary filterable">
          <div class="panel-heading">
            <h3 class="panel-title">Users</h3>
              <div class="pull-right">
              </div>
          </div>
          <table class="table">
            <thead>
              <tr class="filters">
                <th><input type="text" class="form-control" placeholder="id" disabled></th>
                <th><input type="text" class="form-control" placeholder="NickName" disabled></th>
                <th><input type="text" class="form-control" placeholder="EMAIL" disabled></th>
                <th><input type="text" class="form-control" placeholder="CONTENT" disabled></th>
              </tr>
            </thead>
            <tbody>
<?php  
  while(1){
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($record == false) {
      break;
    }
?>
              <tr>
                <td><?php echo $record["code"];?></td>
                <td><?php echo $record["nickname"];?></td>
                <td><?php echo $record["email"];?></td>
                <td><?php echo $record["content"];?></td>
              </tr>            
<?php }
  $dbh = null;
?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>