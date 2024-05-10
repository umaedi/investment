<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class SendwaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $token = Cache::get('token');
        if(!$token) {
            $response = Http::post('https://apiks.ristekmuslim.com/public/v1/client/login', [
                "uid" => "628170031000",
                "pass" => "JiNgvO"
            ]);
            $responseData = $response->json();

            if($response->successful()) {
                $token = $responseData['data']['token'];
                Cache::put('token', $token, 172800);
                return $this->success('OK', 'Add Fund Investment Succes!');
            }else {
                return $this->error('Internal Server Error!');
            }
        }

        {
            // '6282128600231', 'bang Mahen 6282128600231', 'pak Figra 628970844853, bang Radius 62811222692'
            $token = $token;
            $instanceID = '66069f95c302c5956ac9ca24';
            $phoneNumbers = ['6285741492045', '6282128600231','628970844853', '62811222692'];
            $message = '
*Halo Bapak/Ibu '. $request->NAME .'*

Terima kasih telah melakukan permintaan penambahan dana investasi kepada PT Rasa Aksata Nusantara dengan rincian sebagai berikut:

------------------------------------
*Nama :* '. $request->NAME .'
*Nominal :* '. $request->nominal .'
*Tanggal :* '. $request->tanggal_investment .'
*Periode :* '. $request->period .'

Realisasi penempatan melalui rekening :
*PT Rasa Aksata Nusantara*
*Bank :* Bank Mandiri
*Rekening :* 1300003366880
------------------------------------
            
Jika ada pertanyaan lebih lanjut, silakan menghubungi di:
            
*Email:* hello@duluin.com
*No. Telp:* 08170031000
            
Terima kasih.
            ';
            foreach ($phoneNumbers as $phoneNumber) {
                $response = Http::withToken($token)
                ->post('https://apiks.ristekmuslim.com/client/v1/message/send-text', [
                    'instanceID'    => $instanceID,
                    'phone'         => $phoneNumber,
                    'message'       => $message,
                    'serverSend'    => 'false'
                ]);
    
            if ($response->successful()) {
                $responseData = $response->json();
            } else {
                $errorMessage = $response->body();
            }
            }

            $nomorWhatsAppBaru = "62" . substr($request->phone, 1);
            $messagePersonal = '
*Hi '. $request->NAME .'*
            
Permintanaan penambahan dana sudah kami terima, PIC funding kami segera menghubungi bapak / ibu';
            $response = Http::withToken($token)
                        ->post('https://apiks.ristekmuslim.com/client/v1/message/send-text', [
                            'instanceID'    => $instanceID,
                            'phone'         => $nomorWhatsAppBaru,
                            'message'       => $messagePersonal,
                            'serverSend'    => 'false'
                        ]);
            
                    if ($response->successful()) {
                        return $this->success('ok', $response->body());
                    } else {
                        $errorMessage = $response->body();
                        return $this->error($errorMessage);
                    }
        }
    }
}
