<?php

$servername = "127.0.0.1";
$username = "root";
$password = "123";
$dbName = "web_profile_db";

$link = mysqli_connect($servername, $username, $password);

if (!$link) {
  die("Ошибка подключения: " . mysqli_connection_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbName";

if (!mysqli_query($link, $sql)) {
  echo "Failed to create DB";
}

mysqli_close($link);

$link = mysqli_connect($servername, $username, $password, $dbName);

$sql = "CREATE TABLE IF NOT EXISTS users(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(15) NOT NULL,
  email VARCHAR(50) NOT NULL,
  pass VARCHAR(20) NOT NULL
)";

if(!mysqli_query($link, $sql)) {
  echo "Failed to create the table Users";
}

$sql = "CREATE TABLE IF NOT EXISTS posts(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(20) NOT NULL,
  main_text VARCHAR(400) NOT NULL
)";

if(!mysqli_query($link, $sql)) {
  echo "Failed to create the table Posts";
}

mysqli_close($link);
?>