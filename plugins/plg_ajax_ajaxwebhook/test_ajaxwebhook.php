<?php
/**
 * script de test d'appel com_ajax en mode Webhook avec auth key dans le JSON
 */

// saisir l'url de votre site contenta le plugin AjaxWebhook
$siteUrl = "http://monsite.fr";


function postAjaxWebhookToJoomla($siteUrl)
{
    $urlAjaxWebhook = "index.php?option=com_ajax&plugin=ajaxwebhook&format=json";
    $url = $siteUrl . "/" . $urlAjaxWebhook;

    $data = array("authkey" => "0df133988b4a16709bff140715c7a9fa", 
                  "type" => "newSend", 
                  "content" => "Your Content", 
                  "username" => "dev1"
    );
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    return curl_exec($curl);
}

echo postAjaxWebhookToJoomla($siteUrl);
?>
