<?php

namespace app\service;

use Yii;
use yii\base\Component;
use yii\httpclient\Client;
use yii\httpclient\XmlParser;

class CurrencyFetcher extends Component
{
    public function getCurrencyData(): ?array
    {
        $cbrUri = Yii::$app->params['cbrUri'];

        $httpClient = new Client();
        $response = $httpClient
            ->createRequest()
            ->setMethod('GET')
            ->setUrl($cbrUri)
            ->send();

        $result = null;
        if ($response->isOk) {
            $xmlParser = new XmlParser();
            $result = $xmlParser->parse($response)['Valute'];
        }

        return $result;
    }
}