<?php 
include_once('conexao.php');
$dados = $conn->query('SELECT * FROM usuarios');
session_start();
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
<sccript src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

<div style='position: relative; right: 3px; width: 100%; height: 100%; background-color: lightblue'>
<center><a href="index.php">Home</a></center>

        <div style='position: absolute; background-color: yellow; height: 60px; width: 160px; left: 870px; top: 280px'>
                <h1>Register</h1>
        </div>

        <div style='background-color: yellow; position: absolute; left: 800px; top: 400px'>
            <form method="post">
                User: <input type="text" name="user" id="User"><br>
                Senha: <input type="password" name="senha" id="Senha"><br>
                Confimar senha: <input type="password" name="conf" id="Conf"><br>
                <pre>
<button name='entrega' class='btn btn-success'>Registrar</button>    //    <a href="login.php">Já é cadastrado?</button></a>
            </pre>
<?php

$i = 1;

foreach($dados as $row){
    $i += 1;
}

if(isset($_POST['entrega'])){
    if(($_POST['user'] != '' && $_POST['senha'] != '' && $_POST['conf'] != '') && ($_POST['senha'] === $_POST['conf'])){
        try{
        $cadastro = $conn->prepare('SET foreign_key_checks = 0; INSERT INTO usuarios(login, senha) VALUES (:log, :sen)');
        $cadastro->execute(array('log' => $_POST['user'],
                                'sen' => $_POST['senha'],
    ));
    $_SESSION['id'] = $i;
    $_SESSION['nome'] = $_POST['user'];

    header('location: /Victor/SERGIO-MALANDRO/meucommerce/index.php');
    } catch(error){
        echo error;
    }
    
}
    else{
        echo 'Verifique as informações';
    }
}

?>
            </form>
        </div>
</div>

