<?php


namespace App\Api;


class Privat
{
    private static function getAllExchange()
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, false);

        $result = curl_exec($curl);

        curl_close($curl);

        return json_decode($result);
    }

    public static function getUsdExchange()
    {
        $exchange = self::getAllExchange();

        //var_dump($exchange); exit;

        foreach ($exchange as $currency) {
            if ($currency->ccy === 'USD') {
                return $currency;
            }
        }
    }

}
