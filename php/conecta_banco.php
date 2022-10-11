<?php
$dbUserName = 'root';
$Host = 'localhost'; 
$dbPass = '';
$DbName = 'cdc';
$conn = new PDO('mysql:host='.$Host .';dbname='.$DbName.'', $dbUserName, $dbPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    



