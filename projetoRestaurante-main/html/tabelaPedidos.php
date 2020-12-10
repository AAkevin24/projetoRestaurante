<?php

        session_start();
        require_once '../tela_login/classes/produtos.php';
        $produto = new Produto;
        $produto->conectar();
        $results = $produto->getProdutos();
        if (!isset($_SESSION['id_usuario']) && $_SESSION['cargo'] ==1) {
          header("location: index.php");
          exit;
      }
      
      ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Site em desenvolvimento</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
  <header>
    <nav class="desk">
      <div class="bar" id="bar">
        <p>
          <title>Menu Dropdown - Linha de Código</title>
          <link rel="stylesheet" type="text/css" href="../estilo.css" />
          </head>

          <body>
            <ul id="nav">
              <li><i class="fa fa-bars fa-2x" aria-hidden="true"></i>
                <ul>
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Sobre nós</a></li>
                  <li><a href="#">Contatos</a></li>
                </ul>
              </li>
            </ul>
          </body>
        </p>
      </div>
      <div class="logo">
        <img src="../img/logo.jpg" alt="Logo">
      </div>
      <div class="login">

      </div>
    </nav>
    <div id="mei" class="menu-vertical">
      <div class="menu">
        ALISON
      </div>
    </div>

  </header>

  <body>
    <br><br><br>
    <table style="width: 50%; margin-left: auto; margin-right: auto;" border="3">
      <tr>
        <td>N°</td>
        <td>Nome do pedido</td>
        <td>Preço</td>
        
      </tr>
      <form action="confPedido.php" method="POST">
      <?php
        foreach($results as $result)
        {
          ?>
        
      
      <tr>
        <td><?=$result["id"]?></td>
        <td><?=$result["nome"]?></td>
        <td><?=$result["preco"]?></td>
        <td><input id="checkbox" type="checkbox" value=<?=$result["nome"]?> name="produtos[]">Adicionar</td>
      </tr>
      <?php
        }
      ?>
    </table>
    <label style="margin-left: 45%;" for="mesa">Digite sua mesa:</label><input style="margin-left: 45%;" type="text" name="mesa">
    <br>
    <input style="margin-left: 45%;" type="submit" value="ENVIAR PEDIDO"></form>
  
  </body>
</html>