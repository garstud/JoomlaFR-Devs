<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

use Joomla\CMS\Plugin\CMSPlugin;

class PlgAjaxAjaxWebhook extends CMSPlugin
{
    protected $app;
    
	public static function onAjaxAjaxWebhook()
	{
		$jsonData = file_get_contents("php://input");
		$datas = array();
		$tResponse = array();
		$data = json_decode($jsonData);
        // l'accès est bloqué par défaut
        $accessGranted = false;
        $providedKey = "";
        
        $authkeyMode = $this->params->get('authkey_mode', "0");
        $authkeyName = $this->params->get('authkey_name', "");
        $currAuthkey = $this->params->get('authkey', "");
        // si une AuthKey est paramétrée alors on effectue le controle de sécurité
        if($authkeyMode!="0") {
            if(!empty($authkeyName)) {
                switch($authkeyMode) {
                    case "url" : $providedKey = $this->app->input->get($authkeyName, ""); break;
                    case "json" : if(isset($data->$authkeyName)) $providedKey = $data->$authkeyName; break;
                }
                if($providedKey && $providedKey==$currAuthkey) {

                    // ok clé auth correct
                    $accessGranted = true;
                    

                } else {

                    // clé auth incorrecte, on retourne un http code 403 acces interdit
                    throw new Exception("Wrong Auth key provided", "403");

                }

            } else {

                // data incorrectes, les paramètres du plugin sont incomplets
                throw new Exception("Wrong service params, must be corrected", "403");
            
            }
            
        }

        // on continue si l'accès est autorisé
        if($accessGranted) {
            
            // traitement des données recues ...
            
        }
        
        
        // data et acces ok, on retourne un http code 200
		return true;
	}
}
