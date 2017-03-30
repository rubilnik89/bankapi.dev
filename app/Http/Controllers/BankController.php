<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BankController extends Controller
{
    public function ceska()
    {
        return view('ceska');
    }

    public function ceskaExchange()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.csas.cz/sandbox/webapi/api/v1/exchangerates");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "WEB-API-key: 35bd5a35-5909-460e-b3c2-20073d9c4c2e",
            "Client-Accept-Language: en-US"
        ));

        $response = curl_exec($ch);
        curl_close($ch);
        $data=json_decode($response);

        return view('exchange', compact('data'));
    }
}
