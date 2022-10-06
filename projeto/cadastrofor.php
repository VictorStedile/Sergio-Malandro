<?php 
include_once('conexao.php');
$dados = $conn -> query('SELECT * FROM fornecedores');
?>

<form method='post' style='text-align: center'>
    Nome: <input type="text" name='nome' id='nome'><br>
    Nome do contato: <input type="text" name='contato' id='contato'><br>
    Cidade: <input type="text" name='cidade' id="cidade"><br>
    Telefone: <input type="number" name='telefone' id="telefone"><br>
    <input type="submit" name='entrega' value='entregar''><br>
    <div id='mensage'></div>
</form>

<?php

$i = 0;

foreach($dados as $row){
    $i += 1;
}

if(isset($_POST['entrega'])){
    if(isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['contato']) && !empty($_POST['contato']) && isset($_POST['cidade']) && !empty($_POST['cidade']) && isset($_POST['telefone']) && !empty($_POST['telefone'])){
        try{
            $cria = $conn->prepare('SET foreign_key_checks = 0; INSERT INTO fornecedores(NomeCompanhia, NomeContato, Cidade, Telefone, IdFornecedor) VALUES (:nome, :contato, :cidade, :telefone, :idf)');
            $cria->execute(array('nome' => $_POST['nome'], 
                'contato' => $_POST['contato'],
                'cidade' => $_POST['cidade'],
                'telefone' => $_POST['telefone'],
                'idf' => $i + 2
            ));
            echo $i;
        } catch(error){
            echo '<div>Erro!! O produto não foi atualizado!</div>';
        }
    }
    else{
        echo '<div>Erro preencha todos os campos</div>';
    }
}
?>
