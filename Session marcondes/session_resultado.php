<?php
  session_start();

  echo $_SESSION['nome'];

?>
<a href="session.php?nome=<?php echo $_SESSION['nome']; ?>">session</a>