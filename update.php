
<?php
      $nickname =  htmlspecialchars($_POST["nickname"]);
      $email = htmlspecialchars($_POST["email"]);
      $content = htmlspecialchars($_POST["content"]);


// どのデータを消すのか指定してる情報をGEt送信で取得
    // var_dump($_GET['code']);

    // if(isset($_GET['code'])){
// ステップ１
  // データベースに移動
    require('dbconect.php');


  // ステップ２　SQL実行
      if (isset($_POST['code'])){
        $sql ='UPDATE `survey` SET `nickname`=("'.$nickname.'"),`email`=("'.$email.'"),`content`=("'.$content.'") WHERE `code`='.$_POST['code'];

//         // sqlを実行する準備
//   // ＝＞アロー演算子
      $stmt = $dbh->prepare($sql);

// // 実行
      $stmt->execute();

      // $record = $stmt->fetch(PDO::FETCH_ASSOC);

//       // ステップ３　データベース破棄
      $dbh = null;

//         // VIUE.phpに戻る
      header('Location: viue.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
    <input type="hidden" name="code" value="<?php echo $_POST['code']; ?>"> 
    <input type="hidden" name="nickname" value="<?php echo $_POST["nickname"]; ?>"> 
    <input type="hidden" name="email" value="<?php echo $_POST["email"]; ?>"> 
    <input type="hidden" name="content" value="<?php echo $_POST["content"]; ?>">     
 <?php   echo $_POST['code'].'<br>';
         echo $_POST["nickname"].'<br>';
         echo $_POST["email"].'<br>';
          echo $_POST["content"];
  ?>
</body>
</html>