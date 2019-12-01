<?php
require_once 'autoload.php';
/**
 * Classe com os campos padrão do projeto
 * @package EST
 * @author Lucas Valente
 * @since 28/11/2019
 */
class Campos extends Base {
    
    /**
     * Retorna o título do campo
     * @param String $sTitulo
     * @param String $sNomeCampo
     * @return String
     */
    public function getLabelCampo($sTitulo, $sNomeCampo) {
        return $this->getLabel($sTitulo, $sNomeCampo);
    }
    
    /**
     * Retorna o campo nome
     * @param String $sNome
     * @param String $sTipo
     * @param String $sId
     * @param String $sClasse
     * @param Integer $iMaximoCaracteres
     * @param String $sValor
     * @return Campo
     */
    public function getCampoNome($sNome = 'nome', $sTipo = BaseCampos::CAMPO_TEXTO, $sId = 'nome', $sClasse = '', $iMaximoCaracteres = '', $sValor = '', $sDisabled = '') {
        return $this->getCampo($sNome, $sTipo, $sId, $sClasse, $iMaximoCaracteres, $sValor, $sDisabled);
    }
    
    
    /**
     * Retorna o campo senha
     * @param String $sNome
     * @param String $sTipo
     * @param String $sId
     * @param String $sClasse
     * @param Integer $iMaximoCaracteres
     * @param String $sValor
     * @return Campo
     */
    public function getCampoSenha($sNome = 'senha', $sTipo = BaseCampos::CAMPO_SENHA, $sId = 'senha', $sClasse = '', $iMaximoCaracteres = '', $sValor = '', $sDisabled = '') {
        return $this->getCampo($sNome, $sTipo, $sId, $sClasse, $iMaximoCaracteres, $sValor, $sDisabled);
    }
    
    /**
     * Retorna o campo numerico
     * @param String $sNome
     * @param String $sTipo
     * @param String $sId
     * @param String $sClasse
     * @param Integer $iMaximoCaracteres
     * @param Integer $iValor
     * @return Campo
     */
    public function getCampoNumerico($sNome = 'numero', $sTipo = BaseCampos::CAMPO_NUMERICO, $sId = 'numero', $sClasse = '', $iMaximoCaracteres = '', $iValor = '', $sDisabled = '') {
        return $this->getCampo($sNome, $sTipo, $sId, $sClasse, $iMaximoCaracteres, $iValor, $sDisabled);
    }
}