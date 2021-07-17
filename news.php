<!DOCTYPE html>
<html lang="ru">
<head>
<?php
  require_once 'mysql.php';
  $sql = 'SELECT * FROM `article` WHERE `id` = :id';
$id = $_GET['id'];
$query = $pdo->prepare($sql);
$query->execute(['id' => $id]);
$article = $query->fetch(PDO::FETCH_OBJ);
$title = $article->title;
require 'head.php';
?>
</head>
<body>
<?php
require 'header.php';
?>
<main class="container mt-5">
  <div class="row">
    <div class="col-md-8 mb-3">
<h2>Основная часть сайта</h2>
<div class="jumbotron">
  <h1><?=$article->title?></h1>
  <p><b>Автор статьи:</b><?=$article->avtor?></p>
<p><?=$article->intro?>
<br><br>
<?=$article->text?>
</p>
</div>
<h3 сclass="mt-4">Комментарии</h3>
<?php
$sql = 'SELECT * FROM `comments` WHERE `comment_id` = :id ORDER BY `id` DESC';
$query = $pdo->prepare($sql);
$query->execute(['id' => $_GET['id']]);
$comments = $query->fetchAll(PDO::FETCH_OBJ);
foreach ($comments as $comment ) {
  echo "<div class='alert alert-info mb-2'>
  <h4>$comment->name</h4>
  <p>$comment->message</p></div>";
}
?>
<form  action="news.php?id<?=$_GET['id']?>" method="post">
  <label for="username">Ваше имя</label>
  <input type="text" name="username" id="username" class="form-control">
  <label for="mess">Ваш комментарии</label>
  <textarea name="mess" id="mess" class="form-control"></textarea>
  <button type="submit" id="mess_send"  class="btn btn-success mt-3">Отправить комментарии</button>
</form>
<?php
if ($_POST['username'] != '' && $_POST['mess'] != '') {
  $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
  $mess = trim(filter_var($_POST['mess'], FILTER_SANITIZE_STRING));
  $sql = 'INSERT INTO comments(name, message, comment_id) VALUES(?, ?, ?)';
  $query = $pdo->prepare($sql);
  $query->execute([$username, $email, $_GET['id']]);
  }

require 'aside.php';
?>

</div>
</div>
</main>
<?php
require 'footer.php';
?>
</body>
</html>
