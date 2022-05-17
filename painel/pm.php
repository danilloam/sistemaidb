<div id="main-content">
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="span6">
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						<h3 class="page-title">
							Sistema de Gest&atilde;o
							<small> Igreja de Deus no Brasil </small>
						</h3>
						<ul class="breadcrumb">
							<li>
                                <a href="index.php?view=home"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
							</li>
                          
							<li><a href="index.php?view=pm">Mensagens</a><span class="divider-last">&nbsp;</span></li>
						</ul>	
						</div>
						<div class="span6">

						</div>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">
						<div class="alert alert-block alert-success fade in">	
			<p><strong>Essa &eacute; sua caixa de entrada, aqui ficam guardadas todas as mensagens que foram enviadas para você.</strong></p>
		</div>
		<div style="float: right; margin-bottom: 10px;">
									
<a href="index.php?view=pm&act=compose" class="btn btn-info">CRIAR MENSAGEM</a>
</div>
					<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-reorder"></i>Caixa de Mensagem</h4>
								</div>
								<div class="widget-body">
								<table class="table table-bordered table-hover">
                                <thead>

		<tr>
		<th></th>
		<th>Data</th>
		<th>Assunto</th>
		<th>De</th>
		</tr>
		</thead>
		<tbody>
		<?php 
		// BUSCA MSGS
		$msg_query = mysqli_query($conecta,"SELECT * FROM msg WHERE para='{$login}' ORDER BY id DESC");
		while($msg_data = mysqli_fetch_array($msg_query)){
		?>
		
		<tr>
		<td><a href="index.php?view=pm&act=read&msgid=<?php echo $msg_data['id']; ?>"><img src="img/mail_<?php echo $msg_data['status']; ?>.png"></a></td>
		<td><a href="index.php?view=pm&act=read&msgid=<?php echo $msg_data['id']; ?>"><?php echo date("d/m/Y H:i:s", $msg_data['data']); ?></a></td>
		<td><a href="index.php?view=pm&act=read&msgid=<?php echo $msg_data['id']; ?>"><?php echo $msg_data['assunto']; ?></a></td>
		<td><a href="index.php?view=pm&act=read&msgid=<?php echo $msg_data['id']; ?>"><?php echo $msg_data['de']; ?></a></a></td>
		</tr>
		<?php
		}
		?>
		</tbody>
		</table>
		<?php
		if(isset($_GET['act'])){
		if ($_GET['act'] == "read")
		{
		
		$msg_id = mysql_real_escape_string($_GET['msgid']);
		
		$buscamsg = mysqli_query($conecta,"SELECT * FROM msg WHERE id = '$msg_id'");
		$dadosmsg = mysqli_fetch_array($buscamsg);
		
		if ($dadosmsg['para'] != $login) { echo "Essa mensagem não foi enviada para você"; } 
		else
		{
		$update = mysqli_query($conecta,"UPDATE msg SET status='read' WHERE id = '$msg_id'");
		?>
		<br>
		<div class="alert alert-block alert-success fade in">
		<strong>De: <?php echo $dadosmsg['de'];?></strong> ás <strong><?php echo date("d/m/Y H:i:s", $dadosmsg['data']);?></strong><br>
		<strong>Assunto: <?php echo $dadosmsg['assunto'];?></strong><br>
		<strong>Mensagem</strong><br />
		<?php echo nl2br($dadosmsg['texto']);?></div>
		<?php
		}
		
		
		}
		}
		if(isset($_GET['act'])){
		if ($_GET['act'] == "compose")
		{
			
			if(isSet($_POST['para']))
			{
			
			$recebe = mysqli_real_escape_string($_POST['para']);
			$assunto = htmlspecialchars(mysqli_real_escape_string($_POST['assunto']));
			$texto =  htmlspecialchars(mysqli_real_escape_string($_POST['msg']));
			$dt = time();
			$inserir = mysqli_query($conecta,"INSERT INTO msg (id,de,para,assunto,texto,data,status) VALUES (NULL, '$login', '$recebe', '$assunto', '$texto', '$dt', 'unread');") or die (mysql_error());
			
			if ($inserir){
			?>
			<br>
			<div class="alert alert-block alert-success fade in">
			<strong>Sua mensagem foi enviada para <font color=darkred><?php echo $recebe;?></font></strong></div>
		
			<?php
			}
			}
			else
			{
		?>
		<br>
		<div class="alert alert-block alert-success fade in">
		<form method=post>
		<div class="control-group">
                                    <label class="control-label">Para</label>
                                    <div class="controls">
                                    	<input type="text"  name="para" placeholder="Login do destinatário" class="input-xxlarge">
                                    </div>
                                </div>
        <div class="control-group">
                                    <label class="control-label">Assunto</label>
                                    <div class="controls">
                                    	<input type="text"   name="assunto" placeholder="Assunto da mensagem" class="input-xxlarge">
                                    </div>
                                </div>
       <div class="control-group">
                                    <label class="control-label">Mensagem</label>
                                    <div class="controls">
                                    	<textarea cols="82" class="input-xxlarge" name="msg" placeholder="Mensagem a ser enviada"></textarea>
                                    </div>
                                </div>
<div class="form-actions">
                                    <input type="submit" value="Enviar Mensagem" name="ok" class="btn blue">
                                </div>
		</form>
		</div>
		<?php
		}
		}
		}
		?>	
								</div>
							</div>	
					</div>
				</div>
			</div>
</div>				