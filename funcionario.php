<?php 
    include 'conecta.php';
    // criando consulta SQL
    $filtroSql = "SELECT * FROM funcionario WHERE demissao is NULL";

    // buscando e listando os dados da tabela (completa)
    $lista = $conn->query($consultaSql);

    // separar em linhas
    $row = $lista->fetch();

    // retornando o número de linhas
    $num_tows = $lista->rowCount();

    if(isset($_POST['bt-enviar']))
{
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $cargo = $_POST['cargo'];
    $escala = $_POST['escala'];
    $turno = $POST['turno'];
    $admissao = $_POST['admissao'];
    $demissao = $_POST['demissao'];
    $salario = $_POST['salario'];
    $vt = $_POST['vt'];
    $vr = $_POST['vr'];
    $va = $_POST['va'];
    $InsertSql = "insert funcionario (nome, cpf, cargo, escala, turno, admissao, demissao, salario, vt, vr, va ) values('$nome','$cpf','$cargo','$escala','$turno','$admissao','$demissao','$salario','$vt','$vr','$va')";
    $resultado = ('location: funcionario;php')
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionario</title>
</head>
<body>
    
</body>
</html>