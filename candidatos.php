<?php

require_once('classes/candidato.class.php');


 if(isset($_POST['cadastrarCandidato'])){
    $obj = new candidato();
    foreach ($_POST as $key => $value) {
      $obj->$key=$value;

    }

$result =    $obj->salvar($_POST);

if(! $result){
  header("location: index.php"); 
  echo("<script>alert('Candidato Salvo com sucesso</script>");

}

 }

 
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema AGP</title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/agp.css"  media="screen,projection"/>
    <!--Let browser know dtNascimentobsite is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    
    <script type="text/javascript" src="js/agp.js"></script>


</head>
<body>
<?php include_once('navegacao.php')?>

<div class="container m10">
<h3 class="center-align">Cadastrar candidato</h3>

<form action="candidatos.php" method="post">
    <input type="hidden" name="isAtivo" value="1">
<div class="row">
    <form class="col s12 ">
      <div class="row">
        <div class="input-field col s12 l6">
          <input name="nmPessoa" id="nmPessoaId" type="text" class="validate">
          <label for="nmPessoaId">Nome Completo</label>
        </div>
        <div class="input-field col s12 l6">
          <input name="dtNascimento" id="dtNascimentoId" type="text" class="datepicker">
          <label for="dtNascimentoId">Data de Nascimento</label>
        </div>
       
      </div>
      <div class="row">
    <form class="col s12">
      <div class="row">
      <div class="input-field col s12 l6">
        <input name="CPF" id="CPFId" type="text" class="validate">
            <label for="CPFId">CPF</label>
          </div>
        <div class="input-field col s12 l6">
          <input name="RG" id="RGId" type="text" class="validate">
          <label for="RGId">RG</label>
        </div>
      </div>
      <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12 l6">
          <input name="email" id="emailId" type="email" class="validate" required>
          <label for="emailId">Email</label>
        </div>
        <div class="input-field col s12 l6">
          <input name="telefone" id="telefoneId" type="text" class="validate">
          <label for="telefoneId">Telefone</label>
        </div>
      </div>
      <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12 l5">
          <input name="telefoneWhatsapp" id="telefoneWhatsappId" type="text" class="validate">
          <label for="telefoneWhatsappId">Whatsapp</label>
        </div>
                <div class="input-field col s12 l2">
            <select name="tpLogradouro" >
            <option  disabled selected>Tipo</option>
            <option  value="Rua">Rua</option>
            <option  value="Avenida">Avenida</option>
            <option  value="Praca">Praça</option>
            <option  value="Beco">Beco</option>
            <option  value="Viela">Viela</option>          
            <option  value="Caminho">Caminho</option>

            </select>
            <label>Tipo</label>
                </div>
        <div class="input-field col s12 l5">
          <input name="logradouro" id="logradouroId" type="text" class="validate">
          <label for="logradouroId">Logradouro</label>
        </div>
      </div>
     
      </div>

      <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12 l4">
          <input name="numLogradouro" id="numLogradouroId" type="text" class="validate">
          <label for="numLogradouroId">número da residencia</label>
        </div>
        <div class="input-field col s12 l4">
          <input name="complemento" id="complementoId" type="text" class="validate">
          <label for="complementoId">Complemento</label>
        </div>
        <div class="input-field col s12 l4">
          <input name="bairro" id="bairroId" type="text" class="validate">
          <label for="bairroId">Bairro</label>
        </div>
      </div>
      </div>
      <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12 l6">
          <input name="cidade" id="cidadeId" type="text" class="validate">
          <label for="cidadeId">Cidade</label>
        </div>
        <div class="input-field col s12 l6">
          <input name="estado" id="estadoId" type="text" class="validate">
          <label for="estadoId">Estado</label>
        </div>
        <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12 l6">
          <input name="faceUrl" id="faceUrlId" type="text" class="validate">
          <label for="faceUrlId">Facebook</label>
        </div>
        <div class="input-field col s12 l6">
          <input name="instUrl" id="instUrlId" type="text" class="validate">
          <label for="instUrlId">Instagram</label>
        </div>
      </div>
      <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12 l6">
          <input name="nmUsuario" id="nmUsuarioId" type="text" class="validate">
          <label for="nmUsuarioId">Nome Usuario</label>
        </div>
        <div class="input-field col s12 l6">
          <input name="senha" id="senhaId" type="password" class="validate">
          <label for="senhaId">Senha</label>


        </div>
      </div>

<h5 class="center-align">Dados da candidatura</h5>
      <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12 l6">
          <input name="nmCandidato" id="nmCandidatoId" type="text" class="validate">
          <label for="nmCandidatoId">Nome Fantasia</label>
        </div>
        <div class="input-field col s12 l6">
          <input name="CNPJCampanha" id="CNPJCampanhaId" type="text" class="validate">
          <label for="CNPJCampanhaId">CNPJ da Campanha</label>
        </div>
      
      <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12 l6">
          <input name="numCandidato" id="numCandidatoId" type="text" class="validate">
          <label for="numCandidatoId">Numero do Candidato</label>
        </div>
        <div class="input-field col s12 l6">
          <input name="siglaPartido" id="siglaPartidoId" type="text" class="validate">
          <label for="siglaPartidoId">Sigla Partidaria</label>
        </div>
      </div>
      <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12 l6">
          <input name="nmColigacaoPorpocional" id="nmColigacaoPorpocionalId" type="text" class="validate">
          <label for="nmColigacaoPorpocionalId">Nome Coligacação Porpocional</label>
        </div>
        <div class="input-field col s12 l6">
          <input name="nmCandidatoMajoritario" id="nmCandidatoMajoritarioId" type="text" class="validate">
          <label for="nmCandidatoMajoritarioId">Nome do Candidato à prefeitura</label>
        </div>
      </div>

      <div class="row">
    <form class="col s12">
      <div class="row">
      <div class="input-field col s12 l3">
          <input name="numCandMajoritario" id="numCandMajoritarioId" type="text" class="validate">
          <label for="numCandMajoritarioId">Numero Prefeito(a)</label>
        </div>
        <div class="input-field col s12 l6">
          <input name="nmColigacaoMajoritaria" id="nmColigacaoMajoritariaId" type="text" class="validate">
          <label for="nmColigacaoMajoritariaId">Coligação Prefeitura</label>
        </div>
        <div class="input-field col s12 l3">
          <input name="CNPJMajoritario" id="CNPJMajoritarioId" type="text" class="validate">
          <label for="CNPJMajoritarioId">CNPJ Campanha Prefeito(a)</label>
        </div>
      </div>


        
      </div>

      <div class="center-align">
<button name="cadastrarCandidato" type="submit" class="btn-large waves-effect waves-light ">Cadastrar Candidato
    <i class="material-icons right">done_all</i>
  </button>
  </div> 
</form>


</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php include('footer.php')?>

      <!--JavaScript at end of body for optimized loading-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
      <script type="text/javascript" src="js/agp.js"></script>
  
</body>
</html>