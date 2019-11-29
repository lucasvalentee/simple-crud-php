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
     * @return Campo
     */
    public function getCampoNome($sNome = 'nome', $sTipo = BaseCampos::CAMPO_TEXTO, $sId = 'nome', $sClasse = '') {
        return $this->getCampo($sNome, $sTipo, $sId, $sClasse);
    }
    
    
    /**
     * Retorna o campo senha
     * @param String $sNome
     * @param String $sTipo
     * @param String $sId
     * @return Campo
     */
    public function getCampoSenha($sNome = 'senha', $sTipo = BaseCampos::CAMPO_SENHA, $sId = 'senha', $sClasse = '') {
        return $this->getCampo($sNome, $sTipo, $sId, $sClasse);
    }
    
    /**
     * Retorna o campo numerico
     * @param String $sNome
     * @param String $sTipo
     * @param String $sId
     * @return Campo
     */
    public function getCampoNumerico($sNome = 'numero', $sTipo = BaseCampos::CAMPO_NUMERICO, $sId = 'numero', $sClasse = '') {
        return $this->getCampo($sNome, $sTipo, $sId, $sClasse);
    }
}