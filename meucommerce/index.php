<?php
include_once('conexao.php');
if(!isset($_SESSION)){
    session_start();
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
<sccript src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

<div>
    <div style="height: 100px; background-color: lightblue; text-align: center">
        <div>
            aa
        </div>
        <div style='margin-left: 1200px'>
        <?php if(!isset($_SESSION['id'])){?>
        <a href="login.php"><button class='btn btn-dark'>Login</button></a> // <a href="register.php"><button class='btn btn-dark'>Registrar</button></a>
        <?php } else{
            echo 'Olá: ' . $_SESSION['nome'];
        ?>
        <form method="post"><button name='sair' class='btn btn-danger'>Logout</button></form>
        <?php 
            if(isset($_POST['sair'])){
                $_SESSION['id'] = null;
                header("Refresh:0");
            }
        }
        ?>
        </div>
    </div>
    <div style="height: 1350px; widhth: 100%">
        <div style="margin-left: 5px; height: 1350px; width: 220px; background-color: lightyellow">
            <?php include_once('menu.php')?>
        </div>
        <div style='position: absolute; top: 100px; left: 225px; width: 85.8%; height: 1350px'>
            
        </div>
    </div>
    <div style="height: 100px; background-color: lightblue">
            
    </div>
</div>