<?php

header('Content-Type: text/html; charset=utf-8');

# Conecta ao banco de dados
$host = "localhost";
$database = "oficina";
$user = "root";
$senha = "root";

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