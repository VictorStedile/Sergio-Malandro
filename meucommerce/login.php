<?php 
include_once('conexao.php');
$dados = $conn->query('SELECT * FROM usuarios');
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
<sccript src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

<div style='position: relative; right: 3px; width: 1593; height: 773px; background-color: lightblue'>
        <div style='background-color: yellow; position: absolute; left: 700px; top: 280px'>
            <form method="post">
                User:<input type="text" name="user" id="User"><br>
                Senha:<input type="password" name="senha" id="Senha"><br><br>
                <pre>
<button name='entrega' class='btn btn-success'>Login</button>    //    <a href="register.php">Register</button></a>
            </pre>
<?php

if(isset($_POST['entrega'])){
    $erro = false;
    foreach($dados as $row){
        if($row['login'] === $_POST['user'] && $row['senha'] === $_POST['senha']){
            session_start();

            $_SESSION['id'] = $row['id'];
            $_SESSION['nome'] = $row['login'];

            header('location: /Victor/SERGIO-MALANDRO-1/meucommerce/index.php');
        }
        else{
            if(!$erro){
                echo 'deu erro';
                $erro = true;
            }
        }
    }
}

?>
            </form>
        </div>
</div>

