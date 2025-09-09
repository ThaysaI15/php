<?php

echo'<br><br>----------------------------------------Atividade 1----------------------------------------<br><br>';
class produto {

    public $nome;
    public $preco;
    public $estoque;
    public function __construct($nome,float $preco,int $estoque) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->estoque = $estoque;
    }
    public function aplicarDesconto (float $desconto) {
        $this->preco = ($this->preco - $this->preco*$desconto);
    }
    public function vender ($quantidade) {
        if ($this->estoque > 0) {
            $this->estoque = ($this->estoque - $quantidade);
            echo "Sucesso!! $quantidade produtos comprados!";
        } else{
            echo"Erro, estoque insuficiente";
        }
        echo"<br>";
    }
    public function resumo() {
        echo "<br>[RESUMO]<br><br>[Nome]: $this->nome<br> [Valor Final]: R$$this->preco<br> [Estoque]: $this->estoque itens";
    }
}

$esmalte = new produto('Maça do Amor',7.50, 7);
$esmalte->aplicarDesconto(0.5);
$esmalte->vender(3);
$esmalte->resumo();

echo'<br><br>----------------------------------------Atividade 2----------------------------------------<br><br>';