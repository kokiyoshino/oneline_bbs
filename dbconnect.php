<?php

	$dsn = 'mysql:dbname=phpkiso;host=localhost';
	$user = 'root';
    $password = '';
    $dbh = new PDO($dsn,$user,$password);
// $dbh = new PDO('mysql:dbname=phpkiso;host=localhost', 'root', '');
    $dbh -> query('SET NAMES utf8');
    
?>
