<?php
    if (isset($_POST['atualizar'])) {
        $erro = false;

        (isset($_POST['nomefilme']) && empty($_POST['nomefilme']))?$erro=true:'';
        (isset($_POST['resumofilme']) && empty($_POST['resumofilme']))?$erro=true:'';
        (isset($_POST['anofilme']) && empty($_POST['anofilme']))?$erro=true:'';
        (isset($_POST['imagemfilme']) && empty($_POST['imagemfilme']))?$erro=true:'';
        (isset($_POST['complementofilme']) && empty($_POST['complementofilme']))?$erro=true:'';

        if (!$erro) {
            try {
                //$stmt = $conn->prepare('INSERT into filmes(nome,resumo,ano,imagem,complementos) values (:nome,:resumo,:ano,:imagem,:complementos)');
                $stmt = $conn->prepare('UPDATE filmes set nome = :nome, resumo = :resumo, ano = :ano, imagem = :imagem, complementos = :complementos where codigo = :id');
                $stmt->execute(array('nome' => $_POST['nomefilme'],
                                'resumo' => $_POST['resumofilme'],
                                'ano' => $_POST['anofilme'],
                                'imagem' => $_POST['imagemfilme'],
                                'complementos' => $_POST['complementofilme'],
                                'id' => $_GET['id']
                            ));
                echo '<div class="alert alert-success">Sucesso! Filme atualizado!</div>';
            } catch(error) {
                echo '<div class="alert alert-danger">Erro!! O atualização do filme não realizada!</div>';
            }
        } else {
            echo '<div class="alert alert-warning">Infore todos os campos obrigatórios</div>';
        }
    }
?>

<form method="post" action="">
    <div class="mb-3">
        <label for="nomefilme" class="form-label">Nome do Filme</label>
        <input type="text" class="form-control" id="nomefilme" name="nomefilme" value="<?php echo $linha['nome']; ?>" required>
    </div>

    <div class="mb-3">
        <label for="resumofilme" class="form-label">Resumo do filme</label>
        <textarea class="form-control" id="resumofilme" name="resumofilme" rows="3" required><?php echo $linha['resumo']; ?></textarea>
    </div>

    <div class="mb-3">
        <label for="anofilme" class="form-label">Ano</label>
        <input type="text" class="form-control" id="anofilme" name="anofilme" value="<?php echo $linha['ano']; ?>" required>
    </div>

    <div class="mb-3">
        <label for="imagemfilme" class="form-label">Imagem do filme</label>
        <input type="text" class="form-control" id="imagemfilme" name="imagemfilme" value="<?php echo $linha['imagem']; ?>" required>
    </div>

    <div class="mb-3">
        <label for="complementofilme" class="form-label">Informações complementares</label>
        <textarea class="form-control" id="complementofilme" name="complementofilme" rows="3" required><?php echo $linha['complementos']; ?>"</textarea>
    </div>

    <div class="mb-3">
        <input type="submit" name="atualizar" value="Atualizar o filme" class="btn btn-primary" />
    </div>
</form>