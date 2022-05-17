<link rel="stylesheet" type="text/css" href="default.css">
<script src="popup.js" type="text/javascript"></script>

<?php
//############## SystemBoys - Garotos de Sistema ##########

$password="admin"; //senha

//#########################################################
if(!isset($passwd) or $passwd!=$password){
echo "<table width=\"303\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" height=\"169\" bgcolor=\"#336699\" align=\"center\"><tr><td bgcolor=\"#336699\" height=\"110\"> 
<table width=\"311\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"#FFFFCC\" height=\"136\">
<tr><td height=\"175\"><div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\"><b><font size=\"2\">Administração</font></b></font><br>
</div><form name=\"form1\" method=\"post\" action=\"$PHP_SELF\"><div align=\"center\">
<input type=\"password\" name=\"passwd\" value=\"$password\"><br><input type=\"submit\" name=\"Submit\" value=\"Entrar\">
</div></form></td></tr></table></td></tr></table>";

}elseif ($passwd==$password){
if (isset($submit)){
$fp=fopen($datafile, "w");
fputs($fp, $question."\n");
for($i=1; $i <=10; $i++){
if($answer[$i]==""){ break;}
$input=$answer[$i]."][".$image[$i]."][".$votes[$i]."\n";
fputs($fp, $input);
}
fclose($fp);
$config="<?php\n";
$config.="/*\n";
$config.="SystemBoys - Garotos de Sistema\n";
$config.="http://www.systemboys.com.br\n";
$config.="Marcos Aurélio R. Silva\n";
$config.="systemboy_marcos@hotmail.com\n";
$config.="*/\n";
$config.="\n";
$config.="\$firma='$firma';\n";
$config.="\$cnpj_cgc_firma='$cnpj_cgc_firma';\n";
$config.="\$entidade='$entidade';\n";
$config.="\$logomarca='$logomarca';\n";
$config.="\n";
$config.="\$nome_devedor='$nome_devedor';\n";
$config.="\$cpf_cnpj_devedor='$cpf_cnpj_devedor';\n";
$config.="\$endereco='$endereco';\n";
$config.="\$valor_devedor='$valor_devedor';\n";
$config.="\$valor_extenso_devedor='$valor_extenso_devedor';\n";
$config.="\$referente='$referente';\n";
$config.="\$final='$final';\n";
$config.="\$dia_pagamento='$dia_pagamento';\n";
$config.="\$mes_pagamento='$mes_pagamento';\n";
$config.="\$ano_pagamento='$ano_pagamento';\n";
$config.="\$cidade='$cidade';\n";
$config.="\$estado='$estado';\n";
$config.="?>";
$fp=fopen($ip_file, "w");
fclose($fp);
$fp=fopen("infor.php", "w");
fputs($fp, $config);
fclose($fp);
echo "<div align=\"center\"><b><font face=\"Verdana, Arial, Helvetica, sans-serif\" color=\"#ff0000\"><a href=\"javascript:openpopup('recibo.php')\"><img src=\"visualizar.jpg\" alt=\"Visualizar Recibo\" width=\"80\" height=\"20\" border=\"0\"></a></font></b></div>";
}

include('infor.php');
$data=file($datafile);
$nb=count($data);
?>
<html>
<head>
<title>SystemBoys</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#FF9900" text="#000000" link="#FFFFFF" vlink="#CCCCCC" alink="#CCCCCC">
<table width="400" height="217" border="0" align="center" cellpadding="5" cellspacing="1">
  <tr>
    <td width="496" height="184" valign="top" bgcolor="#FFFFCC"><form name="APP" method="post" action="">
      <p>&nbsp;</p>
      <table width="373" border="0" align="center" cellpadding="1" cellspacing="1">
        <tr bgcolor="#99FF99">
          <td height="22" colspan="2"><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><b>Dados do &quot;RECIBO&quot; </b></font></td>
          </tr>
        <tr bgcolor="#CCFFCC">
          <td width="177" align="right">Nome da Firma:</td>
          <td width="189"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">
            <input type="text" name="firma" maxlength="50" size="30" value="<?php echo $firma; ?>">
          </font></td>
        </tr>
		<tr bgcolor="#CCFFCC">
          <td width="177" align="right">CNPJ ou CGC da Firma:</td>
          <td width="189"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">
            <input type="text" name="cnpj_cgc_firma" maxlength="50" size="30" value="<?php echo $cnpj_cgc_firma; ?>">
          </font></td>
        </tr>
		<tr bgcolor="#CCFFCC">
          <td width="177" align="right">Nome da Entidade:</td>
          <td width="189"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">
            <input type="text" name="entidade" maxlength="50" size="30" value="<?php echo $entidade; ?>">
          </font></td>
        </tr>
		<tr bgcolor="#CCFFCC">
          <td width="177" align="right">Logomarca da firma (pode ser a URL da imagem):</td>
          <td width="189"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">
            <input type="text" name="logomarca" maxlength="50" size="30" value="<?php echo $logomarca; ?>">
          </font></td>
        </tr>
		<tr bgcolor="#CCFFCC">
          <td width="177" align="right" bgcolor="#99FF99">Nome do devedor:</td>
          <td width="189" bgcolor="#99FF99"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">
            <input type="text" name="nome_devedor" maxlength="50" size="30" value="<?php echo $nome_devedor; ?>">
          </font></td>
        </tr>
		<tr bgcolor="#CCFFCC">
          <td width="177" align="right" bgcolor="#99FF99">CPF ou CNPJ do devedor:</td>
          <td width="189" bgcolor="#99FF99"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">
            <input type="text" name="cpf_cnpj_devedor" maxlength="50" size="30" value="<?php echo $cpf_cnpj_devedor; ?>">
          </font></td>
        </tr>
		<tr bgcolor="#CCFFCC">
          <td width="177" align="right" bgcolor="#99FF99">Endereço do devedor:</td>
          <td width="189" bgcolor="#99FF99"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">
            <input type="text" name="endereco" maxlength="50" size="30" value="<?php echo $endereco; ?>">
          </font></td>
        </tr>
		<tr bgcolor="#CCFFCC">
          <td width="177" align="right" bgcolor="#99FF99">Valor do débito:</td>
          <td width="189" bgcolor="#99FF99"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">
            <input type="text" name="valor_devedor" maxlength="50" size="30" value="<?php echo $valor_devedor; ?>">
          </font></td>
        </tr>
		<tr bgcolor="#CCFFCC">
          <td width="177" align="right" bgcolor="#99FF99">Valor do débito por extenço:</td>
          <td width="189" bgcolor="#99FF99"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">
            <input type="text" name="valor_extenso_devedor" maxlength="100" size="30" value="<?php echo $valor_extenso_devedor; ?>">
          </font></td>
        </tr>
		<tr bgcolor="#CCFFCC">
          <td width="177" align="right" bgcolor="#99FF99">Débito referente à:</td>
          <td width="189" bgcolor="#99FF99"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">
            <input type="text" name="referente" maxlength="600" size="30" value="<?php echo $referente; ?>">
          </font></td>
        </tr>
		<tr bgcolor="#CCFFCC">
          <td width="177" align="right" bgcolor="#99FF99">Final do texto:</td>
          <td width="189" bgcolor="#99FF99"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">
            <input type="text" name="final" maxlength="600" size="30" value="<?php echo $final; ?>">
          </font></td>
        </tr>
		<tr bgcolor="#CCFFCC">
          <td width="177" align="right" bgcolor="#99FF99">Data do pagamento:</td>
          <td width="189" bgcolor="#99FF99"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">
            <input type="text" name="dia_pagamento" maxlength="2" size="1" value="<?php echo $dia_pagamento; ?>"> 
            / <input type="text" name="mes_pagamento" maxlength="2" size="1" value="<?php echo $mes_pagamento; ?>"> 
            / <input type="text" name="ano_pagamento" maxlength="4" size="1" value="<?php echo $ano_pagamento; ?>">
          </font></td>
        </tr>
		<tr bgcolor="#CCFFCC">
          <td width="177" align="right" bgcolor="#99FF99">Localidade:</td>
          <td width="189" bgcolor="#99FF99"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">
            Cidade: <input type="text" name="cidade" maxlength="100" size="15" value="<?php echo $cidade; ?>">
            <br />
            Estado: <input type="text" name="estado" maxlength="3" size="2" value="<?php echo $estado; ?>">
          </font></td>
        </tr>
      </table>
      <div align="center">
        <input type="hidden" name="passwd" value="<?php echo $password; ?>">
        <hr width="95%" size="1" align="center" noshade color="#005500">
        <input type="submit" name="submit" value="Salvar">
        <input type="reset" name="Submit2" value="Anterior"><br />
	  </div>
    </form>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php } ?>