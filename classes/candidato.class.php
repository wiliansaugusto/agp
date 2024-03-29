<?php
include_once ('pessoa.class.php');

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
      $pdo = new PDO('mysql:host=localhost;dbname=u142585150_agp', 'u142585150_root', '785412Wiza');
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
    $pdo = new PDO('mysql:host=localhost;dbname=u142585150_agp', 'u142585150_root', '785412Wiza');
    $sql ="SELECT * FROM `tb_candidato` WHERE isAtivo ='1' ";
    $stmt = $pdo->query($sql);
      while ($dados = $stmt->fetch(PDO::FETCH_ASSOC)) {
        array_push($result,$dados);
}
    return $result;

    }	
    public function pesquisarCandidato($dados){
    $result = array();
    $pdo = new PDO('mysql:host=localhost;dbname=u142585150_agp', 'u142585150_root', '785412Wiza');
    $sql ="SELECT * FROM `tb_candidato` WHERE `nmPessoa` LIKE '%$dados%' AND isAtivo ='1' ";
    $stmt = $pdo->query($sql);
      while ($dados = $stmt->fetch(PDO::FETCH_ASSOC)) {
        array_push($result,$dados);
      }
      return $result;


    }

    public function updateCandidato($dados){
      $pdo = new PDO('mysql:host=localhost;dbname=u142585150_agp', 'u142585150_root', '785412Wiza');
      $pdo->exec("set names utf8");
      $sql= "UPDATE `tb_candidato` Set  `nmPessoa` = '$this->nmPessoa', `dtNascimento`='$this->dtNascimento',
       `CPF`='$this->CPF', `RG`='$this->RG', `email`= '$this->email', `telefone`='$this->telefone',
      `telefoneWhatsapp`='$this->telefoneWhatsapp', `tpLogradouro`='$this->tpLogradouro', `logradouro`='$this->logradouro',
      `numLogradouro`='$this->numLogradouro', `complemento`='$this->complemento', `bairro`='$this->bairro',
       `cidade`='$this->cidade', `estado`='$this->estado', `isAtivo`='$this->isAtivo', `faceUrl`='$this->faceUrl',
        `instUrl`='$this->instUrl', `nmUsuario`='$this->nmUsuario', `senha`='$this->senha', 
        `nmCandidato`='$this->nmCandidato', `CNPJCampanha`='$this->CNPJCampanha', 
        `siglaPartido`='$this->siglaPartido', `numCandidato`='$this->numCandidato',`nmColigacaoPorpocional`='$this->nmColigacaoPorpocional',
         `nmCandidatoMajoritario`='$this->nmCandidatoMajoritario', `nmColigacaoMajoritaria`='$this->nmColigacaoMajoritaria', 
      `numCandMajoritario`='$this->numCandMajoritario', `CNPJMajoritario`='$this->CNPJMajoritario' Where
      `id_candidato`= $dados[id_candidato] ";
      
      $stmt = $pdo->prepare($sql);
      $result=$stmt->execute();
      if (!$result) {
        var_dump($stmt->errorInfo());

      }
      $count = $stmt->rowCount();
      $mensagem= $count." foi alterado com sucesso";
      $pdo= null;
    }
    public function desativarCandidato($dados){
      $pdo = new PDO('mysql:host=localhost;dbname=u142585150_agp', 'u142585150_root', '785412Wiza');
      $pdo->exec("set names utf8");
      $sql="UPDATE `tb_candidato` SET `isAtivo` = '0' WHERE `id_candidato` = $dados[id_candidato]";
      $stmt = $pdo->prepare($sql);
      $result=$stmt->execute();
      if (!$result) {
        var_dump($stmt->errorInfo());

      }
      $count = $stmt->rowCount();
      $mensagem= $count." foi alterado com sucesso";
      $pdo= null;
    }
}
