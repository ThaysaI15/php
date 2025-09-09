<?php

class Pessoa {

    public $nome;
    public $telefone;
    public $endereco;

    public function __construct($nome,$telefone,$endereco) {
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->endereco = $endereco;
    }

}

class PessoaFisica extends Pessoa {

    public $CPF;

    public function __construct($nome,$telefone,$endereco,$CPF) {
        parent::__construct($nome,$telefone,$endereco);
        $this->CPF=$CPF;
    }

}

class PessoaJuridica extends Pessoa {
    
    public $CNPJ;
    public $socios = [];

    public function __construct($nome,$telefone,$endereco,$CNPJ) {
        parent::__construct($nome,$telefone,$endereco);
        $this->CNPJ=$CNPJ;
    }

    public function novoSocio($socio){

        if ($socio instanceof PessoaFisica) {
            $this->socios[] = $socio;
        }
        else {
            echo('<br>A pessoa não pode ser sócio dessa empresa<br>');
        }


    }

}       


$alice = new PessoaFisica('alice','(65)99111-1112','Rua CV, 36','123.456.789-10');
$Ricardo_Eletro = new PessoaJuridica('Ricardo_Eletro','(62) 62626-0000','RUA Valle, 321','12.134.151/1000-65');

var_dump($alice);
echo('<br><br>');
var_dump($Ricardo_Eletro);

$Ricardo_Eletro->novoSocio($alice);
echo('<br><br>');
var_dump($Ricardo_Eletro);

?>