<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cafx | Mensagem</title>
<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" />
	<link href="css/style_responsive.css" rel="stylesheet" />
	<link href="css/style_default.css" rel="stylesheet" id="style_color" />
	<link rel="stylesheet" type="text/css" href="assets/chosen-bootstrap/chosen/chosen.css" />

	<link href="assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css" />
</head>

<body>
<?php
$para=$_GET["login"];
$de=$_GET["user"];
include ("conexao/conecta.php");
$sql=mysql_query("select * from usuarios where login='$para'");
$ver=mysql_fetch_array($sql);

 ?>
<div class="row-fluid">
               <div class="span12">
                  <div class="widget" style="height: 500px;">
                        <div class="widget-title">
                           <h4><i class="icon-globe"></i>Mensagem</h4>                    
                        </div>
                        <div class="widget-body">
                            <div class="pagetitle">
                			<h1><i class="icon-envelope-alt"></i> Enviar Mensagem</h1>
            			</div>
								<form action="compor2.php"	method="post">

                                <div class="control-group">
                                    <label class="control-label">Enviando para: <strong><?php echo $ver["email"]; ?></strong> - <?php echo $ver["nome"]; ?></label>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Assunto</label>
                                    <div class="controls">
                                    	<input type="text"   name="assunto" placeholder="Assunto da mensagem" class="input-xlarge">
                                    </div>
                                </div>
       							<div class="control-group">
                                    <label class="control-label">Mensagem</label>
                                    <div class="controls">
                                    	<textarea  class="input-xxlarge" name="msg" placeholder="Mensagem a ser enviada"></textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="para" value="<?php echo $para; ?>" />
                                <input type="hidden" name="de" value="<?php echo $de; ?>" />
                                <div class="form-actions">
                                    <input type="submit" rows="5" value="Enviar Mensagem" name="ok" class="btn btn-info">
                                </div>
                                	
								</form>
				
</div>
</div>
</div>
</div>

</body>
</html>