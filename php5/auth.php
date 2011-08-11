<?php
require_once('MC_OAuth2Client.php');
$client = new MC_OAuth2Client();

?>
<html>
  <head>
    <title>Oauth2 Tester</title>
  </head>
  <body>
    
        <a href="<?=$client->getLoginUri()?>">AUTHORIZE</a>
        
  </body>
</html>
