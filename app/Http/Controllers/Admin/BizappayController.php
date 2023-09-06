<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Exception\RequestException;

class BizappayController extends Controller
{

    public function generateToken()
    {
        $client = new Client();

        try {
            $response = $client->post('https://bizappay.my/api/v3/token', [
                'form_params' => [
                    'apiKey' => config('bizappay.key'),
                ],
            ]);

            if ($response->getStatusCode() == 200) {
                echo $response->getBody();
            } else {
                echo 'Unexpected HTTP status: ' . $response->getStatusCode() . ' ' . $response->getReasonPhrase();
            }
        } catch (RequestException $e) {
            echo 'Error: ' . $e->getMessage();
            if ($e->hasResponse()) {
                echo $e->getResponse();
            }
        }
    }


    
    public function create(){

        $client = new Client();

    try {
        $response = $client->post('https://bizappay.my/api/v3/bill/create', [
           // 'headers' => [
             //   'Authentication' =>  route('admin.bizappay-generate-token'),
            //],
            'form_params' => [
                'apiKey' => config('bizappay.key'),
                'category' => config('bizappay.category'),
                'name' => 'Create bill from APIV3',
                'amount' => '35.00',
                'payer_name' => 'ijaz Hazly',
                'payer_email' => 'contact@bizappay.my',
                'payer_phone' => '01234567898',
                'webreturn_url' => route('admin.bizappay.status'),
                'callback_url' => route('admin.bizappay-callback'),
                'ext_reference' => '',
                'bank_code' => 'BCBB0235',
            ],
        ]);

        if ($response->getStatusCode() == 200) {
            echo $response->getBody();
        } else {
            echo 'Unexpected HTTP status: ' . $response->getStatusCode() . ' ' . $response->getReasonPhrase();
        }
    } catch (\Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
       
     /*  $data=[ 'apiKey' => config('bizappay.key'),
        'category' => config('bizappay.category'),
        'name' => 'Create bill from APIV3',
        'amount' => '35.00',
        'payer_name' => 'ijaz Hazly',
        'payer_email' => 'contact@bizappay.my',
        'payer_phone' => '01234567898',
        'webreturn_url' => route('admin.bizappay.status'),
        'callback_url' => route('admin.bizappay-callback'),
        'ext_reference' => '',
        'bank_code' => 'BCBB0235'
    ];

     $url="https://bizappay.my/api/v3/bill/create";
     $response= Http::asForm()->post($url,$data);

     return redirect($response['paymentUrl']);
     

  /*   $client = new Client();
$headers = [
  'Authentication' => 'YjdhMjhlZDgyMGI5YTcxNmY2ZGRlNTRlMGIxMjNiM2QzZDg1N2FiM2YyMzcyZjdjYzI0NTM4OGViZjIxZGFlNg=='
];
$options = [
  'multipart' => [
    [
      'name' => 'apiKey',
      'contents' => config('bizappay.key')
    ],
    [
      'name' => 'category',
      'contents' =>config('bizappay.category')
    ],
    [
      'name' => 'name',
      'contents' => 'Create bill from APIV3'
    ],
    [
      'name' => 'amount',
      'contents' => '35.00'
    ],
    [
      'name' => 'payer_name',
      'contents' => 'ijaz Hazly'
    ],
    [
      'name' => 'payer_email',
      'contents' => 'contact@bizappay.my'
    ],
    [
      'name' => 'payer_phone',
      'contents' => '01234567898'
    ],
    [
      'name' => 'webreturn_url',
      'contents' => route('admin.bizappay.status')
    ],
    [
      'name' => 'callback_url',
      'contents' => route('admin.bizappay-callback')
    ],
    [
      'name' => 'ext_reference',
      'contents' => ''
    ],
    [
      'name' => 'bank_code',
      'contents' => 'BCBB0235'
    ]
]];
$request = new Request('POST', 'https://bizappay.my/api/v3/bill/create', $headers);
$res = $client->sendAsync($request, $options)->wait();
echo $res->getBody();*/

    }

    public function status(){

        $response = request()->all();
        return $response;

    }

    public function callback(){

        $response = request()->all(['billcode','status']);
        Log::info($response);

    }
}
