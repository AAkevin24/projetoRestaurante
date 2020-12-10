<?php
     session_start();
     require_once '../tela_login/classes/pedidos.php';
     $pedido = new Pedido;
     $pedido->conectar();
     $results = $pedido->getPedidos();
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
    <title></title>
</head>
<body>
<table style="width: 50%; margin-left: auto; margin-right: auto;" border="3">
      <tr>
        <th>Nome do pedido</th>
        <th>Mesa</th>
        
      </tr>
      <?php
        foreach($results as $result)
        {
          ?>
        
      
      <tr>
       
        <td><?=$result["itens"]?></td>
        <td><?=$result["mesa"]?></td>
        
      </tr>
      <?php
        }
      ?>
    </table>
</body>
</html>