<?php
require_once 'vendor/autoload.php';
$this->load->library('ZoomOAuth');

// require_once "../controllers/ZoomOAuth.php";
$config["ngrok"] = "https://0099-42-201-156-136.ap.ngrok.io";

define('CLIENT_ID', 'TXIdST2FSlaWmoCV3KPS5A');
define('CLIENT_SECRET', 're9M2Ju1kOGDHBAGx3889qbzkE2G7jmv');
define('REDIRECT_URI', $config["ngrok"].'/videmy/zoom/callback.php');