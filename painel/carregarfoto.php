<?php
header('Content-Type: text/html; charset=utf-8');
include("configuracao.php");
include("conexao/conecta.php");
$id=$_GET["id"];
$igreja_id=$_GET["ig"];
$selectmembro = mysqli_query($conecta,"SELECT * FROM pessoa WHERE igreja_id={$igreja_id} and id={$id}");
$resultadomembro= mysqli_fetch_array($selectmembro);$nome_membro=$resultadomembro["nome"];
?>
<div id="main-content">
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<div id="page" class="dashboard">

<?php 
if(isset($_POST['ok'])){
$pastausuario="pessoas"; 
$pasta="img/$pastausuario/";
$target_path = $pasta;

if(!file_exists($target_path)) {

if(!mkdir($target_path, 0777, true))

{

die('Failed to create folders...');

}

}
 foreach($_FILES["arquivo"]["error"] as $key => $error){

 if($error == UPLOAD_ERR_OK){
 $tmp_name = $_FILES["arquivo"]["tmp_name"][$key];
 $cod = $_FILES["arquivo"]["name"][$key];
 $nome = $_FILES["arquivo"]["name"][$key]; $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );  $novonome_extensao=$id.".".$extensao;
 $uploadfile = $pasta . basename($novonome_extensao);
 if(move_uploaded_file($tmp_name, $uploadfile)){

$update = mysqli_query($conecta,"UPDATE pessoa set foto='$novonome_extensao' where igreja_id={$igreja_id} and id={$id}")or die(mysqli_error()) ;
echo"<script language=javascript>alert('A foto foi alterada com Sucesso!')</script>";
echo"<script language=javascript>location.href='visualizarpessoa.php?ig=$igreja_id&id=$id'</script>";
 }else{
	 echo"<script language=javascript>alert('Erro ao enviar o arquivo')</script>";

 } } } } ?>
<form name="enviar" id="enviar" action="" method="post" enctype="multipart/form-data">
<div class="row-fluid">
               <div class="span12">
                  <div class="widget" style="height: 400px;">
                        <div class="widget-title">
                           <h4><i class="icon-globe"></i>Carregar foto do <?php echo $nome_membro;?></h4>                    
                        </div>

                        <div class="widget-body">
                            <div class="pagetitle">
                <h1><i class="icon-upload-alt"></i> Enviar Imagem:</h1>
            </div>
<div class="control-group">                                                                       <div class="controls">                                        <div class="fileupload fileupload-new" data-provides="fileupload">                                                                                       <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>                                            <div>                                       <span class="btn btn-file">									   <span class="fileupload-new">Selecione:</span>                                       <br>                                       									   <input type="file" class="default" name="arquivo[]">									   </span>                                                                                           </div>                                        </div>                                                                        </div>                                </div>
                                 
                                    
                            <br>
                                <div class="form-actions"><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
<input type="submit" class="btn blue" name="ok" value="Alterar">
</div> 
</div>
</div>
</div>
</div>
</form>

<script src="js/jquery-1.8.2.min.js"></script>    
   <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="assets/bootstrap/js/bootstrap-fileupload.js"></script>
   <script src="js/jquery.blockui.js"></script>
   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->
   <script type="text/javascript" src="assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
   <script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
   <script type="text/javascript" src="assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
   <script type="text/javascript" src="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
   <script type="text/javascript" src="assets/clockface/js/clockface.js"></script>
   <script type="text/javascript" src="assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
   <script type="text/javascript" src="assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
   <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>   
   <script type="text/javascript" src="assets/bootstrap-daterangepicker/date.js"></script>
   <script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script> 
   <script type="text/javascript" src="assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>  
   <script type="text/javascript" src="assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
   <script type="text/javascript" src="assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
   <script src="assets/fancybox/source/jquery.fancybox.pack.js"></script>
   <script src="js/scripts.js"></script>
   <script>
      jQuery(document).ready(function() {       
         // initiate layout and plugins
         App.init();
      });
   </script>
  


                    </div>
                   
				</div>
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER-->
		</div>	