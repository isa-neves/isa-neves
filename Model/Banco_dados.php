<?php

class BancoDados{
    public $PDO;
    private $conexao;

    public function __construct() {
        try {
            $this->PDO = new PDO("mysql:host=localhost;dbname=management_persona", "root", "");
            $this->PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }
    

    private function conectar(){
        $this->conexao = new mysqli("localhost:3306", "root", "", "management_persona");
    }

    public function consultar($sql){
        $tabela = [];
        $this->conectar();
        $resultado = $this->conexao->query($sql);
        while ($linha = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
            $tabela[] = $linha;
        }
    
        mysqli_close($this->conexao);
        return $tabela; 
    }   
    public function executar($sql){
        $this->conectar();
        $resultado = $this->conexao->query($sql);
        mysqli_close($this->conexao);
    }
}


?>