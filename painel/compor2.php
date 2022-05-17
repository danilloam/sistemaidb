<style>
.alert {
padding: 8px 35px 8px 14px;
margin-bottom: 20px;
text-shadow: 0 1px 0 rgba(255,255,255,0.5);
background-color: #fcf8e3;
border: 1px solid #fbeed5;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px;
}
.alert-danger, .alert-error {
color: #b94a48;
background-color: #f2dede;
border-color: #eed3d7;
}
.alert-block {
padding-top: 14px;
padding-bottom: 14px;
}
.alert {
border-radius: 0;
-moz-border-radius: 0;
-webkit-border-radius: 0;
}
.fade.in {
opacity: 1;
}
</style>
<?php
include ("conexao/conecta.php");

$recebe = mysql_real_escape_string($_POST['para']);
$user = mysql_real_escape_string($_POST['de']);
$assunto = htmlspecialchars(mysql_real_escape_string($_POST['assunto']));
$texto =  htmlspecialchars(mysql_real_escape_string($_POST['msg']));
$dt = time();

$inserir = mysql_query("INSERT INTO msg (de,para,assunto,texto,data,status) VALUES ('$user', '$recebe', '$assunto', '$texto', '$dt', 'unread');") or die (mysql_error());
			

echo"<div class='alert alert-block alert-success fade in'>	
										<p style='font-family:verdana';><strong>Mensagem Enviada com Sucesso!</strong></p>
</div>";
?>