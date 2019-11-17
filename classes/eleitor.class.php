<?php
include_once ('pessoa.class.php');

class eleitor extends pessoa{
    
    private $nmIndicacao; 
    private $observacao;
    private $posicionamento;
    private $bandeiras;
    private $partidosNegativos;
    private $partidosPositivos;
    private $rejeicaoCandidato;
    private $aprovacaoCandidato;


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
  
        $sql= "INSERT INTO `tb_eleitor` ( `nmPessoa`, `dtNascimento`, `CPF`, `RG`, `email`, `telefone`,
        `telefoneWhatsapp`, `tpLogradouro`, `logradouro`,
        `numLogradouro`, `complemento`, `bairro`, `cidade`, `estado`, `isAtivo`, `faceUrl`, `instUrl`, 
         `nmIndicacao`, `observacao`, `posicionamento`, `bandeiras`,
        `partidosNegativos`, `partidosPositivos`, `rejeicaoCandidato`, 
        `aprovacaoCandidato` ) VALUES
        ('$this->nmPessoa', '$this->dtNascimento', '$this->CPF', '$this->RG', '$this->email', '$this->telefone', '$this->telefoneWhatsapp', '$this->tpLogradouro', '$this->logradouro',
        '$this->numLogradouro', '$this->complemento', '$this->bairro', '$this->cidade', '$this->estado', '$this->isAtivo', '$this->faceUrl', '$this->instUrl',
        '$this->nmIndicacao', '$this->observacao', 
        '$this->posicionamento', '$this->bandeiras',
        '$this->partidosNegativos', '$this->partidosPositivos', '$this->rejeicaoCandidato', 
        '$this->aprovacaoCandidato' )";
        
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
        $sql ="SELECT * FROM `tb_eleitor` WHERE isAtivo ='1' ";
        $stmt = $pdo->query($sql);
          while ($dados = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($result,$dados);
    }
        return $result;
    
        }	
        public function pesquisareleitor($dados){
        $result = array();
        $pdo = new PDO('mysql:host=localhost;dbname=u142585150_agp', 'u142585150_root', '785412Wiza');
        $sql ="SELECT * FROM `tb_eleitor` WHERE `nmPessoa` LIKE '%$dados%' AND isAtivo ='1' ";
        $stmt = $pdo->query($sql);
          while ($dados = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($result,$dados);
          }
          return $result;
    
    
        }
    
        public function updateEleitor($dados){
          $pdo = new PDO('mysql:host=localhost;dbname=u142585150_agp', 'u142585150_root', '785412Wiza');
          $pdo->exec("set names utf8");
          $sql= "UPDATE `tb_eleitor` Set  `nmPessoa` = '$this->nmPessoa', `dtNascimento`='$this->dtNascimento',
           `CPF`='$this->CPF', `RG`='$this->RG', `email`= '$this->email', `telefone`='$this->telefone',
          `telefoneWhatsapp`='$this->telefoneWhatsapp', `tpLogradouro`='$this->tpLogradouro', `logradouro`='$this->logradouro',
          `numLogradouro`='$this->numLogradouro', `complemento`='$this->complemento', `bairro`='$this->bairro',
           `cidade`='$this->cidade', `estado`='$this->estado', `isAtivo`='$this->isAtivo', `faceUrl`='$this->faceUrl',
            `instUrl`='$this->instUrl', 
            `nmIndicacao`='$this->nmIndicacao', `observacao`='$this->observacao', 
            `posicionamento`='$this->posicionamento', `bandeiras`='$this->bandeiras',
            `partidosNegativos`='$this->partidosNegativos',
             `partidosPositivos`='$this->partidosPositivos', `rejeicaoCandidato`='$this->rejeicaoCandidato', 
          `aprovacaoCandidato`='$this->aprovacaoCandidato'  Where
          `id_eleitor`= $dados[id_eleitor] ";
          
          $stmt = $pdo->prepare($sql);
          $result=$stmt->execute();
          if (!$result) {
            var_dump($stmt->errorInfo());
    
          }
          $count = $stmt->rowCount();
          $mensagem= $count." foi alterado com sucesso";
          $pdo= null;
        }
        public function desativarEleitor($dados){
          $pdo = new PDO('mysql:host=localhost;dbname=u142585150_agp', 'u142585150_root', '785412Wiza');
          $pdo->exec("set names utf8");
          $sql="UPDATE `tb_eleitor` SET `isAtivo` = '0' WHERE `id_eleitor` = $dados[id_eleitor]";
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