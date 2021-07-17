<!DOCTYPE html>
<html lang="ru">
<head>
<?php
$title="Регистрация";
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
    <h5> Форма регистрации </h5>
      <form  action="" method="post">
        <label for="username">Ваше имя</label>
         <input type="text" name="username" id="username" class="form-control">
         <label for="email">Ваш email</label>
          <input type="email" name="email" id="email" class="form-control">
          <label for="login">Ваше логин</label>
           <input type="text" name="login" id="login" class="form-control">
           <label for="pass">Ваше пароль</label>
            <input type="password" name="pass" id="pass" class="form-control">
            <div class="alert alert-danger" id="error"></div>
            <button type="submit" id="reg_user" name="button" class="btn btn-success">Отправить</button>
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
  $('#reg_user').click(function(){
    var name = $('#username').val();
    var email = $('#email').val();
    var login = $('#login').val();
    var pass = $('#pass').val();

    $.ajax({
    url:   'ajax/reg.php',
    type: 'POST',
    cashe: false,
    data: {'username': name, 'email': email, 'login': login, 'pass': pass},
    dataType: 'html',
    success: function(data) {
      if(data == 'Готово') {
       $('#reg_user').text('Все готово');
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
