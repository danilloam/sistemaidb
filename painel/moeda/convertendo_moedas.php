<?php
# Converte o pre�o de um produto em D�lar para Real

$preco = "215.123,12";


$valor = str_replace("." , "" , $preco ); // Primeiro tira os pontos
$valor1 = str_replace("," , "." , $valor); // Depois tira a v�rgula
$valor2= $valor1*2;
echo "<b>Pre�o $valor2</b>";
?>
