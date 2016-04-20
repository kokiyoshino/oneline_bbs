<?php
	// ステップ1.db接続
	$dsn ='mysql:dbname=phpkiso;host=localhost';

	// 接続するためのユーザー情報
	$user ='root';
	$password = '';

	// DB接続オブジェクトを作成 （オブジェクト指向）
	$dbh = new PDO($dsn,$user,$password);

	// 接続したDBオブジェクトで文字コードutf8を使うように指定
	$dbh->query('SET NAMES utf8');
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<!--htmlファイルの情報（画面に表示されない）-->
    <meta charset="UTF-8">
    <title>PHP基礎</title>
</head>
<body>
	<?php
	$nickname=$_POST['nickname'];
	$email=$_POST['email'];
	$goiken=$_POST['goiken'];

	$nickname= htmlspecialchars($nickname);
	$email= htmlspecialchars($email);
	$goiken= htmlspecialchars($goiken);

	echo $nickname;
	echo '様<br/>';
	echo 'ご意見ありがとうございました。<br/>';

	echo '頂いたご意見『'.$goiken.'』<br/>';

	echo $email;
	echo 'にメールを送りましたのでご確認ください。';

	//ステップ２、データベースエンジンにSQL文で命令を出す
	$sql ='INSERT INTO survey (nickname,email,goiken) VALUES("'.$nickname.'","'.$email.'","'.$goiken.'")';
	$stmt = $dbh->prepare($sql);
	$stmt->execute();

	//ステップ３、データベースから切断
	$dbh = null;


	?>
</body>
</html>