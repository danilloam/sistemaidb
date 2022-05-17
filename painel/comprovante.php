<?php
include("configuracao.php");
include("conexao/conecta.php");
$id=$_GET["rel"];
$igreja_id=$_GET["c"];
$regiao_id=$_GET["reg"];
$estado_id=$_GET["e"];
$selectrelatorio1 = mysqli_query($conecta,"SELECT * FROM pagamentos WHERE igreja_id={$igreja_id} and regiao_id={$regiao_id} and id={$id}");
$resultadorelatorio1= mysqli_fetch_array($selectrelatorio1);
$comprovante=$resultadorelatorio1['comprovante'];
?>


<html>
<body>
<img src="<?php echo "comprovantes/".$regiao_id."/".$estado_id."/".$igreja_id."/".$comprovante;?>" width="500"/>
</body>

</html>