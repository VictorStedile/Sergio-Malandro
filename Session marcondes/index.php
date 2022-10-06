<?php
    session_start();

    if (isset($_GET['logout'])) {
        session_destroy();
        header("Location: /marcondes");
        //$_SESSION['logado'] = false;
    }
    if (isset($_POST['entrar'])) {
        if ($_POST['login']=='marcondes@unidavi.edu.br'
        && $_POST['senha']=='123456') {
            $_SESSION['logado']= true;
        } else {
            echo 'Usuário e senha não conferem!';
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site do Marcondes</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/site.css">
    <link rel="stylesheet" href="css/estilo2.css">
</head>
<body>
    <div id="site">
        <div class="topo">
            topo
        </div>
        <div class="menu">
            <?php include "menu.php"; ?>
        </div>
        <div class="conteudo">
            <?php
                if (isset($_GET['pagina'])) {
                    if (file_exists($_GET['pagina'].".php")) {
                        if (isset($_SESSION['logado'])) {
                            include $_GET['pagina'].".php";
                        } else {
                            include "login.php";
                        }
                    } else {
                        include "404.php";
                    }
                } else {
                    include "corpo.php";
                }
            ?>
        </div>
        <div class="rodape">
            rodapé
        </div>
    </div>
</body>
</html>