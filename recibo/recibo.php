<? include('../sistema/conecta/conexao.php');





$firma='DANILLO ALMEIDA MARQUES';
$cnpj_cgc_firma='076.465.474-84';
$entidade='';
$logomarca='https://www.sistemaidb.com.br/images/logo.webp';

$nome_devedor='Igreja de Deus no Brasil - UR11';
$cpf_cnpj_devedor='19.035.983/0001-20';
$endereco='';
$valor_devedor='100,00';
$valor_extenso_devedor='Cem Reais';
$referente='acesso ao sistema e todas as suas funcionalidades no m&ecirc;s de Maio';
$final='estando quitado o d&eacute;bito referido a esta data';
$dia_pagamento='11';
$mes_pagamento='05';
$ano_pagamento='2022';
$cidade='Jabaot&atilde;o dos Guararapes';
$estado='PE';


?>
<link rel="stylesheet" type="text/css" href="style.css">
<title><?php echo $firma; ?></title>

<h1 align="center"><img src="<?php echo $logomarca; ?>" alt="<?php echo $firma; ?> - <?php echo $entidade; ?>" width="400"></h1>
<h1 align="center"><font style="font-family:Verdana, Arial, Helvetica, sans-serif">RECIBO</font></h1>
<p align="center"><font style="font-family:Verdana, Arial, Helvetica, sans-serif"><?php echo $firma; ?><br /><?php echo $entidade; ?><br />CPF: <?php echo $cnpj_cgc_firma; ?></font></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align="right"><font style="font-family:Verdana, Arial, Helvetica, sans-serif">RECIBO: R$ <?php echo $valor_devedor; ?></font></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font style="font-family:Verdana, Arial, Helvetica, sans-serif">Recebemos de (a) <strong><?php echo $nome_devedor; ?></strong> portador (a) do CPF/CNPJ: <strong><?php echo $cpf_cnpj_devedor; ?></strong>, a import&acirc;ncia de R$ <strong><?php echo $valor_devedor; ?></strong> (<?php echo $valor_extenso_devedor; ?>) referente ao <strong><?php echo $referente; ?></strong>, <?php echo $final; ?>.</font></p>
<p align="right"><font style="font-family:Verdana, Arial, Helvetica, sans-serif"><?php echo $endereco; ?></font></p>
<p>&nbsp;</p>
<p align="center"><font style="font-family:Verdana, Arial, Helvetica, sans-serif"><?php echo $cidade; ?> - <?php echo $estado; ?>, <?php echo $dia_pagamento; ?>/<?php echo $mes_pagamento; ?>/<?php echo $ano_pagamento; ?>.</font></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align="center">________________________________________<br /><font style="font-family:Verdana, Arial, Helvetica, sans-serif"><?php echo $firma; ?></font></p>