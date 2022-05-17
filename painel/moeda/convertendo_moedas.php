<?php
# Converte o preço de um produto em Dólar para Real

$preco = "215.123,12";


$valor = str_replace("." , "" , $preco ); // Primeiro tira os pontos
$valor1 = str_replace("," , "." , $valor); // Depois tira a vírgula
$valor2= $valor1*2;
echo "<b>Preço $valor2</b>";
?>
