<?php
session_start();

include("comprueba_login.php");

echo "<br>Usuario logueado: " . $_SESSION["usuario"];

?>

<html>

<body>
  <h2>Página de inicio</h2>
  <!--Enlace para ir al carga_cesta.php-->
  <a href='carga_cesta.php'><button>Ver cesta</button></a>;
</body>

</html>