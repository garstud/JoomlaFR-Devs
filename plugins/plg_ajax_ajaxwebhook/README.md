# Plugin AjaxWebhook
pré-requis : Joomla3+

# Le besoin
Nous avions besoins de concevoir rapidement un premier service de type **Webhook** sur Joomla3.
C'est à dire :
- un service web accessible depuis l'exterieur de notre site Joomla
- permettant de recevoir dans un échange *unilateral* (de l'exterieur vers Joomla uniquement)
- des données au format *JSON* depuis un service compatible Webhook (Trello, Discord, Telegram, Stripe, Shopify, ...)

# La solution
La solution **com_ajax** de Joomla3 permet de proposer une url d'appel Joomla incluant un traitement par plugin.
De plus les urls Joomla proposent un paramétre "format" supportant nativement le JSON.

Plus d'info : https://docs.joomla.org/Using_Joomla_Ajax_Interface/fr

# Utilisation
Par simple **appel direct** (pour verifier le fonctionnement du plugin) :

https://MonSiteJoomla.tld/index.php?option=com_ajax&plugin=ajaxwebhook&format=json

Par utilisation d'un **script de cUrl** fourni à titre d'exmple pour simuler l'appel de type Webhook avec du contenu JSON :
- script de test : test_ajaxwebhook.php
- modifier son contenu : remplacer la 1ere variable "$siteUrl" en précisant l'url de la racine de votre site Web qui contient le plugin
- transferer ce script par FTP sur le serveur de votre choix (ou même en localhost)
- appeler ce script dans votre navigateur : 

https://MonSiteJoomla.tld/test_ajaxwebhook.php , 
ou en serveur web local : http://localhost/test_ajaxwebhook.php

Note : Il vous faut éditer ce script de test pour modifier notamment l'url "$siteUrl" d'appel de votre AjaxWebhook

# LImites & améliorations à envisager
Attention : Ce plugin, en l'état, n'est pas conseillé pour implémenter un Webhook. Il faudrait, à minima, ajouter un AuthKey afin de sécuriser un minimum vos transactions et éviter que n'importe qui accède à ce service externe.
