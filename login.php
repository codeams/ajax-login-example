<?php

  session_start();
  $isUserLoggedIn = isset( $_SESSION['session'] );
  if ( $isUserLoggedIn ) header('Location: users-panel.php');

?>
<!doctype html>
<html><head>

  <meta charset='utf-8'>
  <title>Iniciar sesión</title>
  <link rel='stylesheet' href='assets/login.css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet'>

</head><body>

  <div class='ui-locker'></div>

  <div class='content-wrapper'>

    <div class='title'>Iniciar sesión</div>

    <div class='instructions'>
      <p>Use su cuenta UADY.</p>
      <p><a href='#'>¿Qué es esto?</a></p>
    </div>

    <div class='error-message'>Nombre de usuario o contraseña incorrectos.</div>

    <div class='form'><form id='login' name='login' action=''>

      <input type='text' id='username' name='username' placeholder='Nombre de usuario' maxlength='20' autocomplete='off'>
      <input type='password' id='password' name='password' placeholder='Contraseña' maxlength='20'>
      <label for='keepSession'><input type='checkbox' id='keepSession' name='keepSession'> Mantener la sesión iniciada</label>
      <input type='submit' id='submit' name='submit' value='Iniciar sesión'>

    </form></div>

    <div class='recover-account-links'>
      <p><a href='#'>He olvidado mi clave de profesor</a></p>
      <p><a href='#'>He olvidado mi contraseña</a></p>
    </div>

  </div>

  <script src='assets/jquery.min.js'></script>
  <script src='assets/login.js'></script>

</body></html>
