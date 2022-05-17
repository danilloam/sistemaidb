
<?php
function Conectar(){
	try{
		$opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
		$con = new PDO("mysql:host=50.62.137.49; dbname=sistemaidb;", "sistemaidb", "@K3f7b9h1T7a3k9w2y", $opcoes);
		return $con;
	} catch (Exception $e){
		echo 'Erro: '.$e->getMessage();
		return null;
	}
}
?>
