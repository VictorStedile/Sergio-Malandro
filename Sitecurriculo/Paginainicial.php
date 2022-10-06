<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina inicial</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div id="site">
        <div class="topo">
           <strong>Site do Victor</strong>
        </div>
        <div class="left">
            <?php include "menu.php" ?>
        </div>
        <div class="right">
            <?php 
                if(isset($_GET['pagina'])){
                    if(file_exists($_GET['pagina'] . '.php')){
                        include $_GET['pagina'] . '.php';
                    }
                    else{
                        include "404.php";
                    }
                }
                else{
                    include "informacoes.php";
                }
            ?>
        </div>
        <div class="bottom">
            <strong>Rodape daora</strong>
        </div>
    </div>
</body>
</html>