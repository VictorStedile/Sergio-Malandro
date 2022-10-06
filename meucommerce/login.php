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
                Senha:<input type="text" name="senha" id="Senha"><br><br>
                <pre>
<button name='entrega' class='btn btn-success'>Login</button>    //    <a href="register.php">Register</button></a>
            </pre>

            </form>
        </div>
</div>

<?php

if(isset($_Post['entrega'])){
    foreach($dados as $row){
        if($row['login'] === $_Post['user'] && $row['senha'] === $_Post['senha']){
            echo 'deu certo';
            break;
        }
        else{
            echo 'deu erro';
        }
        break;
    }
}

?>