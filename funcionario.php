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
    <style>
        td{
            border-bottom: 1px darkmagenta;
        }
    </style>
    <body>
    <table>
        <thead>
            <th>Cod</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Cargo</th>
            <th>Escala</th>
            <th>Turno</th>
            <th>Admissao</th>
            <th>Demissao</th>
            <th>Salario</th>
            <th>VT</th>
            <th>VR</th>
            <th>VA</th>
        </thead>
        <tbody>
            <?php do {?>
                <tr>
                    <td><?php echo $row['cod_cliente'];?></td>
                    <td><?php echo $row['nome'];?></td>
                    <td><?php echo $row['cpf'];?></td>
                    <td><?php echo $row['cargo'];?></td>
                    <td><?php echo $row['escala'];?></td>
                    <td><?php echo $row['turno'];?></td>
                    <td><?php echo $row['admissao'];?></td>
                    <td><?php echo $row['demissao'];?></td>
                    <td><?php echo $row['salario'];?></td>
                    <td><?php echo $row['vt'];?></td>
                    <td><?php echo $row['vr'];?></td>
                    <td><?php echo $row['va'];?></td>

                </tr>
            <?php } while ($row = $lista->fetch())?>
        </tbody>
    </table> 
    </body>
</head>
<body>
    
</body>
</html>