<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use NumberFormatter;

class CurrencyController extends Controller
{
    public function index()
    {
        $data['all_currency_code'] = config('constants.currency_codes');
        return view('currency_converter',$data);
    }
    public function conversion(Request $request)
    {
        // Get the source currency, target currency, and monetary value from the request
        $source_currency = $request->input('to_currency');
        $target_currency = $request->input('from_currency');
        $monetary_value = $request->input('convert_amount');

        // To calculate api response time
        $startTime = microtime(true);

        // Make a request to the exchange rate API to get the latest exchange rates open source API
        $client = new Client([
            'base_uri' => 'https://api.apilayer.com/exchangerates_data/',
            'headers' => [
                'Content-Type' => 'application/json',
                'apikey' => 'rymi6G09Gpvf9ARuaaI9OHUFutKqyKfv',
            ],
        ]);
        $response = $client->request('GET', 'convert', [
            'query' => [
                'to' => $source_currency,
                'from' => $target_currency,
                'amount' => $monetary_value,
            ],
        ]);
        $api_response = json_decode($response->getBody()->getContents());
        $endTime = microtime(true);

        $data['serve_timing'] = $endTime - $startTime;
        $data['exchange_rate'] = $api_response->info->rate;
        $data['date'] = $api_response->date;
        $data['converted_amount'] = $api_response->result;

        return $data;
    }

}
