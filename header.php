<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Carousel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Главная</a>
          </li>
          <?php
        if($_COOKIE['login'] != ''):
          echo '<a class="p-2 text-dark" href="article.php">Добавить статью</a>';
        endif;
          ?>
          <?php
        if($_COOKIE['login'] == ''):
          ?>
          <li class="nav-item">
            <a class="nav-link" href="reg.php">Регистрация</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="auth.php" >Войти</a>
          </li>
          <?php
        else:
          ?>
          <li class="nav-item">
            <a class="nav-link" href="auth.php">Кабинет пользователя</a>
          <?php
        endif;
          ?>
          </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
