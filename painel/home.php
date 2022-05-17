<div id="main-content">

			<!-- BEGIN PAGE CONTAINER-->

			<div class="container-fluid">

				<!-- BEGIN PAGE HEADER-->

		
		<div class="alert alert-block <?php 
			
			if($ativa<1){
			echo "alert-warning";
			}else{
			echo "alert-success";
			}
			
			?> fade in">	

			<p><strong>Voc&ecirc; tem acesso para <?php 
			
			if($ativa<1){
			echo "somente visualizar ";
			}else{
			echo "alterar ";
			}
			
			?>informa&ccedil;&otilde;es <?php echo utf8_encode($local);?></strong></p>

		</div>


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

                                <a href="index.php?view=home"><i class="icon-home"></i></a><span class="divider-last">&nbsp;</span>

							</li>

                          

					

						</ul>	

						</div>



						<!-- END PAGE TITLE & BREADCRUMB-->

					</div>



				</div>

				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->

				<div id="page" class="dashboard">

                    <!-- BEGIN OVERVIEW STATISTIC BLOCKS-->



                    <div class="row-fluid">
	 <?php if($perfil=="Administrador"){ ?>				
<div class="span10">
  
   <table class="table table-striped">
                             <tr><th><div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-bar-chart blue-color"></i> Indicadores de registro</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									</span>
                                </div>
                                <div class="widget-body">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th><center>Regi&otilde;es</center></th>
                                            <th><center>Quantidade</center></th>
                                        </tr>
                                        </thead>
                                        <tbody>
										                                        <tr>
                                            <td><center>Nordeste</td>
                                            <td><center><strong><?php echo $total_igrejas_nordeste; ?></strong></center></td>
                                        </tr>
															                                        <tr>
                                            <td><center>Centro Oeste</td>
                                            <td><center><strong><?php echo $total_igrejas_centro_oeste; ?></strong></center></td>
                                        </tr>
                                        <tr>
                                            <td><center>Distrito Federal</td>
                                            <td><center><strong><?php echo $total_igrejas_distrito_federal; ?></strong></center></td>
                                        </tr>
                                        <tr>
                                            <td><center>Norte</td>
                                            <td><center><strong><?php echo $total_igrejas_norte; ?></strong></center></td>
                                        </tr>
                                        <tr>
                                            <td><center>Sudeste</td>
                                            <td><center><strong><?php echo $total_igrejas_sudeste; ?></strong></center></td>
                                        </tr>
								                                   <tr>
                                            <td><center>Sul</td>
                                            <td><center><strong><?php echo $total_igrejas_sul; ?></strong></center></td>
                                        </tr> 
                                        </tbody>
                                    </table>
                                    
                                    
                                </div>
								
                            </div></th>
 <th>  <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-bar-chart blue-color"></i> Indicadores de registro</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									</span>
                                </div>
                                <div class="widget-body">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th><center>Cadastros Totais</center></th>
                                            <th><center>Quantidade</center></th>
                                        </tr>
                                        </thead>
                                        <tbody>
										                                        <tr>
                                            <td><center>Igrejas</td>
                                            <td><center><strong><?php echo $total_igrejas; ?></strong></center></td>
                                        </tr>
															                                        <tr>
                                            <td><center>Congrega&ccedil;&otilde;es</td>
                                            <td><center><strong><?php echo $total_congregacoes; ?></strong></center></td>
                                        </tr>
                                        <tr>
                                            <td><center>Membros</td>
                                            <td><center><strong><?php echo $total_membros; ?></strong></center></td>
                                        </tr>
                                        <tr>
                                            <td><center>Pastores</td>
                                            <td><center><strong><?php echo $total_pastores; ?></strong></center></td>
                                        </tr>
                                        <tr>
                                            <td><center>Congregados</td>
                                            <td><center><strong><?php echo $total_congregados; ?></strong></center></td>
                                        </tr>
                                        
                                        </tbody>
                                    </table>
                                    
                                    
                                </div>
								
                            </div></th></tr></table>
   
   <div class="row-fluid">
                        <div class="span12">
                            <!-- BEGIN GRID SAMPLE PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>ERROS NO SISTEMA</h4>
                                        <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                        </span>
                                </div>
                                <div class="widget-body">
                                    <code> 
<?php
// Lê um arquivo em um array.  Nesse exemplo nós obteremos o código fonte de
// uma URL via HTTP
$lines = file ('error_log');

// Percorre o array, mostrando o fonte HTML com numeração de linhas.
foreach ($lines as $line_num => $line) {
    echo htmlspecialchars($line) . "<br><br>\n";
}

// Outro exemplo, onde obtemos a página web inteira como uma string. Veja também file_get_contents().
$html = implode ('', file ('http://www.example.com/'));

// Usando o parâmetro de flags opcionais disponíveis desde o PHP 5
$trimmed = file('somefile.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
?> </code>
                                </div>
                            </div>
                            <!-- END GRID SAMPLE PORTLET-->
                        </div>
                    </div>
   				
   
   
   
<?php }
if($perfil=="Pastor Local" || $perfil=="Secretaria Local"){ ?>



 <div class="row-fluid metro-overview-cont">
                       <div data-desktop="span2" data-tablet="span2" class="span2 responsive">
                      <div class="metro-overview turquoise-color clearfix">
                                <div class="display">
                                    <i class="icon-group"></i>
                                    
                                </div>
                                <div class="details">
                                    <div class="numbers"><?php echo $total_membros; ?></div>
                                    <div class="title">Membros</div>
                                </div>
                              
                            </div>
                            </div>
                            <div data-desktop="span2" data-tablet="span2" class="span2 responsive">
                            <div class="metro-overview red-color clearfix">
                                <div class="display">
                                    <i class="icon-group"></i>
                                </div>
                                <div class="details">
                                    <div class="numbers"><?php echo $total_congregados; ?></div>
                                    <div class="title">Congregados</div>
                                </div>
                          
    
                            </div>
                        </div>
                          <div data-desktop="span2" data-tablet="span2" class="span2 responsive">
                            <div class="metro-overview purple-color clearfix">
                                <div class="display">
                                    <i class="icon-group"></i>
                                </div>
                                <div class="details">
                                    <div class="numbers"><?php echo $total_novos_convertidos; ?></div>
                                    <div class="title">N. Convertidos</div>
                                </div>
                          
    
                            </div>
                        </div>
                        <div data-desktop="span2" data-tablet="span2" class="span2 responsive">
                            <div class="metro-overview gray-color clearfix">
                                <div class="display">
                                    <i class="icon-group"></i>
                                </div>
                                <div class="details">
                                    <div class="numbers"><?php echo $total_criancas; ?></div>
                                    <div class="title">Crian&ccedil;as</div>
                                </div>
                          
    
                            </div>
                        </div>
                      <div data-desktop="span2" data-tablet="span2" class="span2 responsive">
                            <div class="metro-overview green-color clearfix">
                                <div class="display">
                                    <i class="icon-home"></i>
                                   
                                </div>
                                <div class="details">
                                    <div class="numbers"><?php echo $total_congregacoes; ?></div>
                                    <div class="title">Congrega&ccedil;&otilde;es</div>
                                    
                                </div>
                            </div>
                        </div>
                                  <div data-desktop="span2" data-tablet="span2" class="span2 responsive">
                            <div class="metro-overview blue-color clearfix">
                                <div class="display">
                                    <i class="icon-book"></i>
                                   
                                </div>
                                <div class="details">
                                    <div class="numbers"><?php echo $total_salas_ebd; ?></div>
                                    <div class="title">EBD - Salas</div>
                                    
                                </div>
                            </div>
                        </div>            
                        
                    </div>
<div class="row-fluid">
					<!--	<div class="responsive span7 scroller" data-tablet="span7 fix-margin" data-desktop="span7">-->
					<div class="scroller span7" data-always-visible="1" data-rail-visible="1" style="overflow: hidden;">
							<!-- BEGIN CALENDAR PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-calendar"></i>ANIVERSARIANTES DO DIA</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									</span>
								</div>
								<div class="widget-body">
								    
								    
								    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th><center>Nome</center></th>
											<th><center>Fun&ccedil;&atilde;o</center></th>
                                            <th><center>Telefone</center></th>
                                        </tr>
                                        </thead>
                                        <tbody>
										
<?php	
		$dia= date("d");

	$mes=date("m");
	$membros1busca = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=$igreja_id and status='ativo' and dataNascimento LIKE '%".$dia."/".$mes."/%' ORDER BY nome asc");

	while($resultadomembros1 = mysqli_fetch_array($membros1busca)){
  $idade= (int)date("Y")-(int)substr($resultadomembros1['dataNascimento'],-4);

?>


	<tr>
       
<td><center><?php echo utf8_encode( $resultadomembros1['nome'])." ".utf8_encode( $resultadomembros1['sobrenome'])."(".$idade.")";	?></center></td>
<td><center><?php echo utf8_encode( $resultadomembros1['funcao']);?></center></td>
<td><center><?php 

if($resultadomembros1["celular1"]<>""){
													 echo  $resultadomembros1["celular1"];
													}
													if($resultadomembros1["celular2"]<>""){
													 echo  " / ".$resultadomembros1["celular2"];
													}
																										if($resultadomembros1["telefone"]<>""){
													 echo  " / ".$resultadomembros1["telefone"];
													}
?></center></td>

<td> <?php 
   
    $retorno = status_sms($resultadomembros1["id"]);

 if (($retorno==4) || ($retorno==9)){?>
<span class="label label-success label-mini"> SMS Enviado</span>

<?php }else{ 
$credito = status_credito();
if ($credito > 0){

?>
<a href="enviar_sms.php?p=<?php echo $resultadomembros1["id"]."&i=".$resultadomembros1["igreja_id"]; ?>" class="btn btn-mini hidden-phone hidden-tablet">Enviar SMS</a>
<?php } }?>
</td>
                                </tr>

								<?php	
	
	}
?>

                                        </tbody>
                                    </table>

                 
							<!-- END CALENDAR PORTLET-->
					
						</div></div></div>
						
                        <div class="span5">
                            <!-- BEGIN PROGRESS BARS PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i> INDICADORES DE REGISTRO</h4>
                                        <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>

                                        </span>
                                </div>
                                <div class="widget-body">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th><center>Descri&ccedil;&atilde;o</center></th>
                                            <th><center>Quantidade</center></th>
                                        </tr>
                                        </thead>
                                        <tbody>
									    <tr>
                                            <td><center>Congrega&ccedil&otilde;es</center></td>
                                            <td><center><strong><?php echo $total_congregacoes; ?></strong></center></td>
                                        </tr>
															                                        <tr>
                                            <td><center>GC's</center></td>
                                            <td><center><strong><?php echo $total_gcs; ?></strong></center></td>
                                        </tr>
                                        <tr>
                                            <td><center>Membros</center></td>
                                            <td><center><strong><?php echo $total_membros; ?></strong></center></td>
                                        </tr>
                                        <tr>
                                            <td><center>Congregados</center></td>
                                            <td><center><strong><?php echo $total_congregados; ?></strong></center></td>
                                        </tr>
                                        <tr>
                                            <td><center>Novos Convertidos</center></td>
                                            <td><center><strong><?php echo $total_novos_convertidos; ?></strong></center></td>
                                        </tr>
                                        <tr>
                                            <td><center>Cadastros Desatualizados</td>
                                            <td><center><strong><?php echo $total_cadastros_desatualizados; ?></strong></center></td>
                                        </tr>
								
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END PROGRESS BARS PORTLET-->
                            <!-- BEGIN ALERTS PORTLET-->
                            <div class="widget">
                      							<?php if($perfil=="Pastor Local"){ ?>
							                            <div class="widget">

<?php

								
if($saude<=20){?>
                                <div class="widget-title">
                                    <h4><i class="icon-money blue-color"></i> Sa&uacute;de Financeira (P&eacute;ssima)</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									</span>
                                </div>
                                <div class="widget-body">
								<center>
<img src="img/pessimo.png" alt="Pessimo"></center>
</div>
<?php
}else if($saude>=21 && $saude<=40){
	?>
	                                <div class="widget-title">
                                    <h4><i class="icon-money blue-color"></i> Sa&uacute;de Financeira (Ruim)</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									</span>
                                </div>
                                <div class="widget-body">
								<center>
<img src="img/ruim.jpg" alt="Ruim"></center>
</div>
<?php
}else if($saude>=41 && $saude<=60){
	?>
	                                <div class="widget-title">
                                    <h4><i class="icon-money blue-color"></i> Sa&uacute;de Financeira (Regular)</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									</span>
                                </div>
                                <div class="widget-body">
								<center>
<img src="img/regular.png" alt="Regular"></center>
</div>
<?php
}else if($saude>=61 && $saude<80){
	?>
	                                <div class="widget-title">
                                    <h4><i class="icon-money blue-color"></i> Sa&uacute;de Financeira (Boa)</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									</span>
                                </div>
                                <div class="widget-body">
								<center>
<img src="img/bom.png" alt="Bom">
</center>
                                </div>
<?php
}else if($saude>=81){
	?>
	                                <div class="widget-title">
                                    <h4><i class="icon-money blue-color"></i> Sa&uacute;de Financeira (Excelente)</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									</span>
                                </div>
                                <div class="widget-body">
								<center>
<img src="img/excelente.png" alt="Excelente"></center>
                                </div>
<?php
}				
					?>			
								
								
                            </div>
                             <?php
}				
					?>	 
                            </div>
                            <!-- END ALERTS PORTLET-->
                        </div>
					</div>



						

						
		

            



				

				<!-- END PAGE CONTENT-->



			<!-- END PAGE CONTAINER-->
			
<?php }else if($perfil=="Lider"){ ?>

	<div class="scroller span7" data-always-visible="1" data-rail-visible="1" style="overflow: hidden;">
							<!-- BEGIN CALENDAR PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-calendar"></i>ANIVERSARIANTES DO DIA</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									</span>
								</div>
								<div class="widget-body">
								    
								    
								    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th><center>Nome</center></th>
											<th><center>Fun&ccedil;&atilde;o</center></th>
                                            <th><center>Telefone</center></th>
                                        </tr>
                                        </thead>
                                        <tbody>
										
<?php	
		$dia= date("d");

	$mes=date("m");
	$membros1busca = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=$igreja_id and status='ativo' and dataNascimento LIKE '%".$dia."/".$mes."/%' ORDER BY nome asc");

	while($resultadomembros1 = mysqli_fetch_array($membros1busca)){




	    $idade= (int)date("Y")-(int)substr($resultadomembros1['dataNascimento'],-4);
		  
		    $sqllider=mysqli_query($conecta,"select * from lider where id=$lider_id and igreja_id=$igreja_id");
            $verlider=mysqli_fetch_array($sqllider);
            $min_idade=$verlider["min_idade"];
            $max_idade=$verlider["max_idade"];
            
            if($min_idade==0 && $max_idade==0){
                if(($verlider["sexo"]=="Masculino") && ($resultadomembros1['sexo']=="Masculino")){
                                       ?>
                    
	<tr>
       
<td><center><?php echo utf8_encode( $resultadomembros1['nome'])." ".utf8_encode( $resultadomembros1['sobrenome'])."(".$idade.")";	?></center></td>
<td><center><?php echo utf8_encode( $resultadomembros1['funcao']);?></center></td>
<td><center><?php 

if($resultadomembros1["celular1"]<>""){
													 echo  $resultadomembros1["celular1"];
													}
													if($resultadomembros1["celular2"]<>""){
													 echo  " / ".$resultadomembros1["celular2"];
													}
																										if($resultadomembros1["telefone"]<>""){
													 echo  " / ".$resultadomembros1["telefone"];
													}
?></center></td>


                                </tr>
                                                   
                    <?php
                   
                   }
                else if(($verlider["sexo"]=="Feminino") && ($resultadomembros1['sexo']=="Feminino")){
                    
                    ?>
                   

                               	<tr>
       
<td><center><?php echo utf8_encode( $resultadomembros1['nome'])." ".utf8_encode( $resultadomembros1['sobrenome'])."(".$idade.")";	?></center></td>
<td><center><?php echo utf8_encode( $resultadomembros1['funcao']);?></center></td>
<td><center><?php 

if($resultadomembros1["celular1"]<>""){
													 echo  $resultadomembros1["celular1"];
													}
													if($resultadomembros1["celular2"]<>""){
													 echo  " / ".$resultadomembros1["celular2"];
													}
																										if($resultadomembros1["telefone"]<>""){
													 echo  " / ".$resultadomembros1["telefone"];
													}
?></center></td>


                                </tr>
                   <?php 
                    
            
                }else if($verlider["sexo"]=="Ambos"){
                   if(($verlider['novoconvertido']==1) && ($resultadomembros1['funcao']=="Novo Convertido")){ 
               
               ?> 
                

                               	<tr>
       
<td><center><?php echo utf8_encode( $resultadomembros1['nome'])." ".utf8_encode( $resultadomembros1['sobrenome'])."(".$idade.")";	?></center></td>
<td><center><?php echo utf8_encode( $resultadomembros1['funcao']);?></center></td>
<td><center><?php 

if($resultadomembros1["celular1"]<>""){
													 echo  $resultadomembros1["celular1"];
													}
													if($resultadomembros1["celular2"]<>""){
													 echo  " / ".$resultadomembros1["celular2"];
													}
																										if($resultadomembros1["telefone"]<>""){
													 echo  " / ".$resultadomembros1["telefone"];
													}
?></center></td>


                                </tr>
              <?php 
                   }
                }
            }
            else{
                 if($idade>=$min_idade && $idade<=$max_idade){
            ?>  
            
               	<tr>
       
<td><center><?php echo utf8_encode( $resultadomembros1['nome'])." ".utf8_encode( $resultadomembros1['sobrenome'])."(".$idade.")";	?></center></td>
<td><center><?php echo utf8_encode( $resultadomembros1['funcao']);?></center></td>
<td><center><?php 

if($resultadomembros1["celular1"]<>""){
													 echo  $resultadomembros1["celular1"];
													}
													if($resultadomembros1["celular2"]<>""){
													 echo  " / ".$resultadomembros1["celular2"];
													}
																										if($resultadomembros1["telefone"]<>""){
													 echo  " / ".$resultadomembros1["telefone"];
													}
?></center></td>


                                </tr>
            <?php    
            }
	}
	}
            ?>




                                        </tbody>
                                    </table>

                 
							<!-- END CALENDAR PORTLET-->
					
						</div></div></div>
								 <div class="span5">
                            <!-- BEGIN PROGRESS BARS PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i> INDICADORES DE REGISTRO</h4>
                                        <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>

                                        </span>
                                </div>
                                <div class="widget-body">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th><center>Descri&ccedil;&atilde;o</center></th>
                                            <th><center>Quantidade</center></th>
                                        </tr>
                                        </thead>
                                        <tbody>
									    										
                                            <td>Membros</td>
                                            <td><center><strong><?php echo $total_membros_lideres; ?></strong></center></td>
                                        </tr>
                                        <tr>
                                            <td>Congregados</td>
                                            <td><center><strong><?php echo $total_congregados_lideres; ?></strong></center></td>
                                        </tr>
                                        <tr>
                                            <td>Novos Convertidos</td>
                                            <td><center><strong><?php echo $total_novoconvertido_lideres; ?></strong></center></td>
                                        </tr>
                                        <tr>
                                            <td>Pessoas Afastadas</td>
                                            <td><center><strong><?php echo $total_afastados_lideres; ?></strong></center></td>
                                        </tr>
                                        <tr>
                                            <td>Cadastros Desatualizados</td>
                                            <td><center><strong><?php echo $total_cadastros_desatualizados_lideres; ?></strong></center></td>
                                        </tr>
								
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>



		

<?php }else if($perfil=="Pastor Regional" || $perfil=="Secretaria Regional"){?>

  <div class="row-fluid metro-overview-cont">
                       <div data-desktop="span3" data-tablet="span3" class="span3 responsive">
                      <a href="index.php?view=pastores" class=""><div class="metro-overview turquoise-color clearfix">
                                <div class="display">
                                    <i class="icon-group"></i>
                                    
                                </div>
                                <div class="details">
                                    <div class="numbers"><?php echo $total_pastor; ?></div>
                                    <div class="title">Pastores Cadastrados</div>
                                </div>
                              
                            </div></a>
                            </div>
                          <div data-desktop="span3" data-tablet="span3" class="span3 responsive">
                      <a href="index.php?view=evangelistas" class=""><div class="metro-overview purple-color clearfix">
                                <div class="display">
                                    <i class="icon-group"></i>
                                    
                                </div>
                                <div class="details">
                                    <div class="numbers"><?php echo $total_evangelista; ?></div>
                                    <div class="title">Evangelistas Cadastrados</div>
                                </div>
                              
                            </div></a>
                            </div>
                            <div data-desktop="span3" data-tablet="span3" class="span3 responsive">
                            <a href="index.php?view=igrejas" class=""><div class="metro-overview red-color clearfix">
                                <div class="display">
                                    <i class="icon-home"></i>
                                </div>
                                <div class="details">
                                    <div class="numbers"><?php echo $total_igrejas; ?></div>
                                    <div class="title">Igrejas Cadastradas</div>
                                </div>
                          
    
                            </div></a>
                        </div>
                        
                      <div data-desktop="span3" data-tablet="span3" class="span3 responsive">
                            <div class="metro-overview green-color clearfix">
                                <div class="display">
                                    <i class="icon-home"></i>
                                   
                                </div>
                                <div class="details">
                                    <div class="numbers"><?php echo $total_congregacoes; ?></div>
                                    <div class="title">Congrega&ccedil;&otilde;es Cadastradas</div>
                                    
                                </div>
                            </div>
                        </div>
   
                       
                    </div>

<div class="row-fluid">
					<!--	<div class="responsive span7 scroller" data-tablet="span7 fix-margin" data-desktop="span7">-->
					<div class="scroller span7" data-always-visible="1" data-rail-visible="1" style="overflow: hidden;">
							<!-- BEGIN CALENDAR PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-calendar"></i>ANIVERSARIANTES DO DIA</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									</span>
								</div>
								<div class="widget-body">
								    
								    
								    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th><center>Nome</center></th>
											<th><center>Fun&ccedil;&atilde;o</center></th>
                                            <th><center>Telefone</center></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
												
<?php	
		$dia= date("d");

	$mes=date("m");
	$membros1busca = mysqli_query($conecta,"SELECT * FROM pessoa where regiao_id=$regiao_id and status='ativo' and funcao='pastor' and dataNascimento LIKE '%".$dia."/".$mes."/%' ORDER BY nome asc");

	while($resultadomembros1 = mysqli_fetch_array($membros1busca)){
	     $idade= (int)date("Y")-(int)substr($resultadomembros1['dataNascimento'],-4);
	     $retornomembro_id=$resultadomembros1['id'];
$pastorbusca = mysqli_query($conecta,"SELECT * FROM pastor where regiao_id=".$regiao_id." and membro_id=".$retornomembro_id);
$resultadopastor=mysqli_fetch_array($pastorbusca);
?>

	<tr>
       
<td><center><?php echo utf8_encode( $resultadomembros1['nome'])." ".utf8_encode( $resultadomembros1['sobrenome'])."(".$idade.")";	?></center></td>
<td><center><?php echo utf8_encode( $resultadomembros1['funcao']." ".$resultadopastor['tipo']);?></center></td>
<td><center><?php 

if($resultadomembros1["celular1"]<>""){
													 echo  $resultadomembros1["celular1"];
													}
													if($resultadomembros1["celular2"]<>""){
													 echo  " / ".$resultadomembros1["celular2"];
													}
																										if($resultadomembros1["telefone"]<>""){
													 echo  " / ".$resultadomembros1["telefone"];
													}
?></center></td>

<td> <?php 
   
    $retorno = status_sms($resultadomembros1["id"]);

 if (($retorno==4) || ($retorno==9)){?>
<span class="label label-success label-mini"> SMS Enviado</span>

<?php }else{ 
$credito = status_credito();
if ($credito > 0){

?>
<a href="enviar_sms.php?p=<?php echo $resultadomembros1["id"]."&r=".$resultadomembros1["regiao_id"]; ?>" class="btn btn-mini hidden-phone hidden-tablet">Enviar SMS</a>
<?php } }?>
</td>
                                </tr>

								<?php	

	}
?>

                                        </tbody>
                                    </table>

                 
							<!-- END CALENDAR PORTLET-->
					
						</div></div></div>
						
                        <div class="span5">
                            <!-- BEGIN PROGRESS BARS PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i> Cadastro de Igrejas por Estado</h4>
                                        <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>

                                        </span>
                                </div>
                                <div class="widget-body">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th><center>Estados</center></th>
                                            <th><center>Quantidade</center></th>
                                            <th><center>%</center></th>
                                        </tr>
                                        </thead>
                                        <tbody>
									      <tbody>
                                        <?php 
                                        $estados_regiao = mysqli_query($conecta,"SELECT * FROM estado where regiao_id=$regiao_id ORDER BY descricao asc");

	while($resultadoestados_regiao = mysqli_fetch_array($estados_regiao)){
	    $selectigrejasestado = mysqli_query($conecta,"SELECT * FROM igreja where regiao_id=1 and igreja_id is NULL and estado_id=$resultadoestados_regiao[id]") or die(mysqli_error($conecta));	
$total_igrejas_estado=mysqli_num_rows($selectigrejasestado);
	    $porcentagem_estado=($total_igrejas_estado*100)/$total_igrejas;
                                        ?>
                                        
								            <tr>
                                            <td><center><?php echo utf8_encode($resultadoestados_regiao["descricao"]);?></td>
                                            <td><center><strong><?php echo $total_igrejas_estado; ?></strong></center></td>
                                            <td><center><strong><?php echo round($porcentagem_estado, 0)."%"; ?></strong></center></td>
                                            </tr>
										<?php 
	}
										?>
                                        </tbody>
								
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END PROGRESS BARS PORTLET-->
                           
                        </div>
					</div>



						

						
		

            



				

				<!-- END PAGE CONTENT-->



			<!-- END PAGE CONTAINER-->
			
















			<!-- END PAGE CONTAINER-->
	<?php
}?>

			</div>	
			</div>
			</div>
	
			