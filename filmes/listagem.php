<?php
    if (isset($_POST['deletar'])) {
        $stmt = $conn->prepare("DELETE from filmes where codigo = :id");
        if ($stmt->execute(array('id' => $_POST['id']))) {
            echo '<div class="alert alert-success">Sucesso! O filme doi removido.</div>';
        }
    }
    $dados = $conn->query('SELECT * FROM filmes');
?>

<table class="table table-striped table-bordered">
    <tr>
        <td>Código</td>
        <td>Nome</td>
        <td>Ano</td>
        <td>Resumo</td>
        <td>Inf. Adicionais</td>
        <td>Capa</td>
        <td>Ações</td>
    </tr>
    <?php
        foreach($dados as $linha) {
            ?>
                <tr>
                    <td><?php echo $linha['codigo']; ?></td>
                    <td><?php echo $linha['nome']; ?></td>
                    <td><?php echo $linha['ano']; ?></td>
                    <td><?php echo $linha['resumo']; ?></td>
                    <td><?php echo $linha['complementos']; ?></td>
                    <td><img src="<?php echo $linha['imagem']; ?>" class="img-thumbnail"/></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo $linha['codigo']; ?>">
                            <input type="submit" class="btn btn-danger" name="deletar" value="Deletar">
                        </form>
                        <a href="?pagina=atualizar&id=<?php echo $linha['codigo']; ?>" class="btn btn-primary">Atualizar</a>
                    </td>
                </tr>
            <?php
        }
    ?>
</table>