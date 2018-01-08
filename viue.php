<?php
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
  $sql = 'SELECT * FROM `survey`;';

  // sqlを実行する準備
  // ＝＞アロー演算子
  $stmt = $dbh->prepare($sql);

// 実行
  $stmt->execute();

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
      
                <td>
                    <a href="edit.php?code=<?php echo $record["code"];?>"><input type="button" name="" value="編集"></a>         
                </td>
                <td>
                  <a href="delete.php?code=<?php echo $record["code"];?>" onclick="return confirm('<?php echo $record["code"];?>を削除します。よろしいですか？');"><input type="button" name="" value="削除"></a>
                </td>
              </tr>

<?php }
  $dbh = null;
?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <?php include('copyright.php'); ?>
  </body>
</html>