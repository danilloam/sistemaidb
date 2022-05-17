<div id="main-content">
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="span6">
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						<h3 class="page-title">
							Escritório Virtual
							<small> Informações Gerais </small>
						</h3>
						<ul class="breadcrumb">
							<li>
                                <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
							</li>
                            <li>
                                <a href="index.php">Cafx</a> <span class="divider">&nbsp;</span>
                            </li>
							<li><a href="#">Painel</a><span class="divider-last">&nbsp;</span></li>
						</ul>	
						</div>
						<div class="span6">

						</div>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- BEGIN PAGE HEADER-->
				<?php
		
		$niv1 = mysql_query("SELECT * FROM indicados WHERE indicador_nivel1='{$login}'");
		$ativo1 = 0;
		$pendente1 = 0;
		while($cont1 = mysql_fetch_array($niv1)){
		$lg = $cont1['login'];
		$n1 = mysql_query("SELECT * FROM usuarios WHERE login='{$lg}'");
		$c1 = mysql_fetch_array($n1);
		if ($c1['status'] == "pendente")
		{
		$pendente1++;
		}
		else if ($c1['status'] == "ativo")
		{
		$ativo1++;
		}
		
		}
		
		
		$niv2 = mysql_query("SELECT * FROM indicados WHERE indicador_nivel2='{$login}'");
		$ativo2 = 0;
		$pendente2 = 0;
		while($cont2 = mysql_fetch_array($niv2)){
		$lg = $cont2['login'];
		$n2 = mysql_query("SELECT * FROM usuarios WHERE login='{$lg}'");
		$c2 = mysql_fetch_array($n2);
		if ($c2['status'] == "pendente")
		{
		$pendente2++;
		}
		else if ($c2['status'] == "ativo")
		{
		$ativo2++;
		}
		
		}
		
		
		
		
		$niv3 = mysql_query("SELECT * FROM indicados WHERE indicador_nivel3='{$login}'");
		$ativo3 = 0;
		$pendente3 = 0;
		while($cont3 = mysql_fetch_array($niv3)){
		$lg = $cont3['login'];
		$n3 = mysql_query("SELECT * FROM usuarios WHERE login='{$lg}'");
		$c3 = mysql_fetch_array($n3);
		if ($c3['status'] == "pendente")
		{
		$pendente3++;
		}
		else if ($c3['status'] == "ativo")
		{
		$ativo3++;
		}
		
		}
		
		
		
		
		$niv4 = mysql_query("SELECT * FROM indicados WHERE indicador_nivel4='{$login}'");
		$ativo4 = 0;
		$pendente4 = 0;
		while($cont4 = mysql_fetch_array($niv4)){
		$lg = $cont4['login'];
		$n4 = mysql_query("SELECT * FROM usuarios WHERE login='{$lg}'");
		$c4 = mysql_fetch_array($n4);
		if ($c4['status'] == "pendente")
		{
		$pendente4++;
		}
		else if ($c4['status'] == "ativo")
		{
		$ativo4++;
		}
		
		}
		
		
		
		
		$niv5 = mysql_query("SELECT * FROM indicados WHERE indicador_nivel5='{$login}'");
		$ativo5 = 0;
		$pendente5 = 0;
		while($cont5 = mysql_fetch_array($niv5)){
		$lg = $cont5['login'];
		$n5 = mysql_query("SELECT * FROM usuarios WHERE login='{$lg}'");
		$c5 = mysql_fetch_array($n5);
		if ($c5['status'] == "pendente")
		{
		$pendente5++;
		}
		else if ($c5['status'] == "ativo")
		{
		$ativo5++;
		}
		
		}
		$totalpendente = $pendente1+$pendente2+$pendente3+$pendente4+$pendente5;
		$valorpendente = $totalpendente*10;
		$totalativo = $ativo1+$ativo2+$ativo3+$ativo4+$ativo5;
		$valorativo = $totalativo*10;
		
		$conts = mysql_query("SELECT * FROM visitantes WHERE referencia='{$login}'");
		$contpin = mysql_num_rows($conts);
		?>
				<div class="row-fluid">
					<div class="span12">
					<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-reorder"></i>Meus Ganhos</h4>
								</div>
								<div class="widget-body">
		<table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Ganhos</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Meus Ganhos no Sistema<div style="text-align:right;"><B>Ganhos:</B> R$ <?php echo $dinheiro;?></div></td>
                                </tr>
								<tr>
                                    <td>Valor Baseado na Quantidade de Indicados Ativos<div style="text-align:right;"><B>Ganhos:</B> R$ <?php echo number_format($valorativo,2,',','.');?></div></td>
                                </tr>
								<tr>
                                    <td>Valor Baseado na Quantidade de Indicados Pendentes<div style="text-align:right;"><B>À Receber:</B> R$ <?php echo number_format($valorpendente,2,',','.');?></div></td>
                                </tr>
                                </tbody>
                            </table>	
								</div>
							</div>
							
							<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-reorder"></i>Liberar Usuários que Fizeram Doações</h4>
								</div>
								<div class="widget-body">
								<table class="table table-striped table-bordered table-advance table-hover">
                                        <thead>
                                        <tr>
                                            <th>Usuário</th>
                                            <th>Enviado Dia</th>
                                            <th>Comprovante</th>
                                            <th>Visualizar Comprovante</th>
                                            <th>Situação</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
							$sql=mysql_query("SELECT
  `usuarios`.`login`,
  `usuarios`.`nome`, 
  `pagamentos`.`login` AS `login1`,
  `pagamentos`.`indicador`,
  `pagamentos`.`status`,
  `pagamentos`.`comprovante`,
  `pagamentos`.`hora`
FROM
  `pagamentos`
  INNER JOIN `usuarios` ON `usuarios`.`login` = `pagamentos`.`indicador` where indicador='$login' and pagamentos.status='nao pago' OR pagamentos.status='pendente'");
							while($ver=mysql_fetch_array($sql)){ ?>	
                                        <tr>
                                        	<td><?php echo $ver["login1"]; ?></td>
                                        	<td><?php echo date("d-m-Y H:i:s", $ver["hora"]);?></td>
                                        	<td><?php echo $ver["comprovante"]; ?> </td>
                                        	<td><a id="single" href="http://cafx.com.br/painel/comprovantes/<?php echo $ver["comprovante"]; ?>" class="btn btn-info"><i class="icon-arrow-down"></i> Visualizar</a></td>
                                        	<td><a href="set.php?doador=<?php echo $ver["login1"]; ?>&login=<?php echo $login; ?>&liberar=sim" class="btn btn-success"><i class="icon-thumbs-up"></i> Liberar Usuário</a></td>
                                        </tr>
                                       <?php } ?> 	
                                        </tbody>
                                        </table>	
								</div>
							</div>	
					</div>
				</div>
			</div>
</div>				