<?php 
// <!--   ステップ１
//   DB接続
      require('dbconect.php');


//   ステップ２
//   SQL実行
      $sql = 'SELECT * FROM `survey` WHERE`code`='.$_GET['code'];

      $stmt = $dbh->prepare($sql);

// 実行
      $stmt->execute();

// ここにフェッチしたデータを保存しておく代入文
      $record = $stmt->fetch(PDO::FETCH_ASSOC);
//   ステップ３
//   接続の解除
      $dbh = null;

//  -->

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/kiso.css">
  <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<body>
  <section id="contact" style="background :linear-gradient(to left, #3f863a3d , #252889);">
    <div class="section-content">
      <h1 class="section-header"><span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s">お問い合わせ</span></h1>
      <h3>お問い合わせ情報編集</h3>
    </div>
    <div class="contact-section">
      <div class="container">
        <form method="POST" action="update.php">
          <div class="col-md-6 form-line">
            <div class="form-group">
              CODE : <?php echo $_GET['code']; ?><br>
              <input type="hidden" class="form-control" name="code" value="<?php echo $_GET['code']; ?>">
            </div>  
            <div class="form-group">
              <label for="exampleInputUsername">ニックネーム</label>
              <input type="text" class="form-control" name="nickname" placeholder=" Enter nickname" value="<?php echo $record["nickname"];?>">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail">メールアドレス</label>
              <input type="email" class="form-control" name="email" placeholder=" Enter Email" value="<?php echo $record["email"];?>">
            </div>  
            <div class="form-group">
              <label for="telephone">電話番号</label>
              <input type="tel" class="form-control" name="phone" placeholder=" Enter mobile no.">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
             <label for ="description"> お問い合わせ内容</label>
             <textarea  class="form-control" name="content" placeholder="Enter Your Message"><?php echo $record["content"];?></textarea>
            </div>
            <div>
              <button type="submit" class="btn btn-info submit" onclick="return confirm('id:<?php echo $record["code"];?>を編集します。よろしいですか？');"><i class="fa fa-paper-plane" aria-hidden="true"></i>  送信</button>
            </div>
              
          </div>
        </form>
      </div>
    </div>
  </section>
</body>
</html>