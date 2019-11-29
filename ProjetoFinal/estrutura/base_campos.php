<?php
/**
 * Classe responsável por montar os campos
 * @package EST
 * @author Lucas Valente
 * @since 28/11/2019
 */
class BaseCampos {
    
    const CAMPO_NUMERICO = 'numeric',
          CAMPO_TEXTO    = 'text',
          CAMPO_SENHA    = 'password';
    
    public function getCampo($sNome, $sTipo, $sId) {
        return "<input type='{$sTipo}' name='$sNome' id='{$sId}' />";
    }
    
}