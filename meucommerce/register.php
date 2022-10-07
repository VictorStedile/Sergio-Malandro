<?php 
include_once('conexao.php');
$dados = $conn->query('SELECT * FROM usuarios');
session_start();
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
<sccript src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

<div style='position: relative; right: 3px; width: 1593; height: 773px; background-color: lightblue'>
        <div style='background-color: yellow; position: absolute; left: 700px; top: 280px'>
            <form method="post">
                User: <input type="text" name="user" id="User" value=<?php echo $_SESSION['user']?>><br>
                Senha: <input type="text" name="senha" id="Senha"><br>
                Confimar senha: <input type="text" name="conf" id="Conf"><br>
                <pre>
<button name='entrega' class='btn btn-success'>Registrar</button>    //    <a href="login.php">Já é cadastrado?</button></a>
            </pre>
<?php

$i = 1;

foreach($dados as $row){
    $i += 1;
}

if(isset($_POST['entrega'])){
    $_SESSION['user'] = $_POST['user'];
    if(($_POST['user'] != '' && $_POST['senha'] != '' && $_POST['conf'] != '') && ($_POST['senha'] === $_POST['conf'])){
        try{
        $cadastro = $conn->prepare('SET foreign_key_checks = 0; INSERT INTO usuarios(login, senha, id) VALUES (:log. :sen, :id)');
        $cadastro->execute(array('log' => $_POST['user'],
                                'sen' => $_POST['senha'],
                                'id' => $i
    ));
    $_SESSION['id'] = $i;
    $_SESSION['nome'] = $_POST['user'];
    $_SESSION['user'] = '';

    header('location: /Victor/SERGIO-MALANDRO-1/meucommerce/index.php');
    } catch(error){
        echo 'Verifique as informações';
    }
    
}
}

?>
            </form>
        </div>
</div>

