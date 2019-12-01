<?php
require_once 'estrutura/autoload.php';
include_once 'conexao.php';
$bVerifica['cadastrar'] = true;
$bVerifica['alterar']   = false;
$bVerifica['excluir']   = false;
$oCampo = new Campos();

if(isset($_POST['gravar'])) {
    try {
        $stmt = $conn->prepare(
            'INSERT INTO clientes (idcliente, nomeCompanhia, nomeContato, tituloContato, endereco, cidade, regiao, cep, pais, telefone, fax)
                  VALUES (:idcliente, :nomeCompanhia, :nomeContato, :tituloContato, :endereco, :cidade, :regiao, :cep, :pais, :telefone, :fax)');
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
                        <td width="15%"><?= $oCampo->getLabelCampo('ID do Cliente', 'id_cliente') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('id_cliente', Base::CAMPO_TEXTO, 'id_cliente', 'form-control', 5) ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('Nome da Companhia', 'nome_companhia') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('nome_companhia', Base::CAMPO_TEXTO, 'nome_companhia', 'form-control', 40) ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('Nome do Contato', 'nome_contato') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('nome_contato', Base::CAMPO_TEXTO, 'nome_contato', 'form-control', 30) ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('Título do Contato', 'titulo_contato') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('titulo_contato', Base::CAMPO_TEXTO, 'titulo_contato', 'form-control', 30) ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('Endereço', 'endereco') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('endereco', Base::CAMPO_TEXTO, 'endereco', 'form-control', 60) ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('Cidade', 'cidade') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('cidade', Base::CAMPO_TEXTO, 'cidade', 'form-control', 15) ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('Região', 'regiao') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('regiao', Base::CAMPO_TEXTO, 'regiao', 'form-control', 15) ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('CEP', 'cep') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('cep', Base::CAMPO_TEXTO, 'cep', 'form-control', 10) ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('País', 'pais') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('pais', Base::CAMPO_TEXTO, 'pais', 'form-control', 15) ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('Telefone', 'telefone') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('telefone', Base::CAMPO_NUMERICO, 'telefone', 'form-control', 24) ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('FAX', 'fax') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('fax', Base::CAMPO_TEXTO, 'fax', 'form-control', 24) ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="botoes">
                                <input type="reset"  value="Cancelar" class="btn btn-default">
                                <input type="submit" value="Gravar"   class="btn btn-success" name="gravar">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </body>
</html>