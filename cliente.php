<?php
include 'conecta.php'; 
// criando consulta SQL
$consultaSql = "SELECT * FROM cliente";
$filtroSql = "SELECT * FROM funcionario WHERE demissao is NULL";

// buscando e listando os dados da tabela (completa)
$lista = $conn->query($consultaSql);

//filtrando 
// separar em linhas
$row = $lista->fetch();

// retornando o número de linhas
$num_tows = $lista->rowCount();

if(isset($_POST['bt-enviar']))
{
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $InsertSql = "insert cliente (nome, cpf) values('$nome','$cpf')";
    $resultado = ('location: cliente;php')
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <style>
        td{
            border-bottom: 1px solid red;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <th>Cod</th>
            <th>Nome</th>
            <th>CPF</th>
        </thead>
        <tbody>
            <?php do {?>
                <tr>
                    <td><?php echo $row['cod_cliente'];?></td>
                    <td><?php echo $row['nome'];?></td>
                    <td><?php echo $row['cpf'];?></td>
                </tr>
            <?php } while ($row = $lista->fetch())?>
        </tbody>
    </table> 
    </body>
            
</html>