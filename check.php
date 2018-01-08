<!DOCTYPE html>
<head>
  <title>入力内容確認</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/kiso.css">

  <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>



</head>
<body>
  <form method="POST" action="thank.php">
    <input type="hidden" name="nickname" value="<?php echo $_POST["nickname"]; ?>"> 
    <input type="hidden" name="email" value="<?php echo $_POST["email"]; ?>"> 
    <input type="hidden" name="content" value="<?php echo $_POST["content"]; ?>"> 
    <input type="hidden" name="phone" value="<?php echo $_POST["phone"]; ?>"> 
    <div class="container">
      <div class="row text-center">
        <div class="col-md-12">
          <h2>入力内容確認</h2>
        </div>
        <div class="col-md-12" style="margin-top: 20px;">
          <div class="pricing-table">
            <div class="panel panel-primary" style="border: none;">
              <div class="controle-header panel-heading panel-heading-landing">
                <h1 class="panel-title panel-title-landing">入力内容</h1>
              </div>
              <div class="controle-panel-heading panel-heading panel-heading-landing-box">
                    お間違えありませんか？
              </div>
              <div class="panel-body panel-body-landing">
                <table class="table">
                  <tr>
                    <td width="50px"><i class="fa fa-check"></i>
                    </td>
                    <?php if ($_POST["nickname"]==""){echo 'ニックネームを入力してください<br>';
                    }else{?>
                    <td>ニックネーム：<br><?php  echo htmlspecialchars($_POST["nickname"]); ?>様
                    <?php } ?>
                    </td>
                  </tr>
                  <tr>
                    <td width="50px"><i class="fa fa-check"></i>
                    </td>
                    <?php if($_POST["email"]==""){ echo 'メールアドレスを入力してください<br>';}else{?>
                    <td>メールアドレス：<br><?php echo htmlspecialchars($_POST["email"]); ?>
                    <?php } ?>
                    </td>
                  </tr>
                  <tr>
                    <td width="50px"><i class="fa fa-check"></i></td>
                    <td>電話番号：<br><?php echo $_POST["phone"]; ?></td>
                  </tr>
                  <tr>
                    <td width="50px"><i class="fa fa-check"></i></td>
                    <td>お問い合わせ内容：<br><?php echo htmlspecialchars($_POST["content"]); ?></td>
                  </tr>

                </table>
              </div>
              <div class="panel-footer panel-footer-landing">
                <input type="button" class="btn btn-price btn-success btn-lg" value="戻る" onclick="history.back()">
                <?php if (($_POST['nickname'] !="") && ($_POST['email'] !="") && ($_POST['content'] !="")){ ?>
                      <input id="ok" type="submit" class="btn btn-price btn-success btn-lg" value="OK">
                    <?php } ?>
                <!-- <input id="ok" type="submit" class="btn btn-price btn-success btn-lg" value="OK"> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>


  <script type="text/javascript">
    $('#ok').on('click', function() {
  alert("正常に処理されました。");
});
  </script>


</body>
</html>