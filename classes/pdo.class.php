<?php

 $username ="root";
 $password ="78541200";


try {
    $pdo = new PDO('mysql:host=localhost:3306;dbname=agp', $username, $password);
  $opcoes = array( PDO::ATTR_PERSISTENT => true,
  PDO::ATTR_CASE       => PDO::CASE_UPPER    
);
} catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
}       

 function salvar($dados){
  $pdo = new PDO('mysql:host=localhost:3306;dbname=agp', 'root', '78541200');
  echo "entrou no salvar";
$sql= "INSERT INTO `tb_candidato` ( `nmPessoa`, `dtNascimento`, `CPF`, `RG`, `email`, `telefone`,
 `telefoneWhatsapp`, `tpLogradouro`, `logradouro`,
`numLogradouro`, `complemento`, `bairro`, `cidade`, `estado`, `isAtivo`, `faceUrl`, `instUrl`, 
`nmUsuario`, `senha`, `nmCandidato`, `CNPJCampanha`, `siglaPartido`, `numCandidato`,
 `nmColigacaoPorpocional`, `nmCandidatoMajoritario`, `nmColigacaoMajoritaria`, 
 `numCandMajoritario`, `CNPJMajoritario` ) VALUES
('nmPessoa', 'dtNascimento', 'CPF', 'RG', 'email', 'telefone', 'telefoneWhatsapp', 'tpLogradouro', 'logradouro',
'numLogradouro', 'complemento', 'bairro', 'cidade', 'estado', 'isAtivo', 'faceUrl', 'instUrl', 
'nmUsuario', 'senha', 'nmCandidato', 'CNPJCampanha', 'siglaPartido', 'numCandidato',
 'nmColigacaoPorpocional', 'nmCandidatoMajoritario', 'nmColigacaoMajoritaria', 
 'numCandMajoritario', 'CNPJMajoritario')";
$stmt = $con->prepare($sql);
$result=$stmt->execute();

if ($result) {
  var_dump($stmt->errorInfo());

}
echo $stmt->rowCont() . "Linhas inseridas"; 





}
?>