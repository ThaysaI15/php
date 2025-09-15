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
// .
// .
// .
echo'<br><br>----------------------------------------Atividade 4----------------------------------------<br><br>';
Class Biblioteca{
    public $nome;
    public array $livros;
    public function __construct(string $nome){
        $this->nome = $nome;
    }
    public function adicionarLivro(string $titulo){
        $this->livros[] = $titulo;
    }
    public function buscarLivro(string $termo){

    }
    public function listarLivros(){
        echo "Lista dos livros cadastrados:<br><br>";
        foreach ($this->livros as $livro){
            echo "- ".$livro. "<br>";
        }
    }
}
$livro = new Biblioteca("Sonhos Encantados");
$livro -> adicionarLivro("Dom Casmurro");
$livro -> adicionarLivro("Amor e Gelato");
$livro -> adicionarLivro("Noite na Taverna");
$livro -> listarLivros();
echo'<br><br>----------------------------------------Atividade 5----------------------------------------<br><br>';
Class Pedido{
    public $cliente;
    public array $itens;
    public function __construct($cliente){
        $this->cliente = $cliente;
    }
    public function adicionarItem(Produto $produto, int $quantidade){
    }
    public function total(){
        echo "Total do pedido: ".tt;
    }
    public function detalhes(){
        echo "<br><br>Detalhes do pedido:<br>";
    }
}
$pedido = new Pedido("Theobaldo");
echo'<br><br>----------------------------------------Atividade 6----------------------------------------<br><br>';
class Turma{
    public $disciplina;
    public array $alunos;
     public function __construct($disciplina){
        $this->disciplina = $disciplina;
    }
    public function adicionarAluno(Aluno $aluno){
        $this->alunos[] = $aluno;
        echo "O aluno: ".$aluno. "foi matriculado<br>";
    }
    public function melhorAluno(){
        
    }
    public function resultadoFinal(){
        foreach ($this->alunos as $aluno){
            echo "";
        }
    }
}
$aluno = new Turma("Português");
$aluno -> adicionarAluno("João");
$aluno -> adicionarAluno("Maria");
$aluno -> adicionarAluno("Jefferson");
$aluno -> melhorAluno();