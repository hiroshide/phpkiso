<?php
// 開発環境用
  $dsn = 'mysql:dbname=phpkiso;host=localhost';
  $user = 'root';
  $password='';
// 
  // データーベース接続用のユーザー
  // パスワード・

// 本番環境用
  // $dsn = 'mysql:dbname=LAA0918896-phpkiso;host=mysql103.phy.lolipop.lan';
  // $user = 'LAA0918896';
  // $password='sebunxseed';

  // データーベース接続オブジェクト
  $dbh = new PDO($dsn, $user, $password);

  // 今から実行するSqLをUTF８で送るという設定
  $dbh->query('SET NAMES utf8');
?>