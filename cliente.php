<?php
include 'conecta.php'; 
// criando consulta SQL
$consultaSql = "SELECT * FROM cliente";
$consultaSqlArq= "SELECT * FROM cliente where deleted is not null order by asc, cod_cliente asc";

// buscando e listando os dados da tabela (completa)
$lista = $conn->query($consultaSql);
$listaArq = $conn->query($consultaSqlArq);
 
// separar em linhas
$row = $lista->fetch();
$rowArq = $lista->fetch();

// retornando o número de linhas
$num_rows = $lista->rowCount();
$num_rows_arq = $listaArq->rowCount();

// buscar cliente por id
$nome = "";
$cpf = "";
$cod = "0";
if(isset($_GET['codedit']))
{
    $cliente = $conn->query(
        "select * from cliente where cod_cliente = ".$_GET['codedit'])->fetch();
    $nome = $cliente['nome'];
    $cpf = $cliente['cpf'];
    $cod = $_GET['codedit'];
}

// arquivando registro de clientes
if(isset($_GET['codarq']))
{
    $cliente = $conn->query(
        'UPDATE cliente SET DELETED =
         NOW() WHERE cod_cliente ='.$_GET['codarq'])->fetch();
    header('location: cliente.php');
}

// restaurando registro de cliente
if(isset($_GET['codrest']))
{
    $cliente = $conn->query(
        'UPDATE cliente SET DELETED =
         NULL WHERE cod_cliente ='.$_GET['codrest'])->fetch();
        header('location: cliente.php');
    }

// excluindo definitivamnete registro de clientes
if(isset($_GET['coddel']))
{
    $cliente = $conn->query(
        'delete from cliente where cod_cliente = '.$_GET['coddel'])->fetch();
    header('location: cliente.php');
}

// atualiza o registro de cliente
if(isset($_GET['alterar']))
{
    $cod = $_POST['cod'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $resultado = $conn->query("UPDATE cliente SET nome = '$nome', cpf = '$cpf' WHERE cod_cliente = $cod");
    header('location: cliente.php');
} 

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes (<?php echo $num_rows?>)</title>
    <link rel="stylesheet" href="css/style.css">
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