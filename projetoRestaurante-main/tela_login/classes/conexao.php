<?php

class Conect
{
    private $dados = [
        "host" => "localhost", 
        "db" => "login",    
        "user" => "root",
        "senha" => ""
    ];

    protected $pdo;

    public $msgErro = "";

    public function conectar()
    {
        try {
            $this->pdo = new PDO(
                "mysql:dbname=" . $this->dados["db"] . ";host=" . $this->dados["host"], 
                $this->dados["user"], 
                $this->dados["senha"]
            );
        } catch (PDOException $e) {
            $this->msgErro = $e->getMessage();
        }
    }
}
