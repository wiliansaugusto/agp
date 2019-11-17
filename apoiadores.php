<?php

include_once('classes/apoiador.class.php');

//var_dump($_POST);
 if(isset($_POST['cadastrarApoiador'])){
     $obj = new apoiador();
    foreach ($_POST as $key => $value) {
      $obj->$key=$value;

    }

$result =    $obj->salvar($_POST);
/*
if(! $result){
  header("location: index.php"); 

}*/

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
<h3 class="center-align">Cadastrar Apoiadores</h3>

<form action="apoiadores.php" method="post">
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


      <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12 l6">
          <input name="nmIndicacao" id="nmIndicacaoId" type="text" class="validate">
          <label for="nmIndicacaoId">Quem Indicou?</label>
        </div>
        <div class="input-field col s12 l6">
        <textarea name="obsIndicacao" id="obsIndicacaoId" class="materialize-textarea"></textarea>
          <label for="obsIndicacaoId">Obs da Indicação</label>
        </div>
      </div>
      <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12 l6">
          <input name="dtInicioCamp" id="dtInicioCampId" type="text" class="datepicker">
          <label for="dtInicioCampId">Inicio na Campanha</label>
        </div>
        <div class="input-field col s12 l6">
          <input name="dtTerminoCamp" id="dtTerminoCampId" type="text" class="datepicker">
          <label for="dtTerminoCampId">Encerramento na Campanha</label>
        </div>
      </div>
      <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12 l6">
          <input name="valPag" id="valPagId" type="text" class="validate">
          <label for="valPagId">Valor Combinado</label>
        </div>
        <div class="input-field col s12 l6">
          <input placeholder="Salário, Ajuda de custo, Contrato..."name="referencia" id="referenciaId" type="text" class="validate">
          <label for="referenciaId">Referencia do Pagamento</label>
        </div>
      </div>

      <div class="row">
    <form class="col s12">
      <div class="row">
      <div class="input-field col s12 l6">
          <select name="isLideranca">
      <option value="" disabled selected>Escolha uma opção</option>
      <option value="Sim">Sim </option>
      <option value="Nao">Não</option>
    </select>
    <label>Liderança de Segmento?</label>
        </div>
        <div class="input-field col s12 l6">
        <textarea name="obsLiderenca" id="obsLiderencaoId" class="materialize-textarea"></textarea>
          <label for="obsLiderencaId">Observaçao de Liderança</label>
        </div>
       
        <div class="input-field col s12 l12">
          <input placeholder="Coordenador, lider de equipe, equipe de apoio" name="grauEnvolvimento" id="grauEnvolvimentoId" type="text" class="validate">
          <label for="grauEnvolvimentoId">Comprometimento</label>
        </div>

        
      </div>


        
      </div>

      <div class="center-align">
<button name="cadastrarApoiador" type="submit" class="btn-large waves-effect waves-light ">Cadastrar Apoiador
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