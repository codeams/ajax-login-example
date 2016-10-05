<?php

  session_start();

  if ( isset( $_SESSION['session'] ) ) $sessionData = $_SESSION['session'];
  else header('Location: login.php');

  $name = $sessionData['name'];

?>
<!doctype html>
<html><head>

    <meta charset='utf-8'>
    <title>Users panel</title>

</head><body>

  <div>Bienvenido <?php echo $name; ?></div>

  <a href='logout.php'>Salir</a>

</body></html>
