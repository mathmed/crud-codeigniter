<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta name="description" content="Lista de produtos da tabela produtos">
    <meta name="author" content="blog.ismweb.com.br">
    
    <title>Adicionar novo produto</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url("bootstrap/css/bootstrap.min.css") ?>" rel="stylesheet">
    <link href="<?= base_url("css/styles.css") ?>" rel="stylesheet">        
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>    

    <div class="container">

      <div class="panel panel-default space-top">
        <div class="panel-heading"><a href = "../produtos" class = "a-style">Início</a> > Novo Produto</div>
      </div>

      <div class="row">
        <h1 class = "title green">Adicionar produto</h1>
        
        <form action = "salvar" name = "form-salvar" method = "post">
          <div class = "form-group">

            <input class = "form-control space-bottom" name = "nome" placeholder = "Nome do produto">
            <input class = "form-control space-bottom" name = "preco" placeholder = "Preço">
            <label>Ativo:</label>
            <select class = "form-control space-bottom" name = "ativo">
              <option value = "1">Sim</option>
              <option value = "0">Não</option>
            </select>

            <div class = "div-center">
              <button type = "submit" class = "btn btn-success">Cadastrar</button>
            </div>

          </div>
        </form>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?= base_url("bootstrap/js/bootstrap.min.js") ?>"></script>    
  </body>
</html>
