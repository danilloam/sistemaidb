<?php

include("configuracao.php");

?>

<div id="main-content">

			<!-- BEGIN PAGE CONTAINER-->

			<div class="container-fluid">

				<!-- BEGIN PAGE HEADER-->

				<?php 

				if($total_cadastros==0){

					 ?>

		<div class="row-fluid">

		<div class="span12">

		<div class="alert alert-block alert-error fade in">	

			<p><strong>Voc&ecirc; ainda n&atilde;o cadastrou nenhuma Pessoa.</strong></p>

		</div>

		</div>	

		</div>

		<?php } else { ?>

		<div class="row-fluid">

		<div class="span12">

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
			
			?>informa&ccedil;&otilde;es <?php echo "$local";?></strong></p>

		</div>

		</div>	

		</div>

		<?php } ?>

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

                           

							<li><a href="index.php?view=membros">Pessoas Ativas</a><span class="divider-last">&nbsp;</span></li>

						</ul>	

						</div>

						<div class="span6">



						</div>

						<!-- END PAGE TITLE & BREADCRUMB-->

					</div>

				</div>

				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->

				<div id="page" class="dashboard">



 <div class="row-fluid">
                <div class="span12">
                    <?php
                    
                    
                    if($qdt_membros==1){
                    ?>
								<div class="clearfix align_right">
                                    <div class="btn-group ">
									<a href="index.php?view=pcadastro" class="various"> 
									
                                        <button id="sample_editable_1_new" class="btn green ri">
                                            Adicionar <i class="icon-plus"></i>
                                        </button></a>
                                    </div>
      
                                </div>
                                <?
                    }else if ( $qdt_membros>=$total_cadastros){
                                
                                ?>
                                						<div class="clearfix align_right">
                                    <div class="btn-group ">
									<a href="index.php?view=pcadastro" class="various"> 
									
                                        <button id="sample_editable_1_new" class="btn green ri">
                                            Adicionar <i class="icon-plus"></i>
                                        </button></a>
                                    </div>
      
                                </div>
                                <?php }?>
									<div class="space15"></div>
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget">
	
                        <div class="widget-title">
						
                            <h4><i class="icon-reorder"></i>Pessoas Cadastradas</h4>
                      
                        </div>
                        <div class="widget-body">

                            <table class="table table-striped table-bordered" id="sample_1">
                            <thead>

                                <tr>
                                    <th class="span4">Nome Completo</th>
                                    <th class="span1">Anivers&aacute;rio</th>
                                    <th class="span2">Celular</th>
									 <th class="span2">Sexo</th>
								<th class="span2">Atualiza&ccedil;&atilde;o</th>
										<th class="hidden-phone" style="width:10px;"></th>
										 
                            </thead>
                            <tbody>
																					<?php

$membrosbusca = mysqli_query($conecta,"SELECT * FROM pessoa where igreja_id=$igreja_id and funcao='afastado' ORDER BY nome ASC");

	while($resultadomembros = mysqli_fetch_assoc($membrosbusca)){
		    
		    $idade= (int)date("Y")-(int)substr($resultadomembros['dataNascimento'],-4);
		  
		    $sqllider=mysqli_query($conecta,"select * from lider where id=$lider_id and igreja_id=$igreja_id");
            $verlider=mysqli_fetch_array($sqllider);
            $min_idade=$verlider["min_idade"];
            $max_idade=$verlider["max_idade"];
            
            if($min_idade==0 && $max_idade==0){
                if($verlider["sexo"]=="Masculino"){
                   if($resultadomembros['sexo']=="Masculino"){
                    ?>
                    

                                <tr class="odd gradeX">
                                   
                                    <td><?php echo utf8_encode($resultadomembros['nome']." ".$resultadomembros['sobrenome']);	?></td>
                                    <td class="hidden-phone"><?php echo substr($resultadomembros['dataNascimento'],0,5)." (".$idade.")";	?></td>
                                    
                                    <td><center><?php 

if($resultadomembros1["celular1"]<>""){
													 echo  $resultadomembros["celular1"];
													}
													if($resultadomembros["celular2"]<>""){
													 echo  " / ".$resultadomembros["celular2"];
													}
																										if($resultadomembros["telefone"]<>""){
													 echo  " / ".$resultadomembros["telefone"];
													}
?></center></td>
                                    
                                    <td class="center hidden-phone"><?php echo utf8_encode($resultadomembros['sexo']);	?></td>
                         <td class="center hidden-phone">
                         <?php echo $resultadomembros['data_modificacao'];?></td>
                          <center><td>
									<?php 
			
			if($ativa>0){
				
?>
 <a href="visualizarpessoa.php?ig=<?php echo $resultadomembros['igreja_id'];?>&id=<?php echo $resultadomembros['id'];?>" class="various" data-fancybox-type="iframe">
<button class="btn mini purple">
                                            	<i class="icon-eye-open"></i>
												</button></a>

<?php	}		?>	
</td>
</td></center>
							   </tr>
                    
                    <?php
                   }
                   }
                else if($verlider["sexo"]=="Feminino"){
                    if($resultadomembros['sexo']=="Feminino"){
                    ?>
                   

                                <tr class="odd gradeX">
                                   
                                    <td><?php echo utf8_encode($resultadomembros['nome']." ".$resultadomembros['sobrenome']);	?></td>
                                    <td class="hidden-phone"><?php echo substr($resultadomembros['dataNascimento'],0,5)." (".$idade.")";	?></td>
                                    
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
                                    
                                    <td class="center hidden-phone"><?php echo utf8_encode($resultadomembros['sexo']);	?></td>
                         <td class="center hidden-phone">
                         <?php echo $resultadomembros['data_modificacao'];?></td>
                          <center><td>
									<?php 
			
			if($ativa>0){
				
?>
 <a href="visualizarpessoa.php?ig=<?php echo $resultadomembros['igreja_id'];?>&id=<?php echo $resultadomembros['id'];?>" class="various" data-fancybox-type="iframe">
<button class="btn mini purple">
                                            	<i class="icon-eye-open"></i>
												</button></a>

<?php	}		?>	
</td>
</td></center>
							   </tr>
                   <?php 
                    }
            
                }else if($verlider["sexo"]=="Ambos"){
                   if(($verlider['novoconvertido']==1) && ($resultadomembros['funcao']=="Novo Convertido")){ 
               
               ?> 
                

                                <tr class="odd gradeX">
                                   
                                    <td><?php echo utf8_encode($resultadomembros['nome']." ".$resultadomembros['sobrenome']);	?></td>
                                    <td class="hidden-phone"><?php echo substr($resultadomembros['dataNascimento'],0,5)." (".$idade.")";	?></td>
                                    
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
                                    
                                    <td class="center hidden-phone"><?php echo utf8_encode($resultadomembros['sexo']);	?></td>
                         <td class="center hidden-phone">
                         <?php echo $resultadomembros['data_modificacao'];?></td>
                          <center><td>
									<?php 
			
			if($ativa>0){
				
?>
 <a href="visualizarpessoa.php?ig=<?php echo $resultadomembros['igreja_id'];?>&id=<?php echo $resultadomembros['id'];?>" class="various" data-fancybox-type="iframe">
<button class="btn mini purple">
                                            	<i class="icon-eye-open"></i>
												</button></a>

<?php	}		?>	
</td>
</td></center>
							   </tr>
              <?php 
                   }
                   else{
                       ?>
                       
                       
                                <tr class="odd gradeX">
                                   
                                    <td><?php echo utf8_encode($resultadomembros['nome']." ".$resultadomembros['sobrenome']);	?></td>
                                    <td class="hidden-phone"><?php echo substr($resultadomembros['dataNascimento'],0,5)." (".$idade.")";	?></td>
                                    
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
                                    
                                    <td class="center hidden-phone"><?php echo utf8_encode($resultadomembros['sexo']);	?></td>
                         <td class="center hidden-phone">
                         <?php echo $resultadomembros['data_modificacao'];?></td>
                          <center><td>
									<?php 
			
			if($ativa>0){
				
?>
 <a href="visualizarpessoa.php?ig=<?php echo $resultadomembros['igreja_id'];?>&id=<?php echo $resultadomembros['id'];?>" class="various" data-fancybox-type="iframe">
<button class="btn mini purple">
                                            	<i class="icon-eye-open"></i>
												</button></a>

<?php	}		?>	
</td>
</td></center>
							   </tr>
                   <?php 
                    }
            
                }else if($verlider["sexo"]=="Ambos"){
                   if(($verlider['novoconvertido']==1) && ($resultadomembros['funcao']=="Novo Convertido")){ 
               
               ?> 
                

                                <tr class="odd gradeX">
                                   
                                    <td><?php echo utf8_encode($resultadomembros['nome']." ".$resultadomembros['sobrenome']);	?></td>
                                    <td class="hidden-phone"><?php echo substr($resultadomembros['dataNascimento'],0,5)." (".$idade.")";	?></td>
                                    
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
                                    
                                    <td class="center hidden-phone"><?php echo utf8_encode($resultadomembros['sexo']);	?></td>
                         <td class="center hidden-phone">
                         <?php echo $resultadomembros['data_modificacao'];?></td>
                          <center><td>
									<?php 
			
			if($ativa>0){
				
?>
 <a href="visualizarpessoa.php?ig=<?php echo $resultadomembros['igreja_id'];?>&id=<?php echo $resultadomembros['id'];?>" class="various" data-fancybox-type="iframe">
<button class="btn mini purple">
                                            	<i class="icon-eye-open"></i>
												</button></a>

<?php	}		?>	
</td>
</td></center>
							   </tr>
                       <?php
                       
                   }
                }
            }
            else{
                 if($idade>=$min_idade && $idade<=$max_idade){
            ?>  
            
                <tr class="odd gradeX">
                                   
                                    <td><?php echo utf8_encode($resultadomembros['nome']." ".$resultadomembros['sobrenome']);	?></td>
                                    <td class="hidden-phone"><?php echo substr($resultadomembros['dataNascimento'],0,5)." (".$idade.")";	?></td>
                                    
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
                                    
                                    <td class="center hidden-phone"><?php echo utf8_encode($resultadomembros['sexo']);	?></td>
                         <td class="center hidden-phone">
                         <?php echo $resultadomembros['data_modificacao'];?></td>
                          <center><td>
									<?php 
			
			if($ativa>0){
				
?>
 <a href="visualizarpessoa.php?ig=<?php echo $resultadomembros['igreja_id'];?>&id=<?php echo $resultadomembros['id'];?>" class="various" data-fancybox-type="iframe">
<button class="btn mini purple">
                                            	<i class="icon-eye-open"></i>
												</button></a>

<?php	}		?>	
</td>
</td></center>
							   </tr>
            <?php    
            }
	}
	}
            ?>





                                </tbody>
                        </table>

                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE widget-->
                </div>
            </div>

				</div>

				<!-- END PAGE CONTENT-->

			</div>

			<!-- END PAGE CONTAINER-->

		</div>