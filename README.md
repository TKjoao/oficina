# Oficina APP

Este projeto é um sistema de gerenciamento simples para uma oficina, que permite o cadastro, edição, exclusão e listagem de clientes, produtos e pedidos.

## Estrutura do Projeto

```
CRUD/
│
├── clientes/
│   └── listar.php
│
├── conexao/
│   └── conexao.php
│
├── pedidos/
│   └── listar.php
│
├── produtos/
│   └── listar.php
│
├── banco_dados/
│   ├── clientes_produtos.sql
│   └── pedidos.sql
│
├── CRUD.php
├── cabecalho.php
├── index.php
├── rodape.php
```

## Descrição dos Arquivos e Pastas

- **clientes/**: Contém arquivos relacionados ao gerenciamento dos clientes.
- **conexao/**: Contém o arquivo de conexão com o banco de dados.
- **pedidos/**: Contém arquivos relacionados ao gerenciamento dos pedidos.
- **produtos/**: Contém arquivos relacionados ao gerenciamento dos produtos.
- **banco_dados/**: Scripts SQL para criação das tabelas de clientes, produtos e pedidos.
- **CRUD.php**: Arquivo responsável pelas operações de Create, Read, Update e Delete.
- **cabecalho.php**: Inclui a barra de navegação e a configuração inicial do HTML e Bootstrap.
- **index.php**: Página inicial do sistema.
- **rodape.php**: Rodapé do site.

## Exemplo do cabeçalho.php

```php
<?php include($_SERVER['DOCUMENT_ROOT']."/CRUD/conexao/conexao.php"); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Oficina APP</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Oficina APP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="http://localhost/CRUD/index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/CRUD/clientes/listar.php">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/CRUD/produtos/listar.php">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/CRUD/pedidos/listar.php">Pedidos</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Relatórios
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Clientes</a></li>
                        <li><a class="dropdown-item" href="#">Produtos</a></li>
                        <li><a class="dropdown-item" href="#">Pedidos</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Pesquisar</button>
            </form>
            </div>
        </div>
    </nav>
```

## Configuração do Banco de Dados
Crie as tabelas necessárias usando os scripts SQL presentes na pasta `banco_dados/`.

## Instalação e Execução
1. Clone o repositório:
   ```bash
   git clone https://github.com/TKjoao/oficina.git
   ```
2. Configure o banco de dados em `conexao/conexao.php`.
3. Execute o projeto em um servidor local como XAMPP ou WAMP.
4. Acesse no navegador:
   ```
   http://localhost/CRUD/index.php
   ```

## Tecnologias Utilizadas
- PHP
- MySQL
- Bootstrap 5
- Font Awesome

## Autor
- Nome: João Víctor Valentim Takamori
  

## Licença
Este projeto está sob a licença MIT.

