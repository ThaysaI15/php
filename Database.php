<?php
require_once "config.php";
class Database{
    private $coon;
    public function __construct(){
        try{
            $this->conn = new PDO("mysql:host".DB_HOST, DB_USER, DB_PASS);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


            $this->conn->exec("CREATE DATABASE IF NOT EXISTS ".DB_NAME);

            $this->conn = new PDO("mysql:host=" .DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS);

        } catch (PDOException $e){
            die("ERRO de conexão: ". $e->getMessage());
        }
    }
    

public function criarTabela($comando){
    try {
        $sql = "CREATE TABLE IF NOT EXISTS $comando";
        $this->conn->exec($sql);
        echo "Tabela criada/verificada com sucesso.<br>";
    } catch (PDOException $e) {
        echo "Erro ao criar tabela" . $e->getMessage();
    }
}
public function inserir($tabela, $dados) {
    $colunas = implode(", ", array_keys($dados));
    $placeholders = ":" . implode (", :", array_keys($dados));

    $sql = "INSERT INTO $tabela (colunas) VALUES ($placeholders)";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute($dados);
}
}
$db = new Database();
$db->criarTabela("usuários(id int 
AUTO_INCREMENT PRIMARY KEY, 
nome VARCHAR(100) NOT NULL,
email VARCHAR(100) UNIQUE NOT NULL
)");

$db = new Database();
$db->inserir ("usarios", [nome=>"Anelize",
"email"=>"aa@gmail.com"]);
$db -> inserir("usuarios", [nome=>"Thaysa",
"email"=>"tt@gmail.com"]);

?>