<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CallServiceController extends Controller
{
    public function call($conf)
    {
        $conf = (object) $conf;
        $client = new Client;
        $response = null;
        $url = $this->getUrl();
        $url .= $conf->name;
        try {
            if ($conf->method ==  'GET' || $conf->method ==  'DELETE') {
                $response = $client->request($conf->method, $url);
            }else{
                $response = $client->request($conf->method, $url, [
                    'json' => $conf->params
                ]);
            }
            return json_decode((string)$response->getBody());
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage());
        }

        

    }

    private function getUrl()
    {
         return "http://localhost/api-examen/public";
         
       
    }
}
