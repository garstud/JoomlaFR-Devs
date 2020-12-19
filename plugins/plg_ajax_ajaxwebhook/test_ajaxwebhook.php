<?php
// saisir l'url de votre site contenta le plugin AjaxWebhook
$siteUrl = "http://joomla3919.test";


function postWebhook()
{
    //$url = "http://localhost/_dev/webhook/obsAjaxHook/srv_webhook.php";
//    $urlAjaxWebhook = "index.php?option=com_ajax&plugin=obsajaxhook&format=json";
    $urlAjaxWebhook = "index.php?option=com_ajax&plugin=ajaxwebhook&format=json";
    $url = $siteUrl . "/" . $urlAjaxWebhook;

    $data = array("key" => "GVTX534GRG87JHG698JHT4521RT30", 
                  "type" => "list", 
                  "content" => "Your Content", 
                  "username" => "Webhooks"
    );
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    return curl_exec($curl);
}

echo postWebhook();
?>