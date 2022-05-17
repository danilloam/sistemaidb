<?php
          $hostname_conecta = "50.62.137.49";
				$database_conecta = "sistemaidb";
				$username_conecta = "sistemaidb";
				$password_conecta = "@K3f7b9h1T7a3k9w2y";	
				
$conecta = mysqli_connect($hostname_conecta, $username_conecta, $password_conecta, $database_conecta);


function mes_anterior($mes){

if($mes == "1"){
$mes_ref="12";
$mes_nome="Dezembro";
$ano_ref=date("Y")-1;
}else{
$mes_ref=date("m")-1;
$ano_ref=date("Y");

if($mes_ref==1){
$mes_nome="Janeiro";
}else if($mes_ref==2){
$mes_nome="Fevereiro";
}if($mes_ref==3){
$mes_nome="Mar&ccedil;o";
}else if($mes_ref==4){
$mes_nome="Abril";
}if($mes_ref==5){
$mes_nome="Maio";
}else if($mes_ref==6){
$mes_nome="Junho";
}if($mes_ref==7){
$mes_nome="Julho";
}else if($mes_ref==8){
$mes_nome="Agosto";
}if($mes_ref==9){
$mes_nome="Setembro";
}else if($mes_ref==10){
$mes_nome="Outubro";
}if($mes_ref==11){
$mes_nome="Novembro";
}else if($mes_ref==12){
$mes_nome="Dezembro";
}
}
return $mes_nome."/".$ano_ref;
}

	function anti_injection($sql)

	{
            $hostname_conecta = "50.62.137.49";
				$database_conecta = "sistemaidb";
				$username_conecta = "sistemaidb";
				$password_conecta = "@K3f7b9h1T7a3k9w2y";	
				
$conecta = mysqli_connect($hostname_conecta, $username_conecta, $password_conecta, $database_conecta);

	// remove palavras que contenham sintaxe sql

	$sql = preg_replace("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|s\\\\_-=.,}~^)/i", '', $sql);

	$sql = mysqli_real_escape_string($conecta,$sql);

	$sql = strip_tags($sql);//tira tags html e php

	$sql = addslashes($sql);//Adiciona barras invertidas a uma string

	return $sql;

	}


function enviar_sms($mensagem,$destinatario,$key){

$msgEncoded = urlencode($mensagem); 	
$urlChamada = "http://api.facilitamovel.com.br/api/simpleSend.ft?user=sistemaidb&password=@K3f7b9h1&externalkey=".$key."&destinatario=".$destinatario."&msg=".$msgEncoded; 
$retorno=file_get_contents($urlChamada);
$lista = explode(";", $retorno);
return $lista[1];
}

function status_credito(){
    $urlChamada = "http://api.facilitamovel.com.br/api/checkCredit.ft?user=sistemaidb&password=@K3f7b9h1";
    $retorno=file_get_contents($urlChamada);
 $lista = explode(";", $retorno);
return $lista[1];   
}
function status_sms($key){
    
$urlChamada = "http://api.facilitamovel.com.br/api/dlrByExternalKey.ft?user=sistemaidb&password=@K3f7b9h1&externalkey=".$key;
$retorno=file_get_contents($urlChamada);
$lista = explode(";", $retorno);
return $lista[1];
}



function deixarNumero($string){
  return preg_replace("/[^0-9]/", "", $string);
}

	function transf_moeda($moeda)

	{

	$valor = str_replace("." , "" , $moeda ); // Primeiro tira os pontos

	$valor1 = str_replace("," , "." , $valor); // Depois tira a vírgula

	return $valor1;

	}

	

	function transf_real($moeda)

	{

	$valor1=number_format($moeda, 2, ',', '.');

	return $valor1;

	}

	function transforma_banco($moeda)

	{

	$valor = str_replace("," , "" , $moeda );

	return $valor;

	}

	

	function valor_regiao($moeda)

	{

	$valor= $moeda*15/100;

	

	return number_format($valor, 2);

	}

	

	function valor_regiao_of_missoes($moeda)

	{

	$valor= $moeda*60/100;

	return number_format($valor, 2);

	}

	

	function valor_dep_regiao($moeda)

	{

	$valor= $moeda*10/100;

	return number_format($valor, 2);

	}


	function prebenda($salminimo)

	{
          $hostname_conecta = "50.62.137.49";
				$database_conecta = "sistemaidb";
				$username_conecta = "sistemaidb";
				$password_conecta = "@K3f7b9h1T7a3k9w2y";	
				
$conecta = mysqli_connect($hostname_conecta, $username_conecta, $password_conecta, $database_conecta);

	    $data=date("Y");
	$selectconfiguracao = mysqli_query($conecta,"SELECT * FROM configuracao WHERE ano=$data");

	$dadosconfiguracao=mysqli_fetch_array($selectconfiguracao);

	$prebenda_id=(int)($salminimo/$dadosconfiguracao['salminimo']);

	if($prebenda_id<=1){

		$prebenda_id_consulta=1;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

	if($prebenda_id>=1 && $prebenda_id<2 ){

		$prebenda_id_consulta=1;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

	if($prebenda_id>=2 && $prebenda_id<3 ){

		$prebenda_id_consulta=2;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

	if($prebenda_id>=3 && $prebenda_id<4 ){

		$prebenda_id_consulta=3;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

	if($prebenda_id>=4 && $prebenda_id<5 ){

		$prebenda_id_consulta=4;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

	if($prebenda_id>=5 && $prebenda_id<6 ){

		$prebenda_id_consulta=5;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

	if($prebenda_id>=6 && $prebenda_id<7 ){

		$prebenda_id_consulta=6;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

	if($prebenda_id>=7 && $prebenda_id<8 ){

		$prebenda_id_consulta=7;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=8 && $prebenda_id<9 ){

		$prebenda_id_consulta=8;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=9 && $prebenda_id<10 ){

		$prebenda_id_consulta=9;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=10 && $prebenda_id<11 ){

		$prebenda_id_consulta=10;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=11 && $prebenda_id<12 ){

		$prebenda_id_consulta=11;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=12 && $prebenda_id<13 ){

		$prebenda_id_consulta=12;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=13 && $prebenda_id<14 ){

		$prebenda_id_consulta=13;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=14 && $prebenda_id<15 ){

		$prebenda_id_consulta=14;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=15 && $prebenda_id<16 ){

		$prebenda_id_consulta=15;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=16 && $prebenda_id<17 ){

		$prebenda_id_consulta=16;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=17 && $prebenda_id<18 ){

		$prebenda_id_consulta=17;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=18 && $prebenda_id<19 ){

		$prebenda_id_consulta=18;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=19 && $prebenda_id<20 ){

		$prebenda_id_consulta=19;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=20 && $prebenda_id<21 ){

		$prebenda_id_consulta=20;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=21 && $prebenda_id<22 ){

		$prebenda_id_consulta=21;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=22 && $prebenda_id<23 ){

		$prebenda_id_consulta=22;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=23 && $prebenda_id<24 ){

		$prebenda_id_consulta=23;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=24 && $prebenda_id<25 ){

		$prebenda_id_consulta=24;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=25 && $prebenda_id<26 ){

		$prebenda_id_consulta=25;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=26 && $prebenda_id<27 ){

		$prebenda_id_consulta=26;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=27 && $prebenda_id<28 ){

		$prebenda_id_consulta=27;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=28 && $prebenda_id<29 ){

		$prebenda_id_consulta=28;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=29 && $prebenda_id<30 ){

		$prebenda_id_consulta=29;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=30 && $prebenda_id<31 ){

		$prebenda_id_consulta=30;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=31 && $prebenda_id<32 ){

		$prebenda_id_consulta=31;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=32 && $prebenda_id<33 ){

		$prebenda_id_consulta=32;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=33 && $prebenda_id<34 ){

		$prebenda_id_consulta=33;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=34 && $prebenda_id<35 ){

		$prebenda_id_consulta=34;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=35 && $prebenda_id<36 ){

		$prebenda_id_consulta=35;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=36 && $prebenda_id<37 ){

		$prebenda_id_consulta=36;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=37 && $prebenda_id<38 ){

		$prebenda_id_consulta=37;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=38 && $prebenda_id<39 ){

		$prebenda_id_consulta=38;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=39 && $prebenda_id<40 ){

		$prebenda_id_consulta=39;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=40 && $prebenda_id<41 ){

		$prebenda_id_consulta=40;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=41 && $prebenda_id<42 ){

		$prebenda_id_consulta=41;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=42 && $prebenda_id<43 ){

		$prebenda_id_consulta=42;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=43 && $prebenda_id<44 ){

		$prebenda_id_consulta=43;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=44 && $prebenda_id<45 ){

		$prebenda_id_consulta=44;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=45 && $prebenda_id<46 ){

		$prebenda_id_consulta=45;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=46 && $prebenda_id<47 ){

		$prebenda_id_consulta=46;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=47 && $prebenda_id<48 ){

		$prebenda_id_consulta=47;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=48 && $prebenda_id<49 ){

		$prebenda_id_consulta=48;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=49 && $prebenda_id<50 ){

		$prebenda_id_consulta=49;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}else

		if($prebenda_id>=50 ){

		$prebenda_id_consulta=50;

			$selectprebenda = mysqli_query($conecta,"SELECT * FROM prebenda WHERE id=$prebenda_id_consulta");

	$dadosprebenda=mysqli_fetch_array($selectprebenda);

	$prebenda=($salminimo*$dadosprebenda['indice']);

	}

	return number_format($prebenda, 2);

	}

	function valor_maximo($saldo,$entrada,$regiao)

	{

		$valor_entrada=$saldo+$entrada;

		$valor_saida=$regiao;

		$valor_restante=$valor_entrada-$valor_saida;

		return $valor_restante;

	}

# CALCULA TOTAL
function calculatotal($campo,$tabela,$filtro) {
    include 'mysql.php'; 
	$query1 = mysqli_query($link,"SELECT SUM($campo) AS soma FROM $tabela $filtro")or die(mysqli_error());
	$cont1 = mysqli_fetch_array($query1,MYSQLI_ASSOC);
	return $cont1["soma"];
		
}

#anti mysqli_
function anti_mysqli_($sql) {
    $sql = mysqli_real_escape_string($sql);
    return $sql;
}
#CALCULA DIAS
function calculadias($data_inicial,$data_final)
{

	// Usa a função strtotime() e pega o timestamp das duas datas:
	$time_inicial = strtotime($data_inicial);
	$time_final = strtotime($data_final);
	
	// Calcula a diferença de segundos entre as duas datas:
	$diferenca = $time_final - $time_inicial; // 19522800 segundos
	
	// Calcula a diferença de dias
	$dias = (int)floor( $diferenca / (60 * 60 * 24)); // 225 dias
	
	// Exibe uma mensagem de resultado:
	return $dias;

}

#FORMATA CPF OU CNPJ
function cnpjcpf($cnpj)
{
	if (strlen($cnpj) == 15)
	{
		$p1 = substr($cnpj, 0, 3);
		$p2 = substr($cnpj, 3, 3);
		$p3 = substr($cnpj, 6, 3);
		$p4 = substr($cnpj, 9, 4);
		$p5 = substr($cnpj, -2);
		
		return $p1.'.'.$p2.'.'.$p3.'/'.$p4.'-'.$p5;
	}
	else if (strlen($cnpj) == 11)
	{
		
		$p1 = substr($cnpj, 0, 3);
		$p2 = substr($cnpj, 3, 3);
		$p3 = substr($cnpj, 6, 3);
		$p4 = substr($cnpj, -2);
		
		return $p1.'.'.$p2.'.'.$p3.'-'.$p4;
	}
	

}

#chama campo
function chamacampo($tabela,$campo,$id)
{
    include 'mysql.php';
	// CONSULTA CLIENTE
	$consulta_cliente = mysqli_query($link,"SELECT $campo FROM $tabela WHERE id='$id'") or die (mysqli_error());
	$n_cliente = mysqli_fetch_array($consulta_cliente,MYSQLI_ASSOC);

	return utf8_encode($n_cliente[''.$campo.'']);	
}
#select
function select($tp,$tabela,$campo,$titulo,$class,$id)
{
    include 'mysql.php';
	$selected = '  <select name="'.$campo.'" id="'.$campo.'" class="'.$class.' span12">';
	
	if ($tp == 'edit' || $tp == 'ver' || $tp == 'copia')
	{
		
		$consulta_selected1 = mysqli_query($link,"SELECT * FROM $tabela WHERE id='$id'") or die (mysqli_error());
		$n_selected1  = mysqli_fetch_array($consulta_selected1,MYSQLI_ASSOC);
		
		$id_selected1	 = $n_selected1['id'];
		$nome_selected1 = utf8_encode($n_selected1[''.$titulo.'']);
		
		$selected .=  '
		<option value="'.$id_selected1.'" selected="selected">'.$nome_selected1.'</option>
		<option value="">---</option>';
		
	}
	else if ($tp == 'add')
	{ 
		$selected .=  '
		<option value="" selected="selected">Selecione</option>';
	}
	
	// LISTAGEM DE FILIAIS EM ADD
	$sql = "SELECT * FROM $tabela ORDER BY $titulo";
	//echo $sql;
	$consulta_selected = mysqli_query($link,$sql) or die (mysqli_error($link));
	while($n_selected  = mysqli_fetch_array($consulta_selected,MYSQLI_ASSOC))
	{
		
		$id_selected	 = $n_selected['id'];
		$nome_selected = utf8_encode($n_selected[''.$titulo.'']);
		
		$selected .=  '
		<option value="'.$id_selected.'">'.$nome_selected.'</option>';
	
	}
	$selected .=  '
	</select>';
	
	return $selected;
	
		
}
#select
function select2($tp,$tabela,$campo,$titulo,$class,$id,$filtro)
{
	include 'mysql.php';
	$selected = '  <select name="'.$campo.'" id="'.$campo.'" class="'.$class.' span12">';
	
	if ($tp == 'edit' || $tp == 'ver' || $tp == 'copia')
	{
		
		$consulta_selected1 = mysqli_query($link,"SELECT * FROM $tabela WHERE id='$id'") or die (mysqli_error());
		$n_selected1  = mysqli_fetch_array($consulta_selected1,MYSQLI_ASSOC);
		
		$id_selected1	 = $n_selected1['id'];
		$nome_selected1 = utf8_encode($n_selected1[''.$titulo.'']);
		
		$selected .=  '
		<option value="'.$id_selected1.'" selected="selected">'.$nome_selected1.'</option>
		<option value="">---</option>';
		
	}
	else if ($tp == 'add')
	{ 
		$selected .=  '
		<option value="" selected="selected">Selecione</option>';
	}
	
	// LISTAGEM DE FILIAIS EM ADD
	$sql = "SELECT * FROM $tabela $filtro ORDER BY $titulo";
	$consulta_selected = mysqli_query($link,$sql) or die (mysqli_error());
	while($n_selected  = mysqli_fetch_array($consulta_selected,MYSQLI_ASSOC))
	{
		
		$id_selected	 = $n_selected['id'];
		$nome_selected = utf8_encode($n_selected[''.$titulo.'']);
		
		$selected .=  '
		<option value="'.$id_selected.'">'.$nome_selected.'</option>';
	
	}
	$selected .=  '
	</select>';
	return $selected;
	
		
}
#menu
function menu($modulo,$nome,$icone,$atributos)
{
	return '<li class="sub-menu menu '.$modulo.'">
                  <a href="#'.$modulo.'" onClick="'.$modulo.'(\''.$atributos.'\');" class="">
                      <i class="'.$icone.'"></i>
                      <span>'.$nome.'</span>
                  </a>
              </li>';	
}
#metro nav
function metronav($ancora,$modulo,$nome,$numero,$icone,$cor,$tamanho)
{
	return  '<div class="metro-nav-block nav-block-'.$cor.' '.$tamanho.'">
	<a data-original-title="" href="#'.$ancora.'" onclick="'.$modulo.'(\'\');">
		<i class="'.$icone.'"></i>
		<div class="info">'.$numero.'</div>
		<div class="status">'.$nome.'</div>
	</a>
</div>';
}

#NUMERO NA TABELA
function numeroentradas($tabela,$filtro)
{
	include 'mysql.php';
	$sql  = "SELECT * FROM $tabela $filtro";
	$sql1 = mysqli_query($link,$sql) or die('Erro gerado -> '. mysqli_error($link) . '<br/>' .$sql);
	if($sql1){
	$numero = mysqli_num_rows($sql1);
	return $numero;
	}else{
	return 0;
	}
}
#MES POR EXTENÇO
function mesextenco($mes)
{
	switch($mes) {
		case"01": $mes = "Janeiro";	  break;
		case"02": $mes = "Fevereiro"; break;
		case"03": $mes = "Março";	  break;
		case"04": $mes = "Abril";	  break;
		case"05": $mes = "Maio";	  break;
		case"06": $mes = "Junho";	  break;
		case"07": $mes = "Julho";	  break;
		case"08": $mes = "Agosto";	  break;
		case"09": $mes = "Setembro";  break;
		case"10": $mes = "Outubro";	  break;
		case"11": $mes = "Novembro";  break;
		case"12": $mes = "Dezembro";  break;
	}
	return $mes;
}
#MOEDA
function moeda($valor)
{
	return number_format($valor, 2, ',', '.');
}
#MOEDA2
function moeda2($valor)
{
	return number_format($valor, 7, ',', '.');
}
#VIRGULA
function virgula($valor)
{
	return str_replace(".",",",$valor);
}
#PONTO
function ponto($valor)
{
	return str_replace(",",".",$valor);
}
#TIRA SINAL NEGATIVO DE INTEIRO
function negativo($valor)
{
	return str_replace("-","",$valor);
}
#GRAVA NO BANCO TIPO FLOAT
function vfloat($valor)
{
	$array = explode(",",$valor);
	
	$um 	= str_replace(".","",$array[0]);
	
	$novo = $um.'.'.$array[1];
	
	return $novo;
}
#ENTER EM AREA DE TEXTO
function enter($string)
{ 
	$string = str_replace(array("\r\n", "\r", "\n"), "<br>", $string); 
	return $string; 
}
#ENTER EM AREA DE TEXTO
function enter2($string)
{ 
	$string = str_replace('<br>', "\n", $string); 
	return $string; 
}
#SENHA ENCODE
function senha_encode($senha)
{
	return base64_encode(base64_encode(base64_encode(base64_encode($senha))));
	
}
#SENHA DECODE
function senha_decode($senha)
{
	return base64_decode(base64_decode(base64_decode(base64_decode($senha))));
	
}
#DATA BARRA TRAÇO
function data_barra()
{
	return str_replace("/","-",$data);
}
#DATA EUA
function data_eua()
{
	return date("Y-m-d");
}
#DATA BRASIL
function data_br()
{
	return date("d/m/Y");
}
#DATA HORA
function data_hora()
{
	return date("Y-m-d H:i:s");
}
#DATA BRASIL EUA
function data_brasil_eua($data)
{
	$array = explode("/",$data);
	
	return $array[2].'-'.$array[1].'-'.$array[0];
}
#DATA EUA BRASIL
function data_eua_brasil($data)
{
    $data =	(isset($data) ?  $data : Date('Y-m-d'));
	
	$array = explode("-",$data);
	
	return $array[2].'/'.$array[1].'/'.$array[0];
}
#DATA E HORA EUA BRASIL
function data_hora_eua_brasil($data)
{
	$array = explode(" ",$data);
	
	$hora = $array[1];
	
	$array2 = explode("-",$array[0]);
	
	return $array2[2].'/'.$array2[1].'/'.$array2[0].' '.$hora;
}
#DATA E HORA EUA BRASIL
function data_hora_brasil_eua($data1)
{
	$array1 = explode(" ",$data1);
	
	$hora1 = $array1[1];
	
	$array21 = explode("/",$array1[0]);
	
	return $array21[2].'-'.$array21[1].'-'.$array21[0].' '.$hora1;
}

#REMOVER ACENTOS
function remover_acentos($string)
{ 
     // Converte todos os caracteres para minusculo 
     $string = strtolower($string); 
     // Remove os acentos 
     $string = eregi_replace('[aáàãâä]', 'a', $string); 
     $string = eregi_replace('[AÁÀÃÂÄ]', 'A', $string); 
     $string = eregi_replace('[eéèêë]', 'e', $string); 
     $string = eregi_replace('[EÉÈÊË]', 'E', $string);
     $string = eregi_replace('[iíìîï]', 'i', $string); 
     $string = eregi_replace('[oóòõôö]', 'o', $string); 
     $string = eregi_replace('[uúùûü]', 'u', $string); 
     // Remove o cedilha e o ñ 
     $string = eregi_replace('[ç]', 'c', $string); 
     $string = eregi_replace('[ñ]', 'n', $string); 
     // Remove hifens duplos 
     $string = eregi_replace('--', '_', $string); 
     return $string;

}
#TAMANHO AQUIVO
function tamanho($Url)
{
	$N = array('Bytes','KB','MB','GB');
	$Tam = filesize($Url);
	for ($Pos=0;$Tam>=1024;$Pos++) { $Tam /= 1024; }
	return @round($Tam,2)." ".$N[$Pos];
}


?>

