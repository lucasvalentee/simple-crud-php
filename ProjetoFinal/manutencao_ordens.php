<?php
require 'estrutura/autoload.php';
include_once 'conexao.php';
$oCampo = new Campos();

$sNomeBotao     = 'gravar';

$sIdOrdem            = '';
$sIdCliente          = '';
$sIdFuncionario      = '';
$sDataOrdem          = '';
$sDataRequisicao     = '';
$sDataEntrega        = '';
$sEnviadoPor         = '';
$iFrete              = '';
$sNomeDestinatario   = '';
$sCidadeDestinatario = '';
$sRegiaoDestinatario = '';
$sCepDestinatario    = '';
$sPaisDestinatario   = '';

if(isset($_POST['gravar'])) {
    try {
        $stmt = $conn->prepare(
            'INSERT INTO ordens (idordem, idcliente, idfuncionario, dataordem, datarequisicao, dataentrega, 
                                 enviadopor, frete, nomedestinatario, enderecodestinatario, cidadedestinatario, 
                                 regiaodestinatario, cepdestinatario, paisdestinatario)
                  VALUES (:idcliente, :nomeCompanhia, :nomeContato, :tituloContato, :endereco, :cidade, :regiao, :cep, :pais, :telefone, :fax)');
        $stmt->execute(array('idordem'              => $_POST['id_cliente']
                            ,'idcliente'            => $_POST['nome_companhia']
                            ,'idfuncionario'        => $_POST['nome_contato']
                            ,'dataordem'            => $_POST['titulo_contato']
                            ,'datarequisicao'       => $_POST['endereco']
                            ,'dataentrega'          => $_POST['cidade']
                            ,'enviadopor'           => $_POST['regiao']
                            ,'frete'                => $_POST['cep']
                            ,'nomedestinatario'     => $_POST['pais']
                            ,'enderecodestinatario' => $_POST['telefone']
                            ,'cidadedestinatario'   => $_POST['fax']
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
                SET idcliente      = '$_POST[id_cliente]'
                    ,nomeCompanhia = '$_POST[nome_companhia]' 
                    ,nomeContato   = '$_POST[nome_contato]'
                    ,tituloContato = '$_POST[titulo_contato]' 
                    ,endereco      = '$_POST[endereco]'
                    ,cidade        = '$_POST[cidade]'
                    ,regiao        = '$_POST[regiao]'
                    ,cep           = '$_POST[cep]'
                    ,pais          = '$_POST[pais]'
                    ,telefone      = '$_POST[telefone]'
                    ,fax           = '$_POST[fax]'
              WHERE IDCliente = '$_POST[id_cliente]'");
        
        $stmt->execute(array('idcliente'     => $_POST['id_cliente']
                            ,'nomeCompanhia' => $_POST['nome_companhia']
                            ,'nomeContato'   => $_POST['nome_contato']
                            ,'tituloContato' => $_POST['titulo_contato']
                            ,'endereco'      => $_POST['endereco']
                            ,'cidade'        => $_POST['cidade']
                            ,'regiao'        => $_POST['regiao']
                            ,'cep'           => $_POST['cep']
                            ,'pais'          => $_POST['pais']
                            ,'telefone'      => $_POST['telefone']
                            ,'fax'           => $_POST['fax']));
        
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
}


if(isset($_GET['id'])) {
    include_once 'conexao.php';
    try {
        $oQuery = $conn->prepare("SELECT * FROM ordens WHERE IDCliente = '$_GET[id]'");
        $oQuery->execute();

        $oResultado = $oQuery->fetchAll();
        
        foreach($oResultado as $aResultado) {
        $sIdCliente     = $aResultado['IDCliente'];
        $sNomeCompanhia = $aResultado['NomeCompanhia'];
        $sNomeContato   = $aResultado['NomeContato'];
        $sTituloContato = $aResultado['TituloContato'];
        $sEndereco      = $aResultado['Endereco'];
        $sCidade        = $aResultado['Cidade'];
        $sRegiao        = $aResultado['Regiao'];
        $sCep           = $aResultado['CEP'];
        $sPais          = $aResultado['Pais'];
        $sTelefone      = $aResultado['Telefone'];
        $sFax           = $aResultado['Fax'];
        $sNomeBotao     = 'gravar_alterar';
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
                            <select class="form-control">
                    <?php
                        $oQueryCliente = $conn->prepare('SELECT * FROM clientes');
                        $oQueryCliente->execute();
                        
                        $oClientes = $oQueryCliente->fetchAll();
                        foreach($oClientes as $aClientes) {
                            ?>
                                <option name='id_cliente' value='<?= $aClientes['IDCliente'] ?>'><?= $aClientes['NomeCompanhia'] ?></option>
                            <?php
                        }
                    ?>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('Transportadora', 'id_transportadora') ?></td>
                        <td>
                            <select class="form-control">
                    <?php
                        $oQueryTransportadora = $conn->prepare('SELECT * FROM transportadoras');
                        $oQueryTransportadora->execute();
                        
                        $oTransportadora = $oQueryTransportadora->fetchAll();
                        foreach($oTransportadora as $aTransportadora) {
                            ?>
                                <option name='id_transportadora' value='<?= $aTransportadora['IDTransportadora'] ?>'><?= $aTransportadora['NomeConpanhia'] ?></option>
                            <?php
                        }
                    ?>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('Funcionário', 'id_funcionario') ?></td>
                        <td>
                            <select class="form-control">
                    <?php
                        $oQueryFuncionarios = $conn->prepare('SELECT * FROM funcionarios');
                        $oQueryFuncionarios->execute();
                        
                        $oFuncionarios = $oQueryFuncionarios->fetchAll();
                        foreach($oFuncionarios as $aFuncionarios) {
                            ?>
                                <option name='id_funcionario' value='<?= $aFuncionarios['IDFuncionario'] ?>'><?= $aFuncionarios['Nome'].' '.$aFuncionarios['Sobrenome'] ?></option>
                            <?php
                        }
                    ?>
                        </select>
                        </td>
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
