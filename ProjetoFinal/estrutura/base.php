<?php
/**
 * Classe responsável por montar os campos
 * @package EST
 * @author Lucas Valente
 * @since 28/11/2019
 */
class Base {
    
    const CAMPO_NUMERICO = 'numeric',
          CAMPO_TEXTO    = 'text',
          CAMPO_SENHA    = 'password',
          CAMPO_DATA     = 'date';
    
    /**
     * Cria o html do campo
     * @param String $sNome
     * @param String $sTipo
     * @param String $sId
     * @return String
     */
    public function getCampo($sNome, $sTipo, $sId, $sClasse, $iMaximoCaracteres, $xValor, $sDisabled) {
        return "<input type='{$sTipo}' name='$sNome' id='{$sId}' class='{$sClasse}' maxlength='$iMaximoCaracteres' value='{$xValor}' $sDisabled/>";
    }
    
    /**
     * Cria o html do label
     * @param String $sTitulo
     * @param String $sNomeCampo
     * @return String
     */
    public function getLabel($sTitulo, $sNomeCampo) {
        return "<label for='{$sNomeCampo}'>{$sTitulo}:&nbsp</label>";
    }
    
}