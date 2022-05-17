<?php
	
error_reporting(0);

ini_set("display_errors", 0 );
	require_once('conn.php');
	$user = isset($_GET['user']) ? $_GET['user'] : '';
	$emp_id = isset($_GET['emp']) ? $_GET['emp'] : '';
	$opcao = isset($_GET['opcao']) ? $_GET['opcao'] : '';
	$valor = isset($_GET['valor']) ? $_GET['valor'] : '';
	$valor1 = isset($_GET['valor1']) ? $_GET['valor1'] : '';
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
				case 'pastores':
			{
				echo getPastores($valor);
				break;
			}
				case 'evangelistas':
			{
				echo getEvangelistas($valor);
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
			case 'historicoigrejas':
			{
			    echo gethistoricoigrejas($valor);
			    break;
		    }
		    	case 'historicopastores':
			{
			    echo gethistoricopastores($valor);
			    break;
		    }
		    	case 'pastoresestado':
		    {
			    echo getpastoresestado($valor);
			    break;
		    }
		    	case 'evangelistasestado':
		    {
			    echo getevangelistasestado($valor);
			    break;
		    }
		case 'igrejasestado':
		    {
			    echo getigrejasestado($valor);
			    break;
		    }
		 case 'estadoregiao':
		    {
			    echo getestadoregiao($valor,$valor1);
			    break;
		    }
		  case 'eventoslocal':
		      {
		      echo getEventosLocal($valor);
		      break;
		          
		      }
		      case 'igrejas':
		          {
		              getigrejas($valor);
		              break;
		          }
		          case 'genealogia':
		              
		              {
		                  getGenealogia($valor);
		                  break;
		              }
	    }
	}
		function getEventosLocal($id){
		$pdo = Conectar();
		$sql = "SELECT * FROM events e INNER JOIN lider l ON e.ministerio=l.id WHERE e.area = 1 and e.igreja_id=?";
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $id);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;
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
		$sql = "SELECT p.id,CONCAT( p.nome, ' ', p.sobrenome ) AS nome, p.data_nascimento, FLOOR(DATEDIFF(NOW(), p.data_nascimento) / 365) AS idade, p.celular1, p.sexo, p.funcao from pessoa p INNER JOIN estado e ON e.id=p.estado  where status='ativo' and p.igreja_id=? ORDER BY p.nome asc";
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $id);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;

	}
	function getGenealogia($id){
	    
	   
	    $pdo = Conectar();
		$sql = " SELECT * FROM arvore_genealogica a inner join pessoa p on a.pessoa_ant=p.id WHERE a.pessoa_id=?";
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $id);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;
	}
	function getPastores($id){
		 $pdo = Conectar();
		$sql = "SELECT p.id, CONCAT( p.nome, ' ', p.sobrenome ) AS nome, p.data_nascimento, FLOOR(DATEDIFF(NOW(), p.data_nascimento) / 365) AS idade, p.celular1, p.sexo, p.funcao, e.uf from pessoa p INNER JOIN estado e ON p.estado=e.id  where status='ativo' and p.funcao='pastor' and p.regiao_id=? ORDER BY p.nome asc";
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $id);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;

	}
	function getEvangelistas($id){
		 $pdo = Conectar();
		$sql = "SELECT CONCAT( p.nome, ' ', p.sobrenome ) AS nome, p.data_nascimento, FLOOR(DATEDIFF(NOW(), p.data_nascimento) / 365) AS idade, p.celular1, p.sexo, p.funcao, e.uf from pessoa p INNER JOIN estado e ON p.estado=e.id  where status='ativo' and p.funcao='evangelista' and p.regiao_id=? ORDER BY p.nome asc";
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
	function getigrejasestado($id){
		 $pdo = Conectar();
		$sql = "SELECT  * from igreja i where i.estado_id=?";
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $id);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;

	}
		function getpastoresestado($id){
		 $pdo = Conectar();
		$sql = "SELECT p.id, CONCAT( p.nome, ' ', p.sobrenome ) AS nome, p.data_nascimento, FLOOR(DATEDIFF(NOW(), p.data_nascimento) / 365) AS idade, p.celular1, p.sexo, p.funcao, e.uf from pessoa p INNER JOIN estado e ON p.estado=e.id  where status='ativo' and p.funcao='pastor' and p.estado=? ORDER BY p.nome asc";
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $id);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;

	}
	function getevangelistasestado($id){
		 $pdo = Conectar();
		$sql = "SELECT CONCAT( p.nome, ' ', p.sobrenome ) AS nome, p.data_nascimento, FLOOR(DATEDIFF(NOW(), p.data_nascimento) / 365) AS idade, p.celular1, p.sexo, p.funcao, e.uf from pessoa p INNER JOIN estado e ON p.estado=e.id  where status='ativo' and p.funcao='evangelista' and p.estado=? ORDER BY p.nome asc";
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $id);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;

	}

		function getestadoregiao($estado,$regiao){
		 $pdo = Conectar();
		$sql = "SELECT * from estado e where e.id=? and regiao_id=?";
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $estado);
		$stm->bindValue(2, $regiao);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;

	}
		function getigrejas($regiao){
		 $pdo = Conectar();
		$sql = "SELECT * FROM `igreja` i INNER JOIN
   estado e ON i.estado_id = e.id  where i.igreja_id is NULL order by i.nome";
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $regiao);
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
	function gethistoricoigrejas($id){
	    	$pdo = Conectar();
		$sql = 'SELECT i.apelido, ip.dt_inicio,ip.dt_final FROM igreja_pastores ip INNER JOIN igreja i ON i.id = ip.igreja_id where ip.pastor_id=? ORDER BY ip.dt_inicio DESC';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $id);
		$stm->execute();
		sleep(1);
		echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		$pdo = null;
	    
	}
		function gethistoricopastores($id){
	    	$pdo = Conectar();
		$sql = 'SELECT p.id,  ip.dt_inicio, ip.dt_final, pes.nome, pes.sobrenome FROM igreja_pastores ip INNER JOIN pastor p ON p.id = ip.pastor_id INNER JOIN pessoa pes ON p.membro_id= pes.id where ip.igreja_id=? ORDER BY ip.dt_inicio DESC';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $id);
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