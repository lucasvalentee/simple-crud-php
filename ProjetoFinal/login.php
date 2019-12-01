<?php
$oCampo = new Campos();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="assets/css/loginStyle.css" rel="stylesheet" type="text/css"/>
        <link href="assets/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/bootstrap/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="assets/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="assets/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <form id='formulario_login' class="form-group" method="post" action="index.php">
            <div id='div_login'>
                <table id="tabela_login">
                    <tr>
                        <td width="10%"><?= $oCampo->getLabelCampo('Login', 'login') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('login', Base::CAMPO_TEXTO, 'login', 'form-control') ?></td>
                    </tr>
                    <tr>
                        <td width="10%"><?= $oCampo->getLabelCampo('Senha', 'senha') ?></td>
                        <td width="50%"><?= $oCampo->getCampoNome('senha', Base::CAMPO_SENHA, 'senha', 'form-control') ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="botoes">
                                <input type="reset"  value="Cancelar" class="btn btn-default">
                                <input type="submit" value="Login"    class="btn btn-success" name="acesso">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </body>
</html>