<?php 
// dados vindos do formulário (frm-aluno) de index.php
if(isset($_POST['enviar'])){
    $nome = $_POST['txt-nome'];
    $email = $_POST['txt-email'];
    $data_nasc = $_POST['txt-data-nasc'];
    $dataT = new DateTime($data_nasc);
    $data_nasc = date_format($dataT,'d-M-Y');
    $aluno = array('nome'=>$nome,'email'=>$email, 'datan'=>$data_nasc);
    // chamada pra gravar dados na tabela no banco
     }

?>