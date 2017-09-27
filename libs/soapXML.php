<?php
class SoapXML{
public $data = '2017-09-27';
public $client;
    public function __construct(){
        $this->client = new SoapClient("http://www.cbr.ru/DailyInfoWebServ/DailyInfo.asmx?WSDL");
    }

    public function getCurs(){
        $currencies = $this->client->GetCursOnDate(['On_date' => $this->data]);

        $currencies1 = new SimpleXMLElement($currencies->GetCursOnDateResult->any);

        $obj = $currencies1->ValuteData->ValuteCursOnDate;

        foreach ($obj as $currency) {
            $currencyArr['name'] = trim($currency->Vname);
            $currencyArr['nom'] = trim($currency->Vnom);
            $currencyArr['curs'] = trim($currency->Vcurs);
            $currencyArr['code'] = trim($currency->Vcode);
            $currencyArr['chCode'] = trim($currency->VchCode);
            $result[] = $currencyArr;
        }
        return $result;
    }
}
//print_r($result);