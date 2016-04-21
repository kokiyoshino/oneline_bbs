<?php
	//データベースに接続
	// $dsn = 'mysql:dbname=oneline_bbs;host=localhost';
	// $user = 'root';
	 //    $password = '';
	 //    $dbh = new PDO($dsn,$user,$password);
	// $dbh = new PDO('mysql:dbname=LAA0731408-onelinebbs;host=localhost', 'root', '');
    // $dbh -> query('SET NAMES utf8');
    

    //ロリポップのデータベースに接続

    $dsn ='mysql:dbname=LAA0731408-onelinebbs;host=mysql110.phy.lolipop.lan';
    // 接続するためのユーザー情報
    $user ='LAA0731408';
    $password = '1365HAdK';
    // DB接続オブジェクトを作成 （オブジェクト指向）
    $dbh = new PDO($dsn,$user,$password);
    // 接続したDBオブジェクトで文字コードutf8を使うように指定
    $dbh->query('SET NAMES utf8');

?>

