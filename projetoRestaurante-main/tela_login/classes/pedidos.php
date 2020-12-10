<?php

require_once 'conexao.php';

class Pedido extends Conect
{
    
    
    public function getPedidos(...$data)
    {            
                try{
                    $sql = $this->pdo->prepare("SELECT * FROM `pedidos`");
                    $sql->execute();
                    return $sql->fetchAll();
                }
                catch(PDOException $erro){
                    $this->msgErro = $erro->getMessage();
                }
    }   
    public function cadastrar($pedidos, $mesa){
           try{
            $sql = $this->pdo->prepare("INSERT INTO `pedidos` (itens, mesa) VALUES (:produtos, :mesa)");
            $sql->execute(array(
                ':produtos' => $pedidos, ':mesa' => $mesa));
           }
           catch (PDOException $erro){
            $this->msgErro = $erro->getMessage();
        }  
    }
}
