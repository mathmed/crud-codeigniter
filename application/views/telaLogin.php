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
    
    <title>Sistema - Login</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">        
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>    
    <div class="container">
      <?= $this->session->flashdata('auth');?>

      <div class="row">

            <div class = "col-md-2"></div>

            <div class = "col-md-8">

                <h1 class = 'green bold text-center'>Tela de Login - Sistema de produtos</h1>

                <form action = "login/auth" method = "POST">
                    <input required name = "usuario" placeholder = "Usuário" class = "form-control space-bottom">
                    <input required name = "senha" type = "password" placeholder = "Senha" class = "form-control space-bottom">

                    <div class = 'div-center'>
                      <button class = "btn btn-success" type = "submit">Login</button>
                    </div>
                </form>

            </div>

            <div class = "col-md-2"></div>

      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>    
  </body>
</html>
