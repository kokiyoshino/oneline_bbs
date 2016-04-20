<?php
    $nickname=$_POST['nickname'];
    $comment=$_POST['comment'];
    // $created=$_POST['created'];


    //データベースに接続
    $dsn ='mysql:dbname=oneline_bbs;host=localhost';

    // 接続するためのユーザー情報
    $user ='root';
    $password = '';

    // DB接続オブジェクトを作成 （オブジェクト指向）
    $dbh = new PDO($dsn,$user,$password);

    // 接続したDBオブジェクトで文字コードutf8を使うように指定
    $dbh->query('SET NAMES utf8');

  //POST送信が行われたら、下記の処理を実行
  //テストコメント
    if(isset($_POST) && !empty($_POST)){

    // //データベースに接続
    // $dsn ='mysql:dbname=oneline_bbs;host=localhost';

    // // 接続するためのユーザー情報
    // $user ='root';
    // $password = '';

    // // DB接続オブジェクトを作成 （オブジェクト指向）
    // $dbh = new PDO($dsn,$user,$password);

    // // 接続したDBオブジェクトで文字コードutf8を使うように指定
    // $dbh->query('SET NAMES utf8');

    //SQL文作成(INSERT文)
    //INSERT文実行$_POST['nickname']
    // $sql ='INSERT INTO posts (id,nickname,comment,created) VALUES("'.null.'","'.$nickname.'","'.$comment.'","'.now().'")';
    $sql = sprintf('INSERT INTO posts (nickname,comment,created) VALUES(\'%s\',\'%s\',now())',$_POST['nickname'],$_POST['comment']);

    $stmt = $dbh->prepare($sql);
    $stmt->execute();


    //データベースから切断
    // $dbh = null;

    
  }

    //SQL文作成(SELECT文) 
    $sql= 'SELECT * FROM `posts`';
    //SELECT文実行
    $stmt = $dbh->prepare($sql);
    $stmt->execute();


    //格納する変数の初期化  
    $post = array();


    while (1)
  {
    //実行結果として得られたデータを表示
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($rec==false)
    {
    //取得できるデータがなくなったので、制御文から抜けて処理を終了する
    break;
    }

    //取得したデータを配列に格納しておく

    $posts[]= $rec;


  }



    $dbh = null;

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>セブ掲示版〜</title>

</head>
<body>
    <form action="bbs_no_css.php" method="post">
      <input type="text" name="nickname" placeholder="nickname" required>
      <textarea type="text" name="comment" placeholder="comment" required></textarea>
      <button type="submit" >つぶやく</button>
    </form>

    <?php
      //指定した配列のデータを数分繰り返し行う
      foreach ($posts as $post_each) {

      echo ' <h2><a href="#">'.$post_each['nickname'].'</a> <span>'.$post_each['created'].'</span></h2>';
      echo '<p>'.$post_each['comment'].'</p>';
      }



    ?>




   <!--  <h2><a href="#">nickname Eriko</a> <span>2015-12-02 10:10:20</span></h2>
    <p>つぶやきコメント</p>

    <h2><a href="#">nickname Eriko</a> <span>2015-12-02 10:10:10</span></h2>
    <p>つぶやきコメント2</p> -->
</body>
</html>



