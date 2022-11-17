<?php
include 'config.php';
$dataAtual = new DateTime();


echo $dataAtual->format('d/m/Y');

{
echo '<br>'; 
$dataSistema = new DateTime();
$dataNasc = new DateTime('2004/10/27');
print_r($dataNasc);
echo '<br>';
$intervalo = $dataNasc->diff($dataSistema);
print_r($intervalo);
echo '<br>';
echo $intervalo->format('%y anos, %m meses e %d dias');
}
