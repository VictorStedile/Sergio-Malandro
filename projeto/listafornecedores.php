<?php 
    $dados = $conn->query('SELECT * FROM fornecedores');
?>

<div style='position: absolute;left: 400px'>
<table class="table table-striped table-bordered" style="display: block; height: 589px; overflow: auto;">
        <tr>
            <td>Nome</td>
            <td>Nome do contato</td>
            <td>Cidade</td>
            <td>Telefone</td>
            <td></td>
            <td></td>
        </tr>
    <tbody>
    <?php
        foreach($dados as $linha) {
            ?>
                <tr>
                    <td><?php echo $linha['NomeCompanhia']; ?></td>
                    <td><?php echo $linha['NomeContato']; ?></td>
                    <td><?php echo $linha['Cidade']; ?></td>
                    <td><?php echo $linha['Telefone']?></td>
                    <td><?php echo "<a href='delete.php/?idf=" . $linha['IDFornecedor'] . "'>Deletar</a>"?></td>
                    <td><?php echo "<a href='?pagina=alterar&idf=" . $linha['IDFornecedor'] . "'>Alterar</a>"?></td>
                </tr>
            <?php
        }
    ?>
    </tbody>
</table>
</div>