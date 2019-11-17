<?php
include_once ('pessoa.class.php');

class apoiador extends pessoa{

    private $nmIndicacao;
    private $obsIndicacao;
    private $dtInicioCamp;
    private $dtTerminoCamp;
    private $valPag;
    private $referencia;
    private $isLideranca;
    private $obsLiderenca;
    private $grauEnvolvimento;

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
  
        $sql= "INSERT INTO `tb_apoiador` ( `nmPessoa`, `dtNascimento`, `CPF`, `RG`, `email`, `telefone`,
        `telefoneWhatsapp`, `tpLogradouro`, `logradouro`,
        `numLogradouro`, `complemento`, `bairro`, `cidade`, `estado`, `isAtivo`, `faceUrl`, `instUrl`, 
        `nmUsuario`, `senha`, `nmIndicacao`, `obsIndicacao`, `dtInicioCamp`, `dtTerminoCamp`,
        `valPag`, `referencia`, `isLideranca`, 
        `obsLiderenca`, `grauEnvolvimento` ) VALUES
        ('$this->nmPessoa', '$this->dtNascimento', '$this->CPF', '$this->RG', '$this->email', '$this->telefone', '$this->telefoneWhatsapp', '$this->tpLogradouro', '$this->logradouro',
        '$this->numLogradouro', '$this->complemento', '$this->bairro', '$this->cidade', '$this->estado', '$this->isAtivo', '$this->faceUrl', '$this->instUrl', 
        '$this->nmUsuario', '$this->senha', '$this->nmIndicacao', '$this->obsIndicacao', 
        '$this->dtInicioCamp', '$this->dtTerminoCamp',
        '$this->valPag', '$this->referencia', '$this->isLideranca', 
        '$this->obsLiderenca', '$this->grauEnvolvimento')";
        
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
        $sql ="SELECT * FROM `tb_apoiador` WHERE isAtivo ='1' ";
        $stmt = $pdo->query($sql);
          while ($dados = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($result,$dados);
    }
        return $result;
    
        }	
        public function pesquisarApoiador($dados){
        $result = array();
        $pdo = new PDO('mysql:host=localhost;dbname=u142585150_agp', 'u142585150_root', '785412Wiza');
        $sql ="SELECT * FROM `tb_apoiador` WHERE `nmPessoa` LIKE '%$dados%' AND isAtivo ='1' ";
        $stmt = $pdo->query($sql);
          while ($dados = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($result,$dados);
          }
          return $result;
    
    
        }
    
        public function updateApoiador($dados){
          $pdo = new PDO('mysql:host=localhost;dbname=u142585150_agp', 'u142585150_root', '785412Wiza');
          $pdo->exec("set names utf8");
          $sql= "UPDATE `tb_apoiador` Set  `nmPessoa` = '$this->nmPessoa', `dtNascimento`='$this->dtNascimento',
           `CPF`='$this->CPF', `RG`='$this->RG', `email`= '$this->email', `telefone`='$this->telefone',
          `telefoneWhatsapp`='$this->telefoneWhatsapp', `tpLogradouro`='$this->tpLogradouro', `logradouro`='$this->logradouro',
          `numLogradouro`='$this->numLogradouro', `complemento`='$this->complemento', `bairro`='$this->bairro',
           `cidade`='$this->cidade', `estado`='$this->estado', `isAtivo`='$this->isAtivo', `faceUrl`='$this->faceUrl',
            `instUrl`='$this->instUrl', `nmUsuario`='$this->nmUsuario', `senha`='$this->senha', 
            `nmIndicacao`='$this->nmIndicacao', `obsIndicacao`='$this->obsIndicacao', 
            `dtInicioCamp`='$this->dtInicioCamp', `dtTerminoCamp`='$this->dtTerminoCamp',
            `valPag`='$this->valPag',
             `referencia`='$this->referencia', `isLideranca`='$this->isLideranca', 
          `obsLiderenca`='$this->obsLiderenca', `grauEnvolvimento`='$this->grauEnvolvimento' Where
          `id_apoiador`= $dados[id_apoiador] ";
          
          $stmt = $pdo->prepare($sql);
          $result=$stmt->execute();
          if (!$result) {
            var_dump($stmt->errorInfo());
    
          }
          $count = $stmt->rowCount();
          $mensagem= $count." foi alterado com sucesso";
          $pdo= null;
        }
        public function desativarApoiador($dados){
          $pdo = new PDO('mysql:host=localhost;dbname=u142585150_agp', 'u142585150_root', '785412Wiza');
          $pdo->exec("set names utf8");
          $sql="UPDATE `tb_apoiador` SET `isAtivo` = '0' WHERE `id_apoiador` = $dados[id_apoiador]";
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