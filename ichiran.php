<!DOCTYPE html>
<html lang="ja">
<head>
	<!--htmlファイルの情報（画面に表示されない）-->
    <meta charset="UTF-8">
    <title>一覧表示</title>
</head>
<body>
<?php
// $dsn = 'mysql:dbname=phpkiso;host=localhost';
// $user = 'root';
// $password = '';
// $dbh = new PDO($dsn,$user,$password);
// // $dbh = new PDO('mysql:dbname=phpkiso;host=localhost', 'root', '');
// $dbh -> query('SET NAMES utf8');
require('dbconnect.php');
//SQL文作成(SELECT文)
$sql = 'SELECT * FROM survey WHERE 1';
//SQL文実行
$stmt = $dbh->prepare($sql);
$stmt->execute();

//取得したデータを表示
//FETCH　データを取り出してカーソルを下に移動させる

while (1)
{
	//実行結果として得られたデータを表示
	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if ($rec==false)
	{
		//取得できるデータがなくなったので、制御文から抜けて処理を終了する
		break;
	}
	
	echo $rec['code'];
	echo '&nbsp;';
	echo $rec['nickname'];
	echo '&nbsp;';
	echo $rec['email'];
	echo '&nbsp;';
	echo $rec['goiken'];
	echo '<br/>';
}

//データベース接続を削除
$dbh = null;

?>

</body>
</html>