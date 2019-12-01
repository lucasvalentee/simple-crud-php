<?php

$bVerifica['cadastrar'] = true;
$bVerifica['alterar']   = false;
$bVerifica['excluir']   = false;
$oCampo = new Campos();
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
        <form id='formulario_cadastro' class="form-group" method="post" action="index.php">
            <div id='div_cadastro'>
                <table id="tabela_cadastro">
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('Nome da Companhia', 'nome_companhia') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('nome_companhia', Base::CAMPO_TEXTO, 'nome_companhia', 'form-control') ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('Nome do Contato', 'nome_contato') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('nome_contato', Base::CAMPO_TEXTO, 'nome_contato', 'form-control') ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('Título do Contato', 'titulo_contato') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('titulo_contato', Base::CAMPO_TEXTO, 'titulo_contato', 'form-control') ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('Endereço', 'endereco') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('endereco', Base::CAMPO_TEXTO, 'endereco', 'form-control') ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('Cidade', 'cidade') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('cidade', Base::CAMPO_TEXTO, 'cidade', 'form-control') ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('Região', 'regiao') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('regiao', Base::CAMPO_TEXTO, 'regiao', 'form-control') ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('CEP', 'cep') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('cep', Base::CAMPO_TEXTO, 'cep', 'form-control') ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('País', 'pais') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('pais', Base::CAMPO_TEXTO, 'pais', 'form-control') ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('Telefone', 'telefone') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('telefone', Base::CAMPO_NUMERICO, 'telefone', 'form-control') ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><?= $oCampo->getLabelCampo('FAX', 'fax') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('fax', Base::CAMPO_TEXTO, 'fax', 'form-control') ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="botoes">
                                <input type="reset"  value="Cancelar" class="btn btn-default">
                                <input type="submit" value="Gravar"   class="btn btn-success" name="acesso">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </body>
</html>