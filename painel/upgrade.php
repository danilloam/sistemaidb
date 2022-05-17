<?php

	include("configuracao.php");

 include ("header.php"); ?>

<div id="container" class="row-fluid">

	<?php include ("menu.php"); 

                        $id=$_GET["ig"];
 

						$sqligreja=mysqli_query($conecta,"select * from igreja where id=$id");

						$verigreja=mysqli_fetch_array($sqligreja);


	$sqlplano=mysqli_query($conecta,"select * from planos where id={$verigreja["plano"]}");

						$verplano=mysqli_fetch_array($sqlplano);





                         ?>

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

                            <li>

                                <a href="index.php?view=igrejas">Igrejas</a> <span class="divider">&nbsp;</span>

                            </li>

							<li><a href="">Editar Informa&ccedil;&otilde;es </a><span class="divider-last">&nbsp;</span></li>

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

					<div class="widget">

						<div class="widget-body">
                        <div class="row-fluid">
                           <div class="pricing-title">
                               <h2>90 dias Para voc&ecirc; aproveitar nossa plataforma!</h2>
                               <h4>Sem risco. O melhor de tudo, n&atilde;o cancelamos seu acesso. </h4>
                           </div>
                        </div>
                        <div class="row-fluid">
                           <div class="span3">
                              <div class="pricing-table">
                                  <div class="pricing-head">
                                      <h3>Gratuito</h3>
                                      <h4>
                                          <span class="note">R$</span> - <span>Por 90 dias</span></h4>
                                  </div>
                                  <ul>
                                      <li><strong>Configura&ccedil;&atilde;o</strong> Gr&aacute;tis</li>
                                      <li><strong>30</strong> Pessoas</li>
                                      <li><strong>01</strong> Congrega&ccedil;&atilde;o</li>
                                      <li><strong>05</strong> Grupos de Crescimento</li>
                                      <li>Acesso a envio de Relat&oacute;rios</li>
                                  </ul>
                                  <div class="price-actions">
                                      <?php 
                                      if($verplano['id']==1){
                                      ?>
                                      <a class="btn btn-inverse" href="javascript:;">Plano Atual</a>
                                      <?php }else if ($verplano['id']<1){?>
                                      <a class="btn" href="javascript:;">Fazer Upgrade</a>
                                      <?php
                                      }
                                      ?>
                                  </div>
                              </div>
                           </div>
                           <div class="spance10 visible-phone"></div>
                           <div class="span3">
                               <div class="pricing-table">
                                   <div class="pricing-head">
                                       <h3> Primeiros Passos </h3>
                                       <h4>
                                           <span class="note">R$</span> - <span>Por M&ecirc;s</span></h4>
                                   </div>
                                   <ul>
                                       <li><strong>Configura&ccedil;&atilde;o</strong> Gr&aacute;tis</li>
                                       <li><strong>30</strong> Pessoas</li>
                                       <li><strong>01</strong> Congrega&ccedil;&atilde;o</li>
                                       <li><strong>05</strong> Grupos de Crescimento</li>
                                       <li>Acesso a Relat&oacute;rios</li>
                                   </ul>
                                   <div class="price-actions">
                                           <?php 
                                      if($verplano['id']==2){
                                      ?>
                                      <a class="btn btn-inverse" href="javascript:;">Plano Atual</a>
                                      <?php }else if ($verplano['id']<2){?>
                                      <a class="btn" href="javascript:;">Fazer Upgrade</a>
                                      <?php
                                      }
                                      ?>
                                   </div>
                               </div>
                           </div>
                           <div class="spance10 visible-phone"></div>
                           <div class="span3">
                               <div class="pricing-table green">
                                   <div class="pricing-head ">
                                       <h3> Plano B&aacute;sico </h3>
                                       <h4>
                                           <span class="note">R$</span> - <span>Por M&ecirc;s</span></h4>
                                   </div>
                                   <ul>
                                       <li><strong>Configura&ccedil;&atilde;o</strong> Gr&aacute;tis</li>
                                       <li><strong>150</strong> Pessoas</li>
                                       <li><strong>10</strong> Congrega&ccedil;&otilde;es</li>
                                       <li><strong>10</strong> Grupos de Crescimento</li>
                                       <li>Acesso a Relat&oacute;rios</li>
                                       <li><strong>Acesso para</strong> l&iacute;deres de Departamentos</li>
                                     
                                   </ul>
                                   <div class="price-actions">
                                           <?php 
                                      if($verplano['id']==3){
                                      ?>
                                      <a class="btn btn-inverse" href="javascript:;">Plano Atual</a>
                                      <?php }else if ($verplano['id']<3){?>
                                      <a class="btn" href="javascript:;">Fazer Upgrade</a>
                                      <?php
                                      }
                                      ?>
                                   </div>
                               </div>
                           </div>
                           <div class="spance10 visible-phone"></div>
                           <div class="span3">
                               <div class="pricing-table yellow">
                                   <div class="pricing-head">
                                       <h3> Plano Avan&ccedil;ado </h3>
                                       <h4>
                                           <span class="note">R$</span> - <span>Por M&ecirc;s</span></h4>
                                   </div>
                                   <ul>
                                       <li><strong>Configura&ccedil;&atilde;o</strong> Gr&aacute;tis</li>
                                       <li><strong>Envio SMS Autom&aacute;tico</strong> para aniversariantes</li>
                                       <li><strong>Pessoas</strong> Ilimitadas</li>
                                       <li><strong>Congrega&ccedil;&otilde;es</strong> Ilimitadas</li>
                                       <li><strong>Grupos de Crescimento</strong> Ilimitados</li>
                                       <li>Acesso a Relat&oacute;rios</li>
                                       <li><strong>Acesso para</strong> l&iacute;deres de Departamentos</li>
                                       <li><strong>Controle</strong> Patrimonial</li>
                                       <li><strong>Controle</strong> de EBD</li>
                                   </ul>
                                   <div class="price-actions">
                                           <?php 
                                      if($verplano['id']==4){
                                      ?>
                                      <a class="btn btn-inverse" href="javascript:;">Plano Atual</a>
                                      <?php }else{?>
                                      <a class="btn" href="javascript:;">Fazer Upgrade</a>
                                      <?php
                                      }
                                      ?>
                                   </div>
                               </div>
                           </div>
                        </div>
                     </div>		

							

						

					</div>

				</div>

			</div>

</div>	

</div>

<?php include ("footer.php"); ?>			