
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
?>