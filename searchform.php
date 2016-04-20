<?php

	

	if (isset($_GET['nickname'])) {

		//POST送信されてきたら

	if ($_GET['nickname']== '') {

		echo 'ニックネームが入力されていません。';
		# code...
	}else {
		//ニックネームが入力されているので、検索結果ページへ移動する。

		header('Location: search.php?nickname='.$_GET['nickname']);
	}


}

?>


<!DOCTYPE html>
<html lang="ja">
	<head>
	<!--htmlファイルの情報（画面に表示されない）-->
    <meta charset="UTF-8">
    <title>あいまい検索</title>
	</head>
	<body>
		<form method="get" action="searchform.php">
		ニックネームを入力してください。<br/>
		<input name="nickname" type="text" style="width: 100px"><br/>
		<br/>
		<input type="submit" value="送信">
		
		</form>





	</body>
</html>