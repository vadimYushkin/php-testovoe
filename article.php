<?php
if ($_COOKIE['login'] == '') {
header('Location: reg.php');
exit();
}
 ?>
<!DOCTYPE html>
<html lang="ru">
<head>
<?php
$title="Добавление статьи";
require 'head.php';
?>
</head>
<body>
<?php
require 'header.php';
?>
<main class="container mt-5">
  <div class="row">
    <div class="col-md-8 mt-5">
    <h5> Добавление статьи </h5>
      <form  action="" method="post">
        <label for="title">Заголовок</label>
         <input type="text" name="title" id="title" class="form-control">
         <label for="intro">Краткое содержание</label>
         <textarea name="text" id="intro" class="form-control"></textarea>
         <label for="intro">Полное содержание</label>
         <textarea name="text" id="text" class="form-control"></textarea>
            <div class="alert alert-danger" id="error"></div>
            <button type="submit" id="send_article" name="button" class="btn btn-success">Добавить</button>
      </form>
      </div>
<?php
require 'aside.php';
?>

  </div>
</main>
<?php
require 'footer.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $('#send_article').click(function(){
    var title = $('#title').val();
    var intro = $('#intro').val();
    var text = $('#text').val();

    $.ajax({
    url:   'ajax/add_article.php',
    type: 'POST',
    cashe: false,
    data: {'title': title, 'intro': intro, 'text': text},
    dataType: 'html',
    success: function(data) {
      if(data == 'Готово') {
       $('#send_article').text('Все готово');
       $('#error').hide();
     }
      else{
        $('#error').show();
        $('#error').text(data);
      }
    }
    });
  });
</script>
</body>
</html>
