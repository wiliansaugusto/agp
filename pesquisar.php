<?php

require_once('classes/candidato.class.php');


 $obj = new candidato();

 if(isset($_POST['pesquisar'])){
   // $obj->exibir($_POST);
    foreach ($_POST as $key => $value) {
      $obj->$key=$value;

    }

 }
 

if (($_POST['tabela']==1) && ($_POST['nome']==NULL)) {
    $dadosPesquisa=$obj->pesquisarTodos();
    foreach ($dadosPesquisa as $key => $value) {

        foreach ($value as $chave => $v) {
           // var_dump($chave);
            //echo $chave." - ". $v."<br>";
        }
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

<h3>Realizar Pesquisas</h3>

<form action="pesquisar.php" method="post">
<div class="row">
    <form class="col s12">
      <div class="row">
      <div class="input-field col m12 s6">
    <select name="tabela">
      <option value="" disabled selected>Escolha a sua opção</option>
      <option value="1">Candidatos</option>
      <option value="2">Apoiadores</option>
      <option value="3">Eleitores</option>
      <option value="3">Todos</option>

    </select>
    <label>Defina o tipo</label>
  </div>
        <div class="input-field col m12 s6">
          <input name="nome" id="nomeId" type="text" class="validate">
          <label for="nomeId">Nome</label>
        </div>
      </div>

<button name="pesquisar" value ="1"type="submit">Pesquisar</button>
</form>
<br>

<?php foreach ($dadosPesquisa as $key => $value) {?>
<ul class="collapsible">
<form action="" name="<?="form_".$key?>"method="post">
<div class="row">
        
        <?php foreach ($value as $chave => $v) {
           // echo $chave." - ". $v."<br>";
           if($chave =='id_candidato' ||$chave== 'userCad'||
           $chave== 'dt_cad'||$chave== 'userAlt'||$chave== 'user_desativa'||$chave== 'dt_desativa'){}else{
        
            ?>
            
            <div class="input-field col s6">
            <input name="we" id="weId" type="text" value="<?=$v?>" class="validate">
            <label for="weId"><?=$chave?></label>
        </div>
        <?php }  }?>
        </div>
            </form>  
            <hr><br><br>        
             <?php }?>

<hr>
    <br>
    <br>
    <br>

<?php include('footer.php')?>

      <!--JavaScript at end of body for optimized loading-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
      <script type="text/javascript" src="js/agp.js"></script>
  
</body>
</html>