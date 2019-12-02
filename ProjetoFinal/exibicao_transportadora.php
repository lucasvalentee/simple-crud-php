<?php
    include_once 'conexao.php';
    
    if(isset($_GET['id']) && isset($_GET['deletar'])) {
        try {
            $sId = $_GET['id'];
            $oDelete = $conn->prepare("DELETE FROM transportadoras WHERE IDTransportadora = '$sId'");
            $oDelete->execute();
        } 
        catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
    
    try {
        
        $oQuery = $conn->prepare('SELECT * FROM transportadoras');
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
            <th>ID Transportadora</th>
            <th>Nome da Companhia</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
<?php
        if($aResultado) {
            foreach($aResultado as $oResultado) {
                ?>
                <tr>
                    <td><?=$oResultado['IDTransportadora']?></td>
                    <td><?=$oResultado['NomeConpanhia']?></td>
                    <td><?=$oResultado['Telefone']?></td>
                    <td>
                        <a style="color:black" href="exibicao_transportadora.php?deletar=true&id=<?=$oResultado['IDTransportadora']?>">Excluir</a>
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