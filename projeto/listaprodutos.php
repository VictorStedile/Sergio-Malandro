<?php 
    $dados = $conn->query('SELECT produtos.IDProduto, produtos.NomeProduto, produtos.PrecoUnitario, produtos.UnidadesEmEstoque, fornecedores.NomeCompanhia FROM produtos INNER JOIN fornecedores ON produtos.IDFornecedor = fornecedores.IDFornecedor');
?>

<div style='position: absolute;left: 400px'>
<table class="table table-striped table-bordered" style="display: block; height: 589px; overflow: auto;">
        <tr>
            <td>Nome</td>
            <td>Preco</td>
            <td>Unidades em estoque</td>
            <td>Nome Fornecedor</td>
            <td></td>
        </tr>
    <tbody>
    <?php
        foreach($dados as $linha) {
            ?>
                <tr>
                    <td><?php echo $linha['NomeProduto']; ?></td>
                    <td><?php echo $linha['PrecoUnitario']; ?></td>
                    <td><?php echo $linha['UnidadesEmEstoque']; ?></td>
                    <td><?php echo $linha['NomeCompanhia']?></td>
                    <td><?php echo "<a href='delete.php/?id=" . $linha['IDProduto'] . "'>Deletar</a>"?></td>
                    <td><?php echo "<a href='?pagina=alterar&id=" . $linha['IDProduto'] . "'>Alterar</a>"?></td>
                </tr>
            <?php
        }
    ?>
    </tbody>
</table>
<div>