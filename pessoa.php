class Pessoa
{
    public string $nome;
    public string $telefone;
    public string $endereco;
    public ?int $id;

    public function __construct(string $nome, string $telefone, string $endereco, ?int $id = null) {
        $this->id = $id; // se não passar, fica null
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->endereco = $endereco;
    }

    public function toArray() {
        return [
            "nome" => $this->nome,
            "telefone" => $this->telefone,
            "endereco" => $this->endereco
        ];
    }
}

class PessoaFisica extends Pessoa
{
    public string $cpf;

    public function __construct(string $nome, string $telefone, string $endereco, string $cpf)
    {
        parent::__construct($nome, $telefone, $endereco);
        $this->cpf = $cpf;
    }

}

class PessoaJuridica extends Pessoa
{
    public string $cnpj;
    private array $socios = [];
    public function __construct(string $nome, string $telefone, string $endereco, string $cnpj)
    {
        parent::__construct($nome, $telefone, $endereco);
        $this->cnpj = $cnpj;
    }

    public function adicionarSocio(PessoaFisica $socio){
//        $this->socios[] += $socio;
        array_push($this->socios, $socio);
    }

}