<?php
require 'estrutura/autoload.php';
include_once 'conexao.php';

$oCampo = new Campos();

$sNomeBotao     = 'gravar';

$sIdTransportadora = '';
$sNomeCompanhia    = '';
$sTelefone         = '';

if(isset($_POST['gravar'])) {
    try {
        $stmt = $conn->prepare(
            'INSERT INTO transportadora (idtransportadora, nomeCompanhia, telefone');
        $stmt->execute(array('idtransportadora' => $_POST['id_transportadora']
                            ,'nomeCompanhia'    => $_POST['nome_companhia']
                            ,'telefone'         => $_POST['telefone']));
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
}
else if(isset($_POST['gravar_alterar'])) {
    try {
        $stmt = $conn->prepare(
            "UPDATE transportadora 
                SET idtransportadora = '$_POST[id_transportadora]'
                   ,nomeCompanhia    = '$_POST[nome_companhia]' 
                   ,Telefone         = '$_POST[telefone]'");
        
        $stmt->execute(array('idtransportadora' => $_POST['id_transportadora']
                            ,'nomeCompanhia'    => $_POST['nome_companhia']
                            ,'telefone'         => $_POST['telefone']));
        
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
}


if(isset($_GET['id'])) {
    include_once 'conexao.php';
    try {
        $oQuery = $conn->prepare("SELECT * FROM transportadora WHERE IDTransportadora = '{$_GET['id']}'");
        $oQuery->execute();

        $oResultado = $oQuery->fetchAll();
        
        foreach($oResultado as $aResultado) {
            $sIdTransportadora = $aResultado['IDTransportadora'];
            $sNomeCompanhia    = $aResultado['NomeConpanhia'];
            $sTelefone         = $aResultado['Telefone'];
            $sNomeBotao        = 'gravar_alterar';
        }  
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
}
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
            include_once 'menu.php';
        ?>
        <form id='formulario_cadastro' class="form-group" method="post">
            <div id='div_cadastro'>
                <table id="tabela_cadastro">
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('ID da Transportadora', 'id_transportadora') ?></td>
                        <?php
                        if(isset($_GET['id'])) {
                        ?>
                            <td width="50%"><?= $oCampo->getCampoNome('id_transportadora', Base::CAMPO_TEXTO, 'id_transportadora', 'form-control', '', $sIdTransportadora, 'readonly') ?></td>
                        <?php
                        }
                        else {
                        ?>
                            <td width="50%"><?= $oCampo->getCampoNome('id_transportadora', Base::CAMPO_TEXTO, 'id_transportadora', 'form-control', '', $sIdTransportadora) ?></td>
                        <?php
                        }
                        ?>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('Nome da Companhia', 'nome_companhia') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('nome_companhia', Base::CAMPO_TEXTO, 'nome_companhia', 'form-control', 40, $sNomeCompanhia) ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('Telefone', 'telefone') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('telefone', Base::CAMPO_TEXTO, 'telefone', 'form-control', 30, $sTelefone) ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="botoes">
                                <input type="reset"  value="Cancelar" class="btn btn-default">
                                <input type="submit" value="Gravar"   class="btn btn-success" name="<?= $sNomeBotao ?>">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </body>
</html>
