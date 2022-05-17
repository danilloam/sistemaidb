<?php
	
error_reporting(0);

ini_set("display_errors", 0 );
	require_once('conn.php');
	$user = isset($_GET['user']) ? $_GET['user'] : '';
	$emp_id = isset($_GET['emp']) ? $_GET['emp'] : '';
	$opcao = isset($_GET['opcao']) ? $_GET['opcao'] : '';
	$valor = isset($_GET['valor']) ? $_GET['valor'] : '';
	if (! empty($opcao)){
		switch ($opcao)
		{
			case 'empresas':
			{
				echo getEmpresas();
				break;
			}
			case 'pessoas':
			{
				echo getPessoas($valor);
				break;
			}
			case 'congregacoes':
			{
				echo getCongregacoes($valor);
				break;
			}
			case 'empresa':
			{
				echo getEmpresa($valor);
				break;
			}
			case 'tema':
			{
				echo getFilterTemas($valor);
				break;
			}
			case 'subtema':
			{
				echo getFilterSubtema($valor);
				break;
			}
			case 'usuario':
			{
				echo getUsuario($valor);
				break;
			}
			case 'post':
			{
				echo getPost($valor);
				break;
			}
			case 'posts':
			{
				echo getPosts();
				break;
			}
				case 'contas':
			{
				echo getContas($valor);
				break;
			}
			case 'informacoesusuario':
			{
				echo getInformacoesUsuarios($valor);
				break;
			}
			case 'cursos':
			{
				echo getCursos($valor);
				break;
			}
			case 'areas':
			{
				echo getMaterias($valor);
				break;
			}
			case 'materia':
			{
				echo getMateria($valor);
				break;
			}
			case 'seguindoe':
			{
				echo getSeguindoEmpresas($valor);
				break;
			}
			case 'seguindop':
			{
				echo getSeguindoPessoas($valor);
				break;
			}
			case 'seguindoesc':
			{
				echo getSeguindoEmpresa($valor,$user);
				break;
			}
			case 'qtdmodelos':
			{
				echo getQtdModelos($valor);
				break;
			}
			
			case 'modelosempresa':
			{
				echo getQtdModelosEmpresa($valor);
				break;
			}
			case 'seguidoresempresa':
			{
				echo getQtdSeguidoresEmpresa($valor);
				break;
			}
			case 'compromissosdia':
			{
				echo getCompromissosDia($valor);
				break;
			}
			case 'docrecepcionados':
			{
				echo getDocumentosRecepcionados($valor,$emp_id);
				break;
			}
			case 'pontuacao':
			{
				echo getPontuacao($valor);
				break;
			}
		}
	}
	
	function getEmpresas(){
		$pdo = Conectar();
		$sql = "SELECT * FROM `escritorio` WHERE `ativa` = 1";
		$stm = $pdo->prepare($sql);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;
	}
		function getPessoas($id){
		 $pdo = Conectar();
		$sql = "SELECT id,CONCAT( nome, ' ', sobrenome ) AS nome, dataNascimento, FLOOR(DATEDIFF(NOW(), data_nascimento) / 365) AS idade, telefone,celular1,celular2, sexo, funcao from pessoa where status='ativo' and igreja_id=?";
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $id);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;

	}
		function getCongregacoes($id){
		 $pdo = Conectar();
		$sql = "SELECT * from igreja where igreja_id=?";
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $id);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;

	}
	function getContas($id){
		 $pdo = Conectar();
		$sql = "SELECT * from contas_igreja where igreja_id=?";
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $id);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;

	}
	function getSeguindoEmpresas($id){
		$pdo = Conectar();
		$sql = 'SELECT id_escritorio FROM seguir WHERE id_usuario=?';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $id);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;
	}
	function getSeguindoEmpresa($id, $user){
		$pdo = Conectar();
		$sql = 'SELECT id_escritorio FROM seguir WHERE id_usuario='.$user.' and id_escritorio=?';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $id);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;
	}
	function getSeguindoPessoas($id){
		$pdo = Conectar();
		$sql = 'SELECT id_seguido FROM seguir WHERE id_usuario=?';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $id);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;
	}
	function getMaterias(){
		$pdo = Conectar();
		$sql = "SELECT * FROM `areas`";
		$stm = $pdo->prepare($sql);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;
		
	}
	function getMateria($id){
		$pdo = Conectar();
		$sql = "SELECT * FROM `areas` where id=?";
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $id);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;
		
	}
	function getEmpresa($id){
		$pdo = Conectar();
		$sql = 'SELECT * FROM escritorio WHERE id=?';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $id);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;
	}
	function getQtdModelos($id){
		$pdo = Conectar();
		$sql = 'SELECT count(id) as total FROM `artigos` WHERE `tipo`=3 and `usuario_id`=?';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $id);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;
	}
	
	function getQtdModelosEmpresa($id){
		$pdo = Conectar();
		$sql = 'SELECT count(id) as total FROM `artigos` WHERE `tipo`=3 and `empresa`=?';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $id);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;
	}
	function getQtdSeguidoresEmpresa($id){
		$pdo = Conectar();
		$sql = 'SELECT count(id) as total FROM `seguir` WHERE `id_escritorio`=?';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $id);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;
	}	
	
	
	function getCursos(){
		$pdo = Conectar();
		$sql = "SELECT * FROM `cursos`";
		$stm = $pdo->prepare($sql);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;
	}
	
	
	
	function getFilterTemas($grupo_id){
		$pdo = Conectar();
		$sql = 'SELECT id, descricao  FROM tema WHERE tema_id=0 and area_id=?';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $grupo_id);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;
	}
	function getFilterSubtema($tema_id){
		$pdo = Conectar();
		$sql = 'SELECT id, descricao  FROM tema WHERE  tema_id=?';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $tema_id);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;
	}
	
	function getUsuario($id){
		$pdo = Conectar();
		$sql = 'SELECT nome,sobrenome FROM `pessoa` WHERE id=?';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $id);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;
	}
	function getPontuacao($id){
		$pdo = Conectar();
		$sql = "select sum(valor) as total from pontuacao where data BETWEEN '20210517' AND '".date('Ymd')."' and user_id=?";
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $id);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;
	}
	function getPost($id){
		$pdo = Conectar();
		$sql = 'SELECT * FROM `artigos` where id=?';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $id);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;
	}
	function getPosts(){
		$pdo = Conectar();
		$sql = 'SELECT * FROM `artigos` ORDER BY `criado` ASC';
		$stm = $pdo->prepare($sql);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;
	}
	function getInformacoesUsuarios($id){
		$pdo = Conectar();
		$sql = 'select value from wp_bp_xprofile_data where field_id=3 and user_id=?';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $id);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;
	}
	
	
	function getCompromissosDia($id){

		$pdo = Conectar();
		$sql = "SELECT id FROM `events` WHERE `start`like '".date('Y-m-d')."%' and usuario_id=?";
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $id);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;
	}
	
		function getDocumentosRecepcionados($id,$emp_id){
if($id>0){
		$pdo = Conectar();
		$sql = "SELECT * FROM documentos where escritorio_id=".$emp_id." and status='Pendente' and materia_id=?";
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $id);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;
}else{
$pdo = Conectar();
		$sql = "SELECT * FROM documentos where escritorio_id=? and status='Pendente'";
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $emp_id);
		
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;
}
	}
?>