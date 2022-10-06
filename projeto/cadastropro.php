<?php 
include('conexao.php');
$dados = $conn -> query('SELECT * FROM produtos');
$dados2 = $conn -> query('SELECT * FROM fornecedores');
?>

<form method='post' style='text-align: center'>
        Nome: <input type="text" name='nome' id='nome'><br>
        Valor: <input type="text" name='valor' id='valor'><br>
        Unidades: <input type="text" name='unidades' id="unidades"><br>
        ID do Fornecedor: <select name="fornecedor" id="fornecedor">
            <?php 
                foreach($dados2 as $row){
                    ?>
                    <option value=<?php echo $row['IDFornecedor']?>><?php echo $row['NomeCompanhia']?></option>
                    <?php
                }
            ?>
        </select>
        <input type="submit" name='entrega' value='entregar''><br>
</form>

<?php

$i = 0;

foreach($dados as $row){
    $i += 1;
}

if(isset($_POST['entrega'])){
    if(isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['valor']) && !empty($_POST['valor']) && isset($_POST['unidades']) && !empty($_POST['unidades'])){
        try{
            $cria = $conn->prepare('SET foreign_key_checks = 0; INSERT INTO produtos(NomeProduto, PrecoUnitario, UnidadesEmEstoque, IdFornecedor, IdProduto) VALUES (:nome, :valor, :unidades, :forn, :idp)');
            $cria->execute(array('nome' => $_POST['nome'], 
                'valor' => $_POST['valor'],
                'unidades' => $_POST['unidades'],
                'forn' => $_POST['fornecedor'],
                'idp' => $i + 2
            ));
            echo $i + 2;
        } catch(error){
            echo '<div>Erro!! O produto não foi atualizado!</div>';
        }
    }
    else{
        echo '<div>Erro preencha todos os campos</div>';
    }
}
?>

