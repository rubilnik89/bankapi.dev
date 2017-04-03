<?php

namespace App\Http\Controllers;

use App\Models\PlaceType;
use Illuminate\Http\Request;

class BankController extends Controller
{

    public function main()
    {
        $types = PlaceType::all();
        return view('banks', compact('types'));
    }

    public function ceska()
    {
        return view('ceska');
    }

    public function ceskaExchange()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.csas.cz/sandbox/webapi/api/v1/exchangerates?sort=Amount&order=desc");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "WEB-API-key: ada7e421-dd83-44b1-b5ba-4222e48a2f74",
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        $data=json_decode($response);

        return view('exchange', compact('data'));
    }
}
