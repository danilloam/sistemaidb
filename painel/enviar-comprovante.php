<?phpinclude("configuracao.php");include("conexao/conecta.php");$id=$_GET["id"];$igreja_id=$_GET["c"];$selectrelatorio1 = mysqli_query($conecta,"SELECT * FROM relatorio_financeiro WHERE igreja_id={$igreja_id} and id={$id}");$resultadorelatorio1= mysqli_fetch_array($selectrelatorio1);$saidas_regiao=$resultadorelatorio1['saida_regiao_dizimo']+$resultadorelatorio1['saida_regiao_of_culto']+$resultadorelatorio1['saida_regiao_of_missoes']+$resultadorelatorio1['saida_regiao_of_construcao']+$resultadorelatorio1['saida_regiao_ent_especiais']+$resultadorelatorio1['saida_regiao_outros']+$resultadorelatorio1['saida_regiao_esc_dominical']+$resultadorelatorio1['saida_regiao_minist_feminino']+$resultadorelatorio1['saida_regiao_minist_masculino']+$resultadorelatorio1['saida_regiao_minist_juvenil']+$resultadorelatorio1['saida_regiao_dep_infantil']+$resultadorelatorio1['saida_regiao_dep_missoes'];?><div id="main-content">			<!-- BEGIN PAGE CONTAINER-->			<div class="container-fluid">				<!-- BEGIN PAGE HEADER-->								<div class="row-fluid">					<div class="span12">						<div class="span6">						<!-- BEGIN PAGE TITLE & BREADCRUMB-->						<h3 class="page-title">							Sistema de Gest&atilde;o							<small> Igreja de Deus no Brasil </small>						</h3>						<ul class="breadcrumb">							<li>                                <a href="index.php?view=home"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>							</li>                           <li><a href="index.php?view=igrejas">Relat&oacute;rio</a><span class="divider-last">&nbsp;</span></li>							<li><a href="index.php?view=igrejas">Enviar Comprovante</a><span class="divider-last">&nbsp;</span></li>						</ul>							</div>						<div class="span6">						</div>						<!-- END PAGE TITLE & BREADCRUMB-->					</div>				</div>				<!-- END PAGE HEADER-->				<!-- BEGIN PAGE CONTENT-->				<div id="page" class="dashboard"><?php if(isset($_POST['ok'])){$pastausuario="comprovantes"; $pasta=$pastausuario."/".$regiao_id."/".$estado_id."/".$igreja_id."/";$target_path = $pasta;if(!file_exists($target_path)) {if(!mkdir($target_path, 0777, true)){die('Failed to create folders...');}} foreach($_FILES["arquivo"]["error"] as $key => $error){ if($error == UPLOAD_ERR_OK){ $tmp_name = $_FILES["arquivo"]["tmp_name"][$key]; $cod = $_FILES["arquivo"][$id][$key]; $nome = $_FILES["arquivo"]["name"][$key]; $uploadfile = $pasta . $nome; $time = time();@$dia=date(d); @$mes=date(m);@$ano=date(Y); $data_envio=$dia."/".$mes."/".$ano; if(move_uploaded_file($tmp_name, $uploadfile)){ $inserir = mysqli_query($conecta,"INSERT INTO pagamentos(relatorio_id, data_envio, status, valor, comprovante, igreja_id, regiao_id) VALUES($id,'$data_envio','VERIFICAR','$saidas_regiao','$nome',$igreja_id,$regiao_id)");$update = mysqli_query($conecta,"UPDATE relatorio_financeiro set status='VERIFICANDO' where igreja_id={$igreja_id} and id={$id}")or die(mysqli_error($conecta)) ;echo"<script language=javascript>alert('O comprovante foi enviado com Sucesso!')</script>";echo"<script language=javascript>location.href='index.php?view=relfinanceiro'</script>"; }else{	 echo"<script language=javascript>alert('Erro ao enviar o arquivo')</script>"; } } } } ?>   <form name="enviar" id="enviar" action="" method="post" enctype="multipart/form-data"><div class="row-fluid">               <div class="span12">                  <div class="widget" style="height: 400px;">                        <div class="widget-title">                           <h4><i class="icon-globe"></i>Enviar Comprovante de Dep&oacute;sito para <?php echo UTF8_encode($regiao_nome);?></h4>                                            </div>                        <div class="widget-body">                            <div class="pagetitle">                <h1><i class="icon-upload-alt"></i> Enviar Comprovante</h1>            </div><div class="control-group">                                    <label class="control-label">Enviar para: <?php echo UTF8_encode($regiao_nome); ?></label>                                    <div class="control-group">              <div class="controls">                  <div class="input-prepend">                      <span class="add-on"><i class="icon-money"></i></span>                      <input id="text" type="text" name="vlr"  value="<?php echo "R$ ".transf_real($saidas_regiao);	?>" disabled/>	                  </div>              </div>          </div><div class="controls"> <label class="control-label">Selecione o Comprovante</label>                                        <div class="fileupload fileupload-new" data-provides="fileupload">                                            <div class="input-append">                                                <div class="uneditable-input">                                                    <i class="icon-file fileupload-exists"></i>                                                    <span class="fileupload-preview"></span>                                                </div>                                       <span class="btn btn-file">                                       <span class="fileupload-new">Selecionar Arquivo</span>                                       <span class="fileupload-exists">Limpar</span>                                       <input type="file" name="arquivo[]" class="default" />                                       </span>                                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remover</a>                                            </div>                                        </div>                                    </div>                                </div>                                <div class="form-actions"><input type="submit" class="btn blue" name="ok" value="Enviar"></div> </div></div></div></div></form>                    </div>                   				</div>				<!-- END PAGE CONTENT-->			</div>			<!-- END PAGE CONTAINER-->		</div>	