<?php
    include_once 'conexao.php';
    
    if(isset($_GET['id']) && isset($_GET['deletar'])) {
        try {
            $sId = $_GET['id'];
            
            $oQueryBusca = $conn->prepare("SELECT * FROM ordens WHERE IDCliente = '$sId'");
            $oQueryBusca->execute();
            $aResultado  = $oQueryBusca->fetchAll();            
            
            foreach($aResultado as $oResultado) {                
                $oDeleteOrdensDetalhes = $conn->prepare("DELETE FROM ordens_detalhes WHERE IDOrdem = '{$oResultado['IDOrdem']}'");
                $oDeleteOrdensDetalhes->execute();
                
                $oDeleteOrdens = $conn->prepare("DELETE FROM ordens WHERE IDOrdem = {$oResultado['IDOrdem']}");
                $oDeleteOrdens->execute();
            }
            $oDelete = $conn->prepare("DELETE FROM clientes WHERE IDCliente = '$sId'");
            $oDelete->execute();
        } 
        catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
        }
    
    try {
        
        $oQuery = $conn->prepare("SELECT ordens.*, funcionarios.Nome as nome_funcionario, funcionarios.Sobrenome as sobrenome_funcionario, 
                                         transportadoras.NomeConpanhia as nome_transportadora 
                                    FROM ordens, funcionarios, transportadoras
                                   WHERE ordens.idfuncionario = funcionarios.idfuncionario
                                     AND ordens.enviadopor = transportadoras.idtransportadora");
        $oQuery->execute();

        $aResultado = $oQuery->fetchAll();     
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="assets/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/bootstrap/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="assets/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="assets/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/cadatro.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
            include 'menu.php';
        ?>
    <table border="1" class="table table-striped">
        <tr>
            <th>ID Ordem</th>
            <th>Funcionário</th>
            <th>Enviado Por</th>
            <th>Data Ordem</th>
            <th>Data Requisição</th>
            <th>Data Entrega</th>
            <th>Nome Destinatário</th>
            <th>Ações</th>
        </tr>
<?php
        if($aResultado) {
            foreach($aResultado as $oResultado) {
                ?>
                <tr>
                    <td><?=$oResultado['IDCliente']?></td>
                    <td><?=$oResultado['nome_funcionario'].' '.$oResultado['sobrenome_funcionario']?></td>
                    <td><?=$oResultado['nome_transportadora']?></td>
                    <td><?=$oResultado['DataOrdem']?></td>
                    <td><?=$oResultado['DataRequisicao']?></td>
                    <td><?=$oResultado['DataEntrega']?></td>
                    <td><?=$oResultado['NomeDestinatario']?></td>
                    <td>
                        <a style="color:black" href="manutencao_cliente.php?id=<?=$oResultado['IDOrdem']?>">Alterar</a>
                        <a style="color:black" href="exibicao_cliente.php?deletar=true&id=<?=$oResultado['IDOrdem']?>">Excluir</a>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "Nenhum resultado retornado.";
        }
?>
    </table>
</body>
<?php
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }