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

class Aluno {
    public string $nome;
    public string $matricula;
    public array $notas;

    public function __construct (string $nome, string $matricula) {
        $this->nome = $nome;
        $this->matricula = $matricula;
    }
    public function adicionarNota (float $nota) {
        $this->notas[] = $nota;
    }
    public function media () {
        $media = 0.00;
        $i = 0;
        foreach ($this->notas as $nota) {
        $i = $i + 1;
        $media += $nota;
    }
    $media = $media/$i;
    return $media;
    }
    public function aprovado () {
        if ($this->media() >= 6){
            return true;
        } 
        else {
            return false;
        }
    }
}
$aluno = new Aluno("Robson", "001");
$aluno->adicionarNota(8);
$aluno->adicionarNota(7);
$aluno->adicionarNota(4);
$aluno->adicionarNota(10);
$aluno -> media();
$aluno -> aprovado();

$aluno2 = new Aluno("Maria", "002");
$aluno2->adicionarNota(9);
$aluno2->adicionarNota(10);
$aluno2->adicionarNota(8.5);

$aluno3 = new Aluno("João", "003");
$aluno3->adicionarNota(5);
$aluno3->adicionarNota(6);
$aluno3->adicionarNota(4);

echo "A média do aluno:". $aluno->nome. " é:".$aluno->media(). "<br>";
echo "O aluno foi:". $aluno->aprovado(). "<br>1 - Aprovado<br>2 - Reprovado";

echo'<br><br>----------------------------------------Atividade 3----------------------------------------<br><br>';

class ContaBancaria {
    public $titular;
    public $saldo;
        public function __construct(string $titular, float $saldo){
            $this->titular = $titular;
            $this->saldo = $saldo;
        }  
    public function depositar(float $valor){
        $this->saldo = $this->saldo + $valor;
        echo "Você depositou: R$". $this->saldo. "<br>";
    } 
    public function sacar (float $valor){
        if ($valor <= $this->saldo){
            $this->saldo -= $valor;
            echo "Valor de saque de: R$". $valor. "<br> Saldo atual da conta: R$". $this->saldo;
        }
        else{
            echo "tt";
            return false;
        }
    }
    public function transferir(ContaBancaria $destino, float $valor){
        $this->saldo = $this->saldo - $valor;
        $destino->saldo += $valor;
        echo "<br>Valor depositado a: ". $destino->titular. " no valor de: R$". $valor;
        echo "<br><br>Saldo atual da conta: R$". $this->saldo;
    }
}
$titular = new ContaBancaria("Arthur S.", 1500);
$titular -> depositar(4);
$titular -> sacar(500);
$titular2 = new ContaBancaria ("Roberta", 300);
$titular -> transferir($titular2, 1000);

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
        $this->itens[] = [
            "produto" => $produto,
            "quantidade" => $quantidade
        ];
        echo "Item: ".$produto->nome." ".$quantidade."x foi adicionado ao pedido de ".$this->cliente."<br>";
    }
    
    public function total(){
        $total = 0;
        foreach ($this->itens as $item){
            $total += $item["produto"]->preco * $item["quantidade"];
        }
        echo "Total do pedido: R$".$total."<br>";
        return $total;
    }
    
    public function detalhes(){
        echo "<br>--- Detalhes do Pedido ---<br>";
        echo "Cliente: ".$this->cliente."<br>";
        echo "Itens:<br>";
        foreach ($this->itens as $item){
            $produto = $item["produto"];
            $quantidade = $item["quantidade"];
            $subtotal = $produto->preco * $quantidade;
            echo "- ". $produto->nome." <br> Quantidade: ".$quantidade." <br> Preço Unitário: R$".$produto->preco." <br> Subtotal: R$".$subtotal."<br>";
            echo "<br>--------------------------------------<br>";
        }
        echo "-----------------------------------<br>";
        echo "Total do pedido: R$".$this->total()."<br>";
    }
}
    $esmalte = new Produto("Esmalte Azul", 10.00, 10);
    $esmalte2 = new Produto("Esmalte preto", 12.00, 5);
    
    $pedido = new Pedido("Thaysa");
    $pedido->adicionarItem($esmalte, 2);
    $pedido->adicionarItem($esmalte2, 1);
    $pedido->detalhes();
echo'<br><br>----------------------------------------Atividade 6----------------------------------------<br><br>';

class Turma {
    public string $disciplina;
    public array $alunos = [];

    public function __construct(string $disciplina){
        $this->disciplina = $disciplina;
    }

    public function adicionarAluno(Aluno $aluno){
        $this->alunos[] = $aluno;
        echo "Aluno ".$aluno->nome." matriculado na disciplina ".$this->disciplina."<br>";
    }

    public function melhorAluno(){
        if (empty($this->alunos)){
            echo "Nenhum aluno matriculado.<br>";
            return 0;
        }
        $melhor = $this->alunos[0];
        foreach ($this->alunos as $aluno){
            if ($aluno->media() > $melhor->media()){
                $melhor = $aluno;
            }
        }
        echo "O melhor aluno da turma é: ".$melhor->nome." com média ".$melhor->media()."<br>";
        return $melhor;
    }

    public function resultadoFinal(){
        echo "<br>--- Resultado Final da Turma ".$this->disciplina." ---<br>";
        foreach ($this->alunos as $aluno){
            if ($aluno->media() >= 6){
                echo "Aluno: ".$aluno->nome." | Média: ".$aluno->media()." | Resultado: Aprovado <br>";
            }
            else{
                echo "Aluno: ".$aluno->nome." | Média: ".$aluno->media()." | Resultado: Reprovado <br>";
            }
        }
    }
}

$turma = new Turma("Português");
$turma->adicionarAluno($aluno);
$turma->adicionarAluno($aluno2);
$turma->adicionarAluno($aluno3);

$turma->melhorAluno();
$turma->resultadoFinal();

echo'<br><br>----------------------------------------Atividade 7----------------------------------------<br><br>';

class Agenda {
    public array $contatos = [];

    public function adicionarContato(string $nome, string $telefone){
        $this->contatos[$nome] = $telefone;
        echo "Contato: ". $nome. " adicionado com sucesso!<br>";
    }

    public function removerContato(string $nome){
            echo "<br>Contato:". $nome. " removido da agenda!<br>";
    }

    public function buscarContato(string $nome){
        }

    public function listarContatos(){
    }
}

// Exemplo de uso
$agenda = new Agenda();
$agenda->adicionarContato("João", "1111-1111");
$agenda->adicionarContato("Maria", "2222-2222");
$agenda->adicionarContato("Ana", "3333-3333");

$agenda->buscarContato("Maria");
$agenda->removerContato("João");
$agenda->listarContatos();