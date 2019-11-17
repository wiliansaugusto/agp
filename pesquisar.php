<?php

require_once('classes/candidato.class.php');
require_once('classes/apoiador.class.php');
require_once('classes/eleitor.class.php');

/*
se tabela = 1 -> candidato
   tabela =2 -> apoiadores
    tabela = 3 -> eleitorer
*/


 if(($_POST['tabela']) =="1"  ){
  $obj = new candidato();
   //$obj->exibir($_POST);
    foreach ($_POST as $key => $value) {
      $obj->$key=$value;

    }

 }else if(($_POST['tabela']) =="2" ){
  $obj = new apoiador();
   foreach ($_POST as $key => $value) {
     $obj->$key=$value;

   }
 }else if(($_POST['tabela']) =="3" ){
  $obj = new eleitor();
   foreach ($_POST as $key => $value) {
     $obj->$key=$value;

   }
 }
 
 

if (($_POST['tabela']==1) && ($_POST['nome']==NULL)) {
    $dadosPesquisa=$obj->pesquisarTodos();
   
    
}else if(($_POST['tabela']==1) && ( $_POST['nome'])){
  $dadosPesquisa=$obj->pesquisarCandidato($_POST['nome']);

}else if(isset($_POST['alt'])&& (($_POST['id_candidato']))){
  $obj = new candidato();
  foreach ($_POST as $key => $value) {
    $obj->$key=$value;

  }
  $alt = $obj->updateCandidato($_POST);


}else if(isset($_POST['des'])&& (($_POST['id_candidato']))){
  $obj = new candidato();
  $des = $obj->desativarCandidato($_POST);

}
  /*para o uso de apoiadores*/ 
if (($_POST['tabela']==2) && ($_POST['nome']==NULL)) {
  $dadosPesquisa=$obj->pesquisarTodos();
 
  
}else if(($_POST['tabela']==2) && ( $_POST['nome'])){
$dadosPesquisa=$obj->pesquisarApoiador($_POST['nome']);

}else if(isset($_POST['alt'])&& (($_POST['id_apoiador']))){
$obj = new apoiador();
foreach ($_POST as $key => $value) {
  $obj->$key=$value;

}
$alt = $obj->updateApoiador($_POST);


}else if(isset($_POST['des'])&& (($_POST['id_apoiador']))){
$obj = new apoiador();
$des = $obj->desativarApoiador($_POST);

}  
/*para uso de eleitor*/
if (($_POST['tabela']==3) && ($_POST['nome']==NULL)) {
  $dadosPesquisa=$obj->pesquisarTodos();
 
  
}else if(($_POST['tabela']==3) && ( $_POST['nome'])){
$dadosPesquisa=$obj->pesquisareleitor($_POST['nome']);

}else if(isset($_POST['alt'])&& (($_POST['id_eleitor']))){
$obj = new eleitor();
foreach ($_POST as $key => $value) {
  $obj->$key=$value;

}
$alt = $obj->updateEleitor($_POST);


}else if(isset($_POST['des'])&& (($_POST['id_eleitor']))){
$obj = new eleitor();
$des = $obj->desativarEleitor($_POST);

}

$_POST=NULL;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
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
    <select name="tabela" required>
      <option value="" disabled selected>Escolha a sua opção</option>
      <option value="1">Candidatos</option>
      <option value="2">Apoiadores</option>
      <option value="3">Eleitores</option>

    </select>
    <label>Defina o tipo</label>
  </div>
        <div class="input-field col m12 s6">
          <input name="nome" id="nomeId" type="text" class="validate">
          <label for="nomeId">Nome</label>
        </div>
      </div>

<button name="pesquisar" value ="1" type="submit">Pesquisar</button>
</form>
<br><br>

<?php foreach ($dadosPesquisa as $key => $value) {?>
<form action="pesquisar.php" name="<?="form_".$key?>"method="post">
<div class="row">
        
        <?php foreach ($value as $chave => $v) {
           // echo $chave." - ". $v."<br>";
           if($chave =='id_candidato' ||$chave =='id_eleitor' || $chave =='id_apoiador' ||$chave== 'userCad'||
           $chave== 'dt_cad'||$chave== 'userAlt'||$chave== 'user_desativa'||
           $chave== 'isAtivo'||$chave== 'nmUsuario'||$chave== 'senha'||$chave== 'dt_desativa'){?>
         
                  <div class="input-field col s12">
                      <input hidden name="<?=$chave?>" id="<?=$chave?>Id" type="text" value="<?=$v?>" class="validate">
                      <label hidden for="<?=$chave?>Id"><?=$chave?></label>
                  </div>

           <?php }else{
        
            ?>
            
            <div class="input-field col s6">
            <input name="<?=$chave?>" id="<?=$chave?>Id" type="text" value="<?=$v?>" class="validate">
            <label for="<?=$chave?>Id"><?=$chave?></label>
        </div>
        <?php }  }?>
        </div>
        <button name="alt"type="submit">Alterar</button>
        <button name="des"type="submit">Desativar</button>
        
            </form>  
            <hr><br><br>        
             <?php }?>

<hr>
    <br>
    

<?php include('footer.php')?>

      <!--JavaScript at end of body for optimized loading-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
      <script type="text/javascript" src="js/agp.js"></script>
  
</body>
</html>