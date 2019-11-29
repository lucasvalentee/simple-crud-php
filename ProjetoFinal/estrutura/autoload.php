<?php
/**
 * Arquivo para carregar as classes necessárias
 */

spl_autoload_register('load');

function load($sNomeClasse) {
    $sExt     = '.php';
    $sCaminho = '../estrutura/' . $sNomeClasse . $sExt;
    if (file_exists($sCaminho)) {
        require_once $sCaminho;
    }
}

spl_autoload_register('load2');

function load2($sNomeClasse) {
    $sExt     = '.php';
    $sCaminho = 'estrutura/' . $sNomeClasse . $sExt;
    if (file_exists($sCaminho)) {
        require_once $sCaminho;
    }
}

spl_autoload_register('load3');

function load3($sNomeClasse) {
    $sExt     = '.php';
    $sCaminho = $sNomeClasse.$sExt;
    if(file_exists($sCaminho)) {
        require_once $sCaminho;
    }
}

spl_autoload_register('load4');
function load4($sNomeClasse) {
    $sExt = '.php';
    $aNome = preg_split('A-Z', $sNomeClasse);
}