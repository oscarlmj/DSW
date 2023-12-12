<?php

session_start();
session_unset();
session_destroy();

?>

<html>

<body>
  Salimos de sesión
  <a href="login_form.php"><button>Volver al inicio de sesion</button></a>
</body>

</html>