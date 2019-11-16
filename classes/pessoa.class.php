<?php   
abstract class pessoa{
    
    private $nmPessoa;
    private $CPF;
    private $RG;
    private $dtNascimento;
    private $email;
    private $telefone;
    private $telefoneWhatsapp;
    private $tpLogradouro;
    private $logradouro;
    private $numLogradouro;
    private $complemento;
    private $bairro;
    private $cidade;
    private $estado;
    private $isAtivo;
    private $faceUrl;
    private $instUrl;
    private $nmUsuario;
    private $senha;


    public function __get($valor){
      return $this->$valor;
  }
  public function __set($propriedade,$valor){
      $this->$propriedade = $valor;
  }
  
  }


