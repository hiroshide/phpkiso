<?php

// どのデータを消すのか指定してる情報をGEt送信で取得
    var_dump($_GET['code']);

    if(isset($_GET['code'])){
// ステップ１
  // データベースに移動
    require('dbconect.php');


  // ステップ２　SQL実行
      $sql = 'DELETE  FROM `survey` WHERE`code`='.$_GET['code'];

        // sqlを実行する準備
  // ＝＞アロー演算子
      $stmt = $dbh->prepare($sql);

// 実行
      $stmt->execute();




// 実行
      $stmt->execute();

      // ステップ３　データベース破棄
      $dbh = null;

        // VIUE.phpに戻る
      header('Location: viue.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  イタズラしないでね
</body>
</html>