<?php
require_once 'estrutura/autoload.php';
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
        <form id='formulario_login' class="form-group">
            <div id='div_login'>
                <table>
                    <tr>
                        <td class="label"><?= $oCampo->getLabel('Login', 'login') ?></td>
                        <td><?= $oCampo->getCampoNome('login', Base::CAMPO_TEXTO, 'login', 'form-control') ?></td>
                    </tr>
                </table>
            </div>
        </form>
    </body>
</html>