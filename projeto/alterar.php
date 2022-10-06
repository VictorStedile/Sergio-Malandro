<?php
include_once('conexao.php');
if(isset($_GET['id'])){
?>
    <form method='post' style='text-align: center'>
        Nome: <input type="text" name='nome' id='nome'><br>
        Valor: <input type="text" name='valor' id='valor'><br>
        Unidades: <input type="text" name='unidades' id="unidades"><br>
        ID do Fornecedor: <select name="fornecedor" id="fornecedor">
            <?php 
                $dados = $conn->query('SELECT * FROM fornecedores');
                foreach($dados as $row){
            ?>
                <option value='<?php echo $row['IDFornecedor']?>'><?php echo $row['NomeCompanhia'] ?></option>
            <?php
            }
            ?>
        </select><br>
        <input type="submit" name='entrega' value='entregar''><br>
        <div id='mensage'></div>
    </form>
<?php 
if(isset($_POST['entrega'])){
    if(isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['valor']) && !empty($_POST['valor']) && isset($_POST['unidades']) && !empty($_POST['unidades']) && isset($_POST['fornecedor'])){
        try {
        $troca = $conn->prepare('UPDATE produtos SET NomeProduto = :nome, PrecoUnitario = :valor, UnidadesEmEstoque = :unidades, IDFornecedor = :id WHERE IDProduto = :idp');
        $troca->execute(array('nome' => $_POST['nome'],
            'valor' => $_POST['valor'],
            'unidades' => $_POST['unidades'],
            'id' => $_POST['fornecedor'],
            'idp' => $_GET['id']
        ));
        echo '<div>Deu boa' . $_POST['fornecedor'] . '</div>';
        } catch(error){
            echo '<div>Erro!! O atualização do filme não realizada!</div>';
        }
    }
    else{
        echo '<div>Erro digite todos os campos</div>';
    }
}
}

else if(isset($_GET['idf'])){
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
    
    if(isset($_POST['entrega'])){
        if(isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['contato']) && !empty($_POST['contato']) && isset($_POST['cidade']) && !empty($_POST['cidade']) && isset($_POST['telefone']) && !empty($_POST['telefone'])){
            try {
            $troca = $conn->prepare('UPDATE fornecedores SET NomeCompanhia = :nome, NomeContato = :contato, Cidade = :cidade, Telefone = :telefone WHERE IDFornecedor = :idf');
            $troca->execute(array('nome' => $_POST['nome'],
                'contato' => $_POST['contato'],
                'cidade' => $_POST['cidade'],
                'telefone' => $_POST['telefone'],
                'idf' => $_GET['idf']
            ));
            echo '<div>Deu boa</div>';
            } catch(error){
                echo '<div>Erro!! O atualização do filme não realizada!</div>';
            }
        }
        else{
            echo '<div>Erro digite todos os campos</div>';
        }
    }
    }
?>