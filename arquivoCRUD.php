<?php

@header('Content-Type: text/html; charset=utf-8');

# Conecta ao banco de dados
$host = "localhost";
$database = "";
$user = "";
$senha = "";

try{
  // Faz conexão com banco de daddos
  $conexao = new PDO("mysql:host=$host;dbname=$database;",$user, $senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

//  $conexao = new PDO("mysql:host=$host;dbname=$database;",$user, $senha);

}catch(PDOException $e){
  // Caso ocorra algum erro na conexão com o banco, exibe a mensagem
  echo 'Falha ao conectar no banco de dados: '.$e->getMessage();
  die;
}

?>

<?php

$selecionar = $conexao->prepare("SELECT * FROM tabela where id = :id");
$selecionar->bindParam(':id', $id , PDO::PARAM_STR);
$executa = $selecionar->execute();

?>

<?php

$adicionar = $conexao->prepare("insert into tabela (coluna_1, coluna_2) values (:valor_1, :valor_2)");
$adicionar->bindParam(':valor_1', $valor_1 , PDO::PARAM_STR);
$adicionar->bindParam(':valor_2', $valor_2 , PDO::PARAM_STR);
$executa = $adicionar->execute();

$recupera_id->conexao->lastInsertId()

?>

<?php

	$atualizar = $conexao->prepare("UPDATE tabela set coluna_1 = :valor_1 where id = :id");
	$atualizar->bindParam(':valor_1', $valor_1 , PDO::PARAM_STR);
	$atualizar->bindParam(':id', $id , PDO::PARAM_STR);
	$executa = $atualizar->execute();
	
?>

<?php

	$deletar = $conexao->prepare("delete FROM tabela where id = :id");
	$deletar->bindParam(':id', $id , PDO::PARAM_STR);
	$executa = $deletar->execute();
	
?>
