<?php
require 'estrutura/autoload.php';
include_once 'conexao.php';
$oCampo = new Campos();

$sNomeBotao     = 'gravar';

$sIdOrdem              = '';
$sIdCliente            = '';
$sIdFuncionario        = '';
$sDataOrdem            = '';
$sDataRequisicao       = '';
$sDataEntrega          = '';
$sEnviadoPor           = '';
$fFrete                = '';
$sNomeDestinatario     = '';
$sEnderecoDestinatario = '';
$sCidadeDestinatario   = '';
$sRegiaoDestinatario   = '';
$sCepDestinatario      = '';
$sPaisDestinatario     = '';

if(isset($_POST['gravar'])) {
    try {
        $stmt = $conn->prepare(
            'INSERT INTO ordens (idordem, idcliente, idfuncionario, dataordem, datarequisicao, dataentrega, 
                                 enviadopor, frete, nomedestinatario, enderecodestinatario, cidadedestinatario, 
                                 regiaodestinatario, cepdestinatario, paisdestinatario)
                  VALUES (:idordem, :idcliente, :idfuncionario, :dataordem, :datarequisicao, :dataentrega, :enviadopor, :frete, 
                          :nomedestinatario, :enderecodestinatario, :cidadedestinatario, :regiaodestinatario, :cepdestinatario, :paisdestinatario)');
        $stmt->execute(array('idordem'              => $_POST['id_ordem']
                            ,'idcliente'            => $_POST['id_cliente']
                            ,'idfuncionario'        => $_POST['id_funcionario']
                            ,'dataordem'            => $_POST['data_ordem']
                            ,'datarequisicao'       => $_POST['data_requisicao']
                            ,'dataentrega'          => $_POST['data_entrega']
                            ,'enviadopor'           => $_POST['enviado_por']
                            ,'frete'                => $_POST['frete']
                            ,'nomedestinatario'     => $_POST['nome_destinatario']
                            ,'enderecodestinatario' => $_POST['endereco_destinatario']
                            ,'cidadedestinatario'   => $_POST['cidade_destinatario']
                            ,'regiaodestinatario'   => $_POST['regiao_destinatario']
                            ,'cepdestinatario'      => $_POST['cep_destinatario']
                            ,'paisdestinatario'     => $_POST['pais_destinatario']));
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
}
else if(isset($_POST['gravar_alterar'])) {
    try {
        $stmt = $conn->prepare(
            "UPDATE ordens 
                SET idordem              = $_POST[id_ordem]
                   ,idcliente            = $_POST[id_cliente]
                   ,idfuncionario        = $_POST[id_funcionario]
                   ,dataordem            = $_POST[data_ordem]
                   ,datarequisicao       = $_POST[data_requisicao]
                   ,dataentrega          = $_POST[data_entrega]
                   ,enviadopor           = $_POST[enviado_por]
                   ,frete                = $_POST[frete]
                   ,nomedestinatario     = $_POST[nome_destinatario]
                   ,enderecodestinatario = $_POST[endereco_destinatario]
                   ,cidadedestinatario   = $_POST[cidade_destinatario]
                   ,regiaodestinatario   = $_POST[regiao_destinatario]
                   ,cepdestinatario      = $_POST[cep_destinatario]
                   ,paisdestinatario     = $_POST[pais_destinatario]
              WHERE IDOrdem = '$_POST[id_ordem]'");
        
        $stmt->execute();
        
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
}

if(isset($_GET['id'])) {
    include_once 'conexao.php';
    try {
        $oQuery = $conn->prepare("SELECT * FROM ordens WHERE IDOrdem = '$_GET[id]'");
        $oQuery->execute();

        $oResultado = $oQuery->fetchAll();
        
        foreach($oResultado as $aResultado) {
            $sIdOrdem              = $aResultado['IDOrdem'];
            $sIdCliente            = $aResultado['IDCliente'];
            $sIdFuncionario        = $aResultado['IDFuncionario'];
            $sDataOrdem            = $aResultado['DataOrdem'];
            $sDataRequisicao       = $aResultado['DataRequisicao'];
            $sDataEntrega          = $aResultado['DataEntrega'];
            $sEnviadoPor           = $aResultado['EnviadoPor'];
            $fFrete                = $aResultado['Frete'];
            $sNomeDestinatario     = $aResultado['NomeDestinatario'];
            $sEnderecoDestinatario = $aResultado['EnderecoDestinatario'];
            $sCidadeDestinatario   = $aResultado['CidadeDestinatario'];
            $sRegiaoDestinatario   = $aResultado['RegiaoDestinatario'];
            $sCepDestinatario      = $aResultado['CepDestinatario'];
            $sPaisDestinatario     = $aResultado['PaisDestinatario'];
            $sNomeBotao            = 'gravar_alterar';
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
        <form id='formulario_cadastro_ordem' class="form-group" method="post">
            <div class='tela_ordem' id='div_cadastro_ordem'>
                <table class='tela_ordem' id="tabela_cadastro">
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('ID da Ordem', 'id_ordem') ?></td>
                        <?php
                        if(isset($_GET['id'])) {
                        ?>
                            <td width="50%"><?= $oCampo->getCampoNome('id_ordem', Base::CAMPO_TEXTO, 'id_ordem', 'form-control', 5, $sIdOrdem, 'readonly') ?></td>
                        <?php
                        }
                        else {
                        ?>
                            <td width="50%"><?= $oCampo->getCampoNome('id_ordem', Base::CAMPO_TEXTO, 'id_ordem', 'form-control', 5, $sIdOrdem) ?></td>
                        <?php
                        }
                        ?>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('Cliente', 'id_cliente') ?></td>
                        <td>
                            <select name='id_cliente' class="form-control">
                    <?php
                        $oQueryCliente = $conn->prepare('SELECT * FROM clientes');
                        $oQueryCliente->execute();
                        
                        $oClientes = $oQueryCliente->fetchAll();
                        foreach($oClientes as $aClientes) {
                            ?>
                                <option value='<?= $aClientes['IDCliente'] ?>'><?= $aClientes['NomeCompanhia'] ?></option>
                            <?php
                        }
                    ?>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('Enviado Por', 'enviado_por') ?></td>
                        <td>
                            <select name='enviado_por' class="form-control">
                    <?php
                        $oQueryTransportadora = $conn->prepare('SELECT * FROM transportadoras');
                        $oQueryTransportadora->execute();
                        
                        $oTransportadora = $oQueryTransportadora->fetchAll();
                        foreach($oTransportadora as $aTransportadora) {
                            ?>
                                <option value='<?= $aTransportadora['IDTransportadora'] ?>'><?= $aTransportadora['NomeConpanhia'] ?></option>
                            <?php
                        }
                    ?>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('Funcionário', 'id_funcionario') ?></td>
                        <td>
                            <select name='id_funcionario' class="form-control">
                    <?php
                        $oQueryFuncionarios = $conn->prepare('SELECT * FROM funcionarios');
                        $oQueryFuncionarios->execute();
                        
                        $oFuncionarios = $oQueryFuncionarios->fetchAll();
                        foreach($oFuncionarios as $aFuncionarios) {
                            ?>
                                <option name='id_funcionario' <?= ($sIdFuncionario == $aFuncionarios['IDFuncionario']) ? 'selected' : '' ?> value='<?= $aFuncionarios['IDFuncionario'] ?>'><?= $aFuncionarios['Nome'].' '.$aFuncionarios['Sobrenome'] ?></option>
                            <?php
                        }
                    ?>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('Data da Ordem', 'data_ordem') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('data_ordem', Base::CAMPO_DATA, 'data_ordem', 'form-control', '', $sDataOrdem) ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('Data da Requisição', 'data_requisicao') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('data_requisicao', Base::CAMPO_DATA, 'data_requisicao', 'form-control', '', $sDataRequisicao) ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('Data da Entrega', 'data_entrega') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('data_entrega', Base::CAMPO_DATA, 'data_entrega', 'form-control', '', $sDataEntrega) ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('Frete', 'frete') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('frete', Base::CAMPO_NUMERICO, 'frete', 'form-control', '', $fFrete) ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('Nome do Destinatário', 'nome_destinatario') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('nome_destinatario', Base::CAMPO_TEXTO, 'nome_destinatario', 'form-control', 40, $sNomeDestinatario) ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('Endereço do Destinatário', 'endereco_destinatario') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('endereco_destinatario', Base::CAMPO_TEXTO, 'endereco_destinatario', 'form-control', 60, $sEnderecoDestinatario) ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('Cidade do Destinatário', 'cidade_destinatario') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('cidade_destinatario', Base::CAMPO_TEXTO, 'cidade_destinatario', 'form-control', 15, $sCidadeDestinatario) ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('Região do Destinatário', 'regiao_destinatario') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('regiao_destinatario', Base::CAMPO_TEXTO, 'regiao_destinatario', 'form-control', 15, $sRegiaoDestinatario) ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('CEP do Destinatário', 'cep_destinatario') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('cep_destinatario', Base::CAMPO_TEXTO, 'cep_destinatario', 'form-control', 10, $sCepDestinatario) ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('País do Destinatário', 'pais_destinatario') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('pais_destinatario', Base::CAMPO_TEXTO, 'pais_destinatario', 'form-control', 15, $sPaisDestinatario) ?></td>
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
