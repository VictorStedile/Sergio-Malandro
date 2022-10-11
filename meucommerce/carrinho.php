<?php
    if(isset($_SESSION['id'])){?>
        <center>
            <form method="post">
                <button name='limpa' class='btn btn-danger'>Limpa</button>
            </form>
            <?php
            if(isset($_SESSION['carrinho'])){
                print_r($_SESSION['carrinho']);
            }
            ?>
        </center>
    <?php
    }
    else{?>
        <center> 
            <h3>Erro você não está logado!!!</h3>
        </center>
<?php
    }
    if(isset($_GET['limpa'])){
        unset($_SESSION['carrinho']);
    }
?>