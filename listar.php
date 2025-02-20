<?php include($_SERVER['DOCUMENT_ROOT']."/CRUD/cabecalho.php"); ?>

<?php 

if(ISSET($_POST["produto_salvar"]))
{
    $adicionar = $conexao->prepare("insert into produtos (nome, quantidade, custo, venda) values (:nome, :quantidade, :custo, venda)");
    $adicionar->bindParam(':nome', $_POST["produto_nome"] , PDO::PARAM_STR);
    $adicionar->bindParam(':quantidade', $_POST["produto_quantidade"] , PDO::PARAM_STR);
    $adicionar->bindParam(':custo', $_POST["produto_custo"] , PDO::PARAM_STR);
    $adicionar->bindParam(':venda', $_POST["produto_venda"] , PDO::PARAM_STR);
    $executa = $adicionar->execute();

    if($executa)
    {
    ?>
        <div class="alert alert-success" role="alert">
            <?php echo $_POST["produto_nome"];?> cadastrado com sucesso!
        </div>
    <?php
    }
    else
    {
    ?>
        <div class="alert alert-danger" role="alert">
            Erro ao cadastrar: <?php echo $_POST["produto_nome"]; ?>
        </div>
    <?php
    }

}
?>

<?php 

if(ISSET($_POST["produto_atualizar"]))
{
    $atualizar = $conexao->prepare("update produtos set nome = :nome , quantidade = :quantidade , custo = :custo , venda = :venda where id = :id");
    $atualizar->bindParam(':id', $_POST["produto_id"] , PDO::PARAM_STR);
    $atualizar->bindParam(':nome', $_POST["produto_nome"] , PDO::PARAM_STR);
    $atualizar->bindParam(':quantidade', $_POST["produto_quantidade"] , PDO::PARAM_STR);
    $atualizar->bindParam(':custo', $_POST["produto_custo"] , PDO::PARAM_STR);
    $atualizar->bindParam(':venda', $_POST["produto_venda"] , PDO::PARAM_STR);
    $executa = $atualizar->execute();

    if($executa)
    {
    ?>
        <div class="alert alert-success" role="alert">
            <?php echo $_POST["produto_nome"];?> atualizado com sucesso!
        </div>
    <?php
    }
    else
    {
    ?>
        <div class="alert alert-danger" role="alert">
            Erro ao atualizar: <?php echo $_POST["produto_nome"]; ?>
        </div>
    <?php
    }

}
?>

<?php 

if(ISSET($_POST["produto_excluir"]))
{
    $excluir = $conexao->prepare("delete from produtos where id = :id");
    $excluir->bindParam(':id', $_POST["produto_id"] , PDO::PARAM_STR);
    $executa = $excluir->execute();

    if($executa)
    {
    ?>
        <div class="alert alert-success" role="alert">
            <?php echo $_POST["produto_nome"];?> excluido com sucesso!
        </div>
    <?php
    }
    else
    {
    ?>
        <div class="alert alert-danger" role="alert">
            Erro ao cadastrar: <?php echo $_POST["produto_nome"]; ?>
        </div>
    <?php
    }

}
?>

<div class="container mt-2">
        <div class="row">
            <div class="col-md-4">
                <h1 class="display-6">Produtos</h1>
            </div>
            <div class="col-md-1 ms-auto">
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-plus"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form action="#" method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar novo produto</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="produto_nome" name="produto_nome" placeholder="Motor de partida Gol 1.0 2004">
                                        <label for="produto_nome">Nome do produto</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="produto_quantidade" name="produto_quantidade" placeholder="1">
                                        <label for="produto_quantidade">Quantidade do produto</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="produto_custo" name="produto_custo" placeholder="1500">
                                        <label for="produto_custo">Custo do produto</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="produto_venda" name="produto_venda" placeholder="2000">
                                        <label for="produto_venda">Valor da venda</label>
                                    </div>
                                
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="produto_salvar" class="btn btn-primary"><i class="fas fa-save"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive mt-2">  
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">QUANTIDADE</th>
                    <th scope="col">Custo</th>
                    <th scope="col">Venda</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $selecionar = $conexao->prepare("SELECT * FROM produtos");
                    $executa = $selecionar->execute();
                    while ($resultado = $selecionar->fetch(PDO::FETCH_ASSOC)) 
                    {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $resultado["id"]; ?></th>
                            <td>
                                <a class="btn btn-link" data-bs-toggle="modal" data-bs-target="#modal_atualizar_produto_<?php echo $resultado["id"]; ?>">
                                    <?php echo $resultado["nome"]; ?>
                                </a>
                            </td>
                            <td><?php echo $resultado["quantidade"]; ?></td>
                            <td><?php echo $resultado["custo"];?></td>
                            <td><?php echo $resultado["venda"];?></td>
                            <td>
                                <center>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Modal_Delete_<?php echo $resultado["id"]; ?>">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </center>
                            </td>
                        </tr>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="modal_atualizar_produto_<?php echo $resultado["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="#" method="POST">
                                        <input type="hidden" name="produto_id" value="<?php echo $resultado["id"]; ?>">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Atualizar produto</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="produto_nome" name="produto_nome" value="<?php echo $resultado["nome"]; ?>">
                                                <label for="produto_nome">Nome do produto</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="produto_quantidade" name="produto_quantidade" value="<?php echo $resultado["quantidade"]; ?>">
                                                <label for="produto_quantidade">Quantidade do produto</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="produto_custo" name="produto_custo" value="<?php echo $resultado["custo"];?>">
                                                <label for="produto_custo">Custo do produto</label>
                                            </div>
                                             <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="produto_venda" name="produto_venda" value="<?php echo $resultado["venda"];?>">
                                                <label for="produto_venda">Valor da venda</label>
                                            </div>
                                        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="produto_atualizar" class="btn btn-primary"><i class="fas fa-save"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="Modal_Delete_<?php echo $resultado["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <form action="#" method="POST">
                                            <input type="hidden" name="produto_id" value="<?php echo $resultado["id"]; ?>">
                                            <input type="hidden" name="produto_nome" value="<?php echo $resultado["nome"]; ?>">
                                            <center>
                                                Confirma?<br>
                                                <h3><?php echo $resultado["nome"]; ?></h3>
                                                <button type="submit" name="produto_excluir" class="btn btn-danger">Excluir</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>        
                                            </center>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php 
                    } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include($_SERVER['DOCUMENT_ROOT']."/avaliacao/rodape.php"); ?>