<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <title>Сервис сброса</title>
  <link rel="stylesheet" href="css/main.css">
  <link rel="icon" href="img/reset_icon.ico">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"> -->
</head>
<body>
  <section class="section-header">
    <div class="conteiner">
      <div class="header-logo">Сервис для сброса сессий и паролей ДЗО</div>
    </div>
  </section>

  <section class="section-main">
    <div class="conteiner">
      <div class="main-logo-form">Сброс паролей</div>
      <form class="main-form" action="resetPassword.php" method="POST">
        <div class="form-error"><?=$_SESSION['errors']?></div>
        <input type="text" name="admin_login" placeholder="Имя учётной записи администратора">
        <input type="password" name="admin_password" placeholder="Пароль учётной записи администратора">
        <input type="text" name="account_login" placeholder="Имя учётной записи пользователя">
        <input type="password" name="account_password" placeholder="Новый пароль учётной записи пользователя">
        <button class="main-from-button" type="submit" name="button">Сбросить пароль, разблокировать и включить учётную запись</button>
        <div class="form-success"><?=$_SESSION['success']?></div>
      </form>
      
      <div class="main-logo-form">Сброс сессий RDP</div>
      <form class="main-form" action="resetSession.php" method="POST">
        <div class="form-error"><?=$_SESSION['error_reset']?></div>
        <input type="text" name="admin_login_reset" placeholder="Имя учётной записи администратора">
        <input type="password" name="admin_password_reset" placeholder="Пароль учётной записи администратора">
        <input type="text" name="username_reset" placeholder="Имя учётной записи пользователя">
        <button class="main-from-button" type="submit" name="button" class="btn btn-success">Сбросить сессию</button>
        <div class="form-success"><?=$_SESSION['success_reset']?></div>
      </form>
    </div>
  </section>    
</body>
</html>
<?php
session_destroy();
?>
