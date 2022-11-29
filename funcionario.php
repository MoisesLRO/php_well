<?php 
    include 'conecta.php';
    // criando consulta SQL
    $consultaSql = "SELECT * FROM funcionario WHERE demissao is NULL";
    $consultaSqlArq = "SELECT * FROM funcionario WHERE DELETED is NOT NULL ORDER BY nome ASC, cod_func asc"; 
    // buscando e listando os dados da tabela (completa)
    $lista = $conn->query($consultaSql);
    $listaArq = $conn->query($consultaSqlArq);
    // separar em linhas
    $row = $lista->fetch();
    $rowArq = $listaArq->fetch();
    // retornando o número de linhas
    $num_rows = $lista->rowCount();
    $num_rows_arq = $listaArq->rowCount();
    if(isset($_POST['bt-enviar']));
    
    // buscar funcionario por ID
    $cod_func = 0;
    $nome = "";
    $cpf = "";
    $escala = "";
    $turno = "";
    $admissao = "";
    $demissao = "";
    $salario = "";
    $vt = "";
    $vr = "";
    $va = "";
    if(isset($_GET['codedit']))
    {
        $funcionario = $conn->query(
            "SELECT * FROM funcionario where cod_func = ".$_GET['codedit'])->fetch();
        $nome = $funcionario['nome']
        $cpf = $funcionario['cpf'];
        $escala = $funcionario['escala'];
        $turno = $funcionario['turno'];
        $admissao = $funcionario['admissao'];
        $demissao = $funcionario['demissao'];
        $salario = $funcionario['salario'];
        $vt = $funcionario['vt'];
        $vr = $funcionario['vr'];
        $va = $funcionario['va'];
        $cod_func = $_GET['codedit']
    }
    // arquivando registro de funcionarios
    if(isset($_GET['codarq']))
    {
        $funcionario = $conn->query(
            'UPDATE funcionario SET DELETED = NOW() WHERE cod_func'.$_GET['codarq'])->fetch();
            header('location: funcionario.php');   
    }
    // excluindo definitivamente registro de funcionarios
    if(isset($_GET['codedel']))
    {
        $funcionario = $conn->query
            'DELETE FROM funcionario where cod_func = '.$_GET['coddel']->fetch();
            header('location: funcionario.php');
    }
    // atualiza o registro do funcionario
    if(isset($_POST['alterar']))
    {
        $cod_func = $_POST['cod_func'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $cargo = $_POST['cargo'];
        $escala = $_POST['escala']; 
        $turno = $_POST['turno'];
        $admissao = $_POST['admissao'];
        $demissao = $_POST['demissao'];
        $salario = $_POST['salario'];
        $vt = $_POST['vt'];
        $vr = $_POST['vr'];
        $va = $_POST['va'];
        $resultado = $conn->query("UPDATE cliente SET 
        nome = '$nome', cpf = '$cpf', cargo = '$cargo', escala = '$escala',
        turno = '$turno', admissao = '$admissao',
        demissao = '$demissao', vt = '$vt', vr = '$vr', va = '$va'
        WHERE cod_func = $cod_func");
        header('location: funcionario.php');
    }
    // insere funcionario na tabela
    if(isset($_POST['inserir']))
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
        $insertSql = "INSERT funcionario (nome, cpf, cargo, escala, turno, admissao, demissao, salario, vt, vr, va ) VALUES('$nome','$cpf','$cargo','$escala','$turno','$admissao','$demissao','$salario','$vt','$vr','$va');";
        $resultado = $conn->query($insertSql);
        header('location: funcionario.php');
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
                    <td><?php echo $row['cod_func'];?></td>
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