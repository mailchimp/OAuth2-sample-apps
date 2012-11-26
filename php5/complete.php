<?php
require_once('MC_OAuth2Client.php');
require_once('MC_RestClient.php');
require_once('miniMCAPI.class.php');
$client = new MC_OAuth2Client();
if (isset($_GET['error']) ){
?>

<html>
  <head>
    <title>Oauth2 Tester</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  </head>
  <body>
        <h2>Complete Failure!: <?=$_GET['error']?></h2>
        <br/><br/><br/>
        This likely means that you have entered a bad client_id or client_secret
        <em>or</em> you are being awesome and checking to see this failure occur.
        <br/><br/><br/>
        <a href="<?=$client->getLoginUri()?>">Try Again?</a>
  </body>
</html>
<?php
} else {
    $session = $client->getSession();
    if (!$session){
?>
    <html>
      <head>
        <title>Oauth2 Tester</title>
      </head>
      <body>
            <h2>Hrm, we received an auth code: <?=$_GET['code']?>, but were unable to retrieve the access_token</h2>
            This likely means that you waited too long to exchange your <strong>code</strong> for an access token 
            <em>or</em> you are being awesome and checking to see this failure occur.
            <br/><br/><br/>
            <a href="<?=$client->getLoginUri()?>">Try Again?</a>
      </body>
    </html>
    <?php
    } else {
    ?>
    <html>
      <head>
        <title>Oauth2 Tester</title>
      </head>
      <body>
            <h2>Yay, it worked! oauth token details:</h2>
<pre>
<?=print_r($session,true)?>
</pre>
    <?php
        $rest = new MC_RestClient($session);
        $data = $rest->getMetadata();
    ?>
And here are the results of the follow-up metadata call:
<pre>
<?=print_r($data,true)?>
</pre>           
            Putting all of that data together, you can now use that to either:
            <ol>
            <li>Configure the endpoint in your application to <strong><?=$data['api_endpoint']?></strong></li>
            <li>Create a standard formatted API Key using the OAuth2 access token (<?=$session['access_token']?>) and the data center (<?=$data['dc']?>) :
            <strong><?=$session['access_token']?>-<?=$data['dc']?></strong> which can be passed into most API wrappers.
            </li>
            </ol>
            <h2>Want to see an authorization fail?</h2>
            The <strong>code</strong> being exchange for an OAuth Access Token expires within 30 seconds - simply refresh this page in a minute.

           <h3>Want proof? Here are 5 of your lists:</h3>
<ol>
<?
$apikey = $session['access_token'].'-'.$data['dc'];
$api = new MCAPI($apikey);
$api->useSecure(true);
$lists = $api->lists('', 0, 5);
foreach($lists['data'] as $list){
?>
<li><?=$list['name']?> with <?=$list['stats']['member_count']?> subscribers</li>
<?
}
?>
</ul>
           <br/><br/><br/>
            <a href="<?=$client->getLoginUri()?>">Try Again?</a>
      </body>
    </html>
    <?php
    }
}
