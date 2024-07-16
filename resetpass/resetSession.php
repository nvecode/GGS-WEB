<?php
session_start();

function redirect() {
  header('Location: index.php');
  exit;
}

$directoryPath = dirname(__FILE__);

$admin_login_reset = trim($_POST['admin_login_reset']);
$admin_password_reset = trim($_POST['admin_password_reset']);
$username_reset = strtolower(trim($_POST['username_reset']));

if (empty($admin_login_reset)) {
    $_SESSION['error_reset'] = "Логин администратора не может быть пустым!";
    redirect();
}

if (empty($admin_password_reset)) {
  $_SESSION['error_reset'] = "Пароль администратора не может быть пустым!";
  redirect();
}

if (empty($username_reset)) {
  $_SESSION['error_reset'] = "Имя пользователя не может быть пустым!";
  redirect();
}

//Проверка логина администратора
include 'auth.php';

$found = false;

foreach ($accounts as $account) {
  if($admin_login_reset == $account['login'] && $admin_password_reset == $account['password']) {
    $found = true;
    break;
  }
}

if(!$found) {
  $_SESSION['error_reset'] = "Неверный логин или пароль администратора!";
  redirect();
}

putenv("NAME=\"$username_reset\"");

$command = "sh".$directoryPath."/scriptsBash/resetSessionRDP.sh";
if (exec($command) == "true") {
  $_SESSION['success_reset'] = "Сессия успешно сброшена!";
  redirect();
}

else {
  $_SESSION['error_reset'] = "Проверьте правильность написания имени пользователя, либо сессия пользователя не найдена!";
  redirect();
}

?>