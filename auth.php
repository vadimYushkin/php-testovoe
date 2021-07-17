<!DOCTYPE html>
<html lang="ru">
<head>
<?php
$title="Авторизация";
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
      <?php
      if($_COOKIE['login'] == ''):
       ?>
    <h5> Форма авторизации </h5>
      <form  action="" method="post">
          <label for="login">Ваше логин</label>
           <input type="text" name="login" id="login" class="form-control">
           <label for="pass">Ваше пароль</label>
            <input type="password" name="pass" id="pass" class="form-control">
            <div class="alert alert-danger" id="error"></div>
            <button type="submit" id="auth_user" name="button" class="btn btn-success">Войти</button>
      </form>
      <?php
    else:
       ?>
       <h2><?=$_COOKIE['login']?></h2>
       <button class="btn btn-danger" id ="exit_button">Выйти</button>
      <?php
    endif;
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $('#auth_user').click(function(){
    var login = $('#login').val();
    var pass = $('#pass').val();

    $.ajax({
    url:   'ajax/auth.php',
    type: 'POST',
    cashe: false,
    data: {'login' : login, 'pass' : pass},
    dataType: 'html',
    success: function(data) {
      if(data == 'Готово') {
       $('#auth_user').text('Готово');
       $('#error').hide();
       document.location.reload(true);
     }
      else{
        $('#error').show();
        $('#error').text(data);
      }
    }
    });
  });

  $('#exit_button').click(function(){

    $.ajax({
    url:   'ajax/exit.php',
    type: 'POST',
    cashe: false,
    data: {},
    dataType: 'html',
    success: function(data) {
             document.location.reload(true);
     }

    }
    });
  });
</script>
</body>
</html>
