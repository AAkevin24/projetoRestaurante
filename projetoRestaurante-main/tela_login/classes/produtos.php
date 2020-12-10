<?php

require_once 'conexao.php';

class Produto extends Conect
{
    public $erros = [];

    private function verify($data)
    {
        $num = 0;

        if(strlen($data[0]) > 30)
        {
            $num++;
            array_push($this->erros, ["erro de nome"]);
        }

        if(!is_numeric($data[1]))
        {
            $num++;
            array_push($this->erros, ["preço deve ser um número"]);
        }

        if(strlen($data[2]) > 155)
        {
            $num++;
            array_push($this->erros, ["erro de descricao"]);
        }

        return ($num == 0) ? true : false;
    }

    public function cadastre(...$data)
    {
        if(count($data) == 3)
        {
            if($this->verify($data))
            {
                try{
                    $sql = $this->pdo->prepare("INSERT INTO `produtos` (`id`, `nome`, `preco`, `descricao`) VALUES (NULL, :name, :preco, :descricao)");
                    $sql->bindValue(":name", $data[0]);
                    $sql->bindValue(":preco", $data[1]);
                    $sql->bindValue(":descricao", $data[2]);
                    $sql->execute();
                    return true;
                }
                catch(PDOException $erro){
                    $this->msgErro = $erro->getMessage();
                }

            }
        }

        return false;
    }
    public function getProdutos(...$data)
    {            
                try{
                    $sql = $this->pdo->prepare("SELECT * FROM `produtos`");
                    $sql->execute();
                    return $sql->fetchAll();
                }
                catch(PDOException $erro){
                    $this->msgErro = $erro->getMessage();
                }
    }   
}
