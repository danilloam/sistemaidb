<?php

include("conexao/conecta.php");

//Receber a requisão da pesquisa 
$requestData= $_REQUEST;

//Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
$columns = array( 
	0 =>'nome', 
	1 =>'sobrenome',
	2 => 'sexo',
	3 => 'funcao'
);

//Obtendo registros de número total sem qualquer pesquisa
$result_user = "SELECT * FROM pessoa where igreja_id=1 and status='ativo'";
$resultado_user =mysqli_query($conecta, $result_user);
$qnt_linhas = mysqli_num_rows($resultado_user);

//Obter os dados a serem apresentados

if( !empty($requestData['search']['value']) ) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_usuarios = "SELECT * FROM pessoa where igreja_id=1 and status='ativo'";
	$result_usuarios.=" AND ( nome LIKE '".$requestData['search']['value']."%' ";  
	$result_usuarios.=" OR sobrenome LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR sexo LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR funcao LIKE '".$requestData['search']['value']."%' )";
	
}else{
$result_usuarios = "SELECT * from pessoa WHERE igreja_id=1 and status='ativo'";	
}

$resultado_usuarios=mysqli_query($conecta, $result_usuarios);
$totalFiltered = mysqli_num_rows($resultado_usuarios);
//Ordenar o resultado
$result_usuarios.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$resultado_usuarios=mysqli_query($conecta, $result_usuarios);

// Ler e criar o array de dados
$dados = array();
while( $row_usuarios =mysqli_fetch_array($resultado_usuarios) ) {  
	$dado = array(); 
	$dado[0] = $row_usuarios["nome"];
	$dado[1] = $row_usuarios["sobrenome"];
	$dado[2] = $row_usuarios["sexo"];	
	$dado[3] = $row_usuarios["funcao"];	
	$dados[] = $dado;
}


//Cria o array de informações a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval( $requestData['draw'] ),//para cada requisição é enviado um número como parâmetro
	"recordsTotal" => intval( $qnt_linhas ),  //Quantidade de registros que há no banco de dados
	"recordsFiltered" => intval( $totalFiltered ), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 
);

echo json_encode($json_data);  //enviar dados como formato json
