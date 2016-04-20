<!DOCTYPE html>
<html lang="ja">
<head>
	<!--htmlファイルの情報（画面に表示されない）-->
    <meta charset="UTF-8">
    <title>あいまい検索</title>
</head>
<body>
	<?php
	try{

	$nickname=$_GET['nickname'];

	$dsn = 'mysql:dbname=phpkiso;host=localhost';
	$user = 'root';
    $password = '';
    $dbh = new PDO($dsn,$user,$password);
// $dbh = new PDO('mysql:dbname=phpkiso;host=localhost', 'root', '');
    $dbh -> query('SET NAMES utf8');
	//require('dbconnect.php');
    // $data[]=$nickname;

    //var_dump($data)

	// $sql = 'SELECT * FROM survey WHERE nickname LIKE ?';

	$sql = 'SELECT * FROM survey WHERE nickname LIKE "%'.$nickname.'%"';

	$stmt = $dbh->prepare($sql);

	// $stmt->execute(array("%$_GET[nickname]%"));
	$stmt->execute();

//取得したデータを表示
//FETCH　データを取り出してカーソルを下に移動させる

		//実行結果として得られたデータを表示
	$i = 0;
	while (1) {
		# code...
		$rec = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($rec==false) {
			//取得できるデータがなくなったので、制御文から抜けて処理を終了する
			if ($i === 0) {
				echo '検索結果がありませんでした。';
				break;
			} else {
				break;
			}
		} else {
			echo $rec['code'];
			echo '&nbsp;';
			echo $rec['nickname'];
			echo '&nbsp;';
			echo $rec['email'];
			echo '&nbsp;';
			echo $rec['goiken'];
			echo '<br/>';
			$i++;
		} 
	}
//データベース接続を削除
	$dbh = null;
		}catch(Exception $e)
			{ echo 'ただいま障害により大変ご迷惑をおかけしております。';

		}


	?>
</body>
</html>