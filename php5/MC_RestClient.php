<?php
class MC_RestClient {

    private $cn = null;
    private $session = null;

    public function __construct($session=null) {

        $this->cn = new MC_OAuth2Client();
        $this->cn->setSession($session,false);
    }
    
    private function baseUri($url=null){
        return 'https://login.mailchimp.com/';
    }
    
    public function getMetadata(){
        return $this->cn->api('metadata', 'GET');
    }    


}
