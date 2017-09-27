<?php
class Soap{
    public $client;

    function __construct()
    {
        $this->client = new SoapClient('http://footballpool.dataaccess.eu/data/info.wso?WSDL');
    }

    public function players(){

    $cards = $this->client->AllCards();
    $res = [];
    foreach($cards->AllCardsResult->tCardInfo as $team){
        if($team->sGameTeam1 == 'France')
            $res[] = $team->sPlayerName;
    }

    echo "<pre><h2>Players Franse</h2>";
    return $res;
    }

    public function stadium()
    {
        $res_name = [];
        $stadium = $this->client->StadiumNames();

        foreach ($stadium->StadiumNamesResult->string as $forward) {
            $res_name[] = $forward;
        }
        echo '<h2>Stadium name</h2>';
       return $res_name;
    }
}