<?php
    if (isset($_POST['gravar'])) {
        $erro = false;

        (isset($_POST['nomefilme']) && empty($_POST['nomefilme']))?$erro=true:'';
        (isset($_POST['resumofilme']) && empty($_POST['resumofilme']))?$erro=true:'';
        (isset($_POST['anofilme']) && empty($_POST['anofilme']))?$erro=true:'';
        (isset($_POST['imagemfilme']) && empty($_POST['imagemfilme']))?$erro=true:'';
        (isset($_POST['complementofilme']) && empty($_POST['complementofilme']))?$erro=true:'';

        if (!$erro) {
            try {
                $stmt = $conn->prepare('INSERT into filmes(nome,resumo,ano,imagem,complementos) values (:nome,:resumo,:ano,:imagem,:complementos)');
                $stmt->execute(array('nome' => $_POST['nomefilme'],
                                'resumo' => $_POST['resumofilme'],
                                'ano' => $_POST['anofilme'],
                                'imagem' => $_POST['imagemfilme'],
                                'complementos' => $_POST['complementofilme']));
                echo '<div class="alert alert-success">Cadastro realizado com sucesso!</div>';
            } catch(error) {
                echo '<div class="alert alert-danger">Erro!! O cadastro não foi realizado!</div>';
            }
        } else {
            echo '<div class="alert alert-warning">Infore todos os campos obrigatórios</div>';
        }
    }
?>

<form method="post" action="">
    <div class="mb-3">
        <label for="nomefilme" class="form-label">Nome do Filme</label>
        <input type="text" class="form-control" id="nomefilme" name="nomefilme" placeholder="Nome do filme" required>
    </div>

    <div class="mb-3">
        <label for="resumofilme" class="form-label">Resumo do filme</label>
        <textarea class="form-control" id="resumofilme" name="resumofilme" rows="3" required></textarea>
    </div>

    <div class="mb-3">
        <label for="anofilme" class="form-label">Ano</label>
        <input type="text" class="form-control" id="anofilme" name="anofilme" placeholder="Ano do filme" required>
    </div>

    <div class="mb-3">
        <label for="imagemfilme" class="form-label">Imagem do filme</label>
        <input type="text" class="form-control" id="imagemfilme" name="imagemfilme" placeholder="Capa do filme" required>
    </div>

    <div class="mb-3">
        <label for="complementofilme" class="form-label">Informações complementares</label>
        <textarea class="form-control" id="complementofilme" name="complementofilme" rows="3" required></textarea>
    </div>

    <div class="mb-3">
        <input type="submit" name="gravar" value="Salvar o filme" class="btn btn-primary" />
    </div>


</form>