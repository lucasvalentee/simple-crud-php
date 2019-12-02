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
        
        $oQuery = $conn->prepare('SELECT * FROM clientes');
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
            <th>ID Cliente</th>
            <th>Nome da Companhia</th>
            <th>Endereço</th>
            <th>Cidade</th>
            <th>Região</th>
            <th>CEP</th>
            <th>País</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
<?php
        if($aResultado) {
            foreach($aResultado as $oResultado) {
                ?>
                <tr>
                    <td><?=$oResultado['IDCliente']?></td>
                    <td><?=$oResultado['NomeCompanhia']?></td>
                    <td><?=$oResultado['Endereco']?></td>
                    <td><?=$oResultado['Cidade']?></td>
                    <td><?=$oResultado['Regiao']?></td>
                    <td><?=$oResultado['CEP']?></td>
                    <td><?=$oResultado['Pais']?></td>
                    <td><?=$oResultado['Telefone']?></td>
                    <td>
                        <a style="color:black" href="manutencao_cliente.php?id=<?=$oResultado['IDCliente']?>">Alterar</a>
                        <a style="color:black" href="exibicao_cliente.php?deletar=true&id=<?=$oResultado['IDCliente']?>">Excluir</a>
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