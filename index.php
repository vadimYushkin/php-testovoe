<!DOCTYPE html>
<html lang="ru">
<head>
<?php
$title="Главная";
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
<?php
require_once 'mysql.php';
$sql = 'SELECT * FROM `article` ORDER BY `date` DESC';
$query = $pdo->query($sql);
while($row = $query->fetch(PDO::FETCH_OBJ)) {
  echo "<h2>$row->title</h2>
  <p>$row->intro</p>
  <p><b>Автор статьи:</b>$row->avtor</p>
  <a href= 'news.php?id=$row->id'><button class='btn btn-danger mb-4'>Раскрыть</button></a>";
}
  ?>
    </div>
<?php
require 'aside.php';
?>

</div>
</main>
<?php
require 'footer.php';
?>
</body>
</html>
