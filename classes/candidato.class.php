<?php
include ('pessoa.class.php');

class candidato extends pessoa{

    private $nmCandidato;
    private $CNPJCampanha;
    private $siglaPartido;
    private $numCandidato;
    private $nmColigacaoPorpocional;
    private $nmCandidatoMajoritario;
    private $nmColigacaoMajoritaria;
    private $numCandMajoritario;
    private $CNPJMajoritario;
    

    
    public function __get($valor){
      return $this->$valor;
  }
  public function __set($propriedade,$valor){
      $this->$propriedade = $valor;
  }


     public function exibir($dados){


        foreach ($dados as $key => $value) {

            echo($key." - ".$value."<br>");
        }

    }
  
    public function salvar($dados){
      $pdo = new PDO('mysql:host=localhost:3306;dbname=agp', 'root', '78541200');
      $pdo->exec("set names utf8");

      $sql= "INSERT INTO `tb_candidato` ( `nmPessoa`, `dtNascimento`, `CPF`, `RG`, `email`, `telefone`,
      `telefoneWhatsapp`, `tpLogradouro`, `logradouro`,
      `numLogradouro`, `complemento`, `bairro`, `cidade`, `estado`, `isAtivo`, `faceUrl`, `instUrl`, 
      `nmUsuario`, `senha`, `nmCandidato`, `CNPJCampanha`, `siglaPartido`, `numCandidato`,
      `nmColigacaoPorpocional`, `nmCandidatoMajoritario`, `nmColigacaoMajoritaria`, 
      `numCandMajoritario`, `CNPJMajoritario` ) VALUES
      ('$this->nmPessoa', '$this->dtNascimento', '$this->CPF', '$this->RG', '$this->email', '$this->telefone', '$this->telefoneWhatsapp', '$this->tpLogradouro', '$this->logradouro',
      '$this->numLogradouro', '$this->complemento', '$this->bairro', '$this->cidade', '$this->estado', '$this->isAtivo', '$this->faceUrl', '$this->instUrl', 
      '$this->nmUsuario', '$this->senha', '$this->nmCandidato', '$this->CNPJCampanha', '$this->siglaPartido', '$this->numCandidato',
      '$this->nmColigacaoPorpocional', '$this->nmCandidatoMajoritario', '$this->nmColigacaoMajoritaria', 
      '$this->numCandMajoritario', '$this->CNPJMajoritario')";
      
      $stmt = $pdo->prepare($sql);
      $result=$stmt->execute();
      if (!$result) {
        var_dump($stmt->errorInfo());

      }
      $count = $stmt->rowCount();
      $pdo= null;

  }

  public function pesquisarTodos(){
    $result = array();
    $pdo = new PDO('mysql:host=localhost:3306;dbname=agp', 'root', '78541200');
    $sql ="SELECT * FROM `tb_candidato`";
    $stmt = $pdo->query($sql);
      while ($dados = $stmt->fetch(PDO::FETCH_ASSOC)) {
        array_push($result,$dados);
}
    return $result;

    }	
  
}

