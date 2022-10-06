<?php
  session_start();

  $_SESSION['nome'] = $_GET['nome'];
  $_SESSION['valores'] = array(12,45.45,56,123);

?>
<a href="session_resultado.php">Ver resultado</a>