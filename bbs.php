<?php
    // $dsn ='mysql:dbname=oneline_bbs;host=localhost';

    // // 接続するためのユーザー情報
    // $user ='root';
    // $password = '';

    $dsn ='mysql:dbname=LAA0731408-onelinebbs;host=mysql110.phy.lolipop.lan';

    // 接続するためのユーザー情報
    $user ='LAA0731408';
    $password = '1365HAdK';


    // DB接続オブジェクトを作成 （オブジェクト指向）
    $dbh = new PDO($dsn,$user,$password);

    // 接続したDBオブジェクトで文字コードutf8を使うように指定
    $dbh->query('SET NAMES utf8');

    if(isset($_POST) && !empty($_POST))
  {

      $sql = sprintf('INSERT INTO posts (nickname,comment,created) VALUES(\'%s\',\'%s\',now())',$_POST['nickname'],$_POST['comment']);

      $stmt = $dbh->prepare($sql);
      $stmt->execute();

  }

      $sql= 'SELECT * FROM `posts`';
      $sql= 'SELECT * FROM `posts` ORDER BY id DESC'; 
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
  <title>セブ掲示版</title>

  <!-- CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="assets/css/form.css">
  <link rel="stylesheet" href="assets/css/timeline.css">
  <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

  <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header page-scroll">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#page-top"><span class="strong-title"><i class="fa fa-linux"></i> Oneline bbs</span></a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
<!--                   <li class="hidden">
                      <a href="#page-top"></a>
                  </li>
                  <li class="page-scroll">
                      <a href="#portfolio">Portfolio</a>
                  </li>
                  <li class="page-scroll">
                      <a href="#about">About</a>
                  </li>
                  <li class="page-scroll">
                      <a href="#contact">Contact</a>
                  </li> -->
              </ul>
          </div>
          <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-md-4 content-margin-top">
        <form method="post">
          <div class="form-group">
            <div class="input-group">
              <input type="text" name="nickname" class="form-control"
                       id="validate-text" placeholder="nickname" required>

              <span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
            </div>
            
          </div>

          <div class="form-group">
            <div class="input-group" data-validate="length" data-length="4">
              <textarea type="text" class="form-control" name="comment" id="validate-length" placeholder="comment" required></textarea>
              <span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
            </div>
          </div>

          <button type="submit" class="btn btn-primary col-xs-12" disabled>つぶやく</button>
        </form>
      </div>

      <div class="col-md-8 content-margin-top">

        <div class="timeline-centered">
                    <?php
                      //指定した配列のデータを数分繰り返し行う
                      foreach ($posts as $post_each) 
                    {
                    ?>
        <article class="timeline-entry">

            <div class="timeline-entry-inner">

                      <div class="timeline-icon bg-success">
                        <i class="entypo-feather"></i>
                        <i class="fa fa-cogs"></i>
                      </div>

                  <div class="timeline-label">
                    

                    <h2><a href="#"><?php echo $post_each['nickname']; ?></a> <span><?php echo $post_each['created'];?></span></h2>
                    <p><?php echo $post_each['comment'];?></p>
                </div>
            </div>

        </article>

                    <?php
                      // echo ' <h2><a href="#">'.$post_each['nickname'].'</a> <span>'.$post_each['created'].'</span></h2>';
                      // echo '<p>'.$post_each['comment'].'</p>';
                    }



                    ?>


       

        <article class="timeline-entry begin">

            <div class="timeline-entry-inner">

                <div class="timeline-icon" style="-webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg);">
                    <i class="entypo-flight"></i> +
                </div>

            </div>

        </article>

      </div>

    </div>
  </div>





  
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/form.js"></script>
</body>
</html>



