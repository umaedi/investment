<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        {
            $token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1aWQiOiI2NjA2OWY5NWJhNTFkMDJkNTgwYjY0MGEiLCJmdWxsTmFtZSI6IkR1bHVpbiIsImZpcnN0TmFtZSI6IkR1bHVpbiIsIm1pZGRsZU5hbWUiOiIiLCJsYXN0TmFtZSI6IkR1bHVpbiIsIm1vYmlsZXBob25lIjoiNjI4MTcwMDMxMDAwIiwiY291bnRyeUNvZGUiOiIiLCJyb2xlIjoiY2xpZW50IiwiZXhwIjoxNzE0NTIxNTk5MDAwLCJpYXQiOjE3MTQyNDA2NTksImlzcyI6ImtpcmltcGVzYW4ucmlzdGVrbXVzbGltLmNvbSJ9.9DyZYZ-pXSn4rOUBTINWiwHd75wOpSpc0O4F-JV_4oE';
            $instanceID = '66069f95c302c5956ac9ca24';
            $phone_number = '628970844853';
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
    
            $response = Http::withToken($token)
                ->post('https://apiks.ristekmuslim.com/client/v1/message/send-text', [
                    'instanceID'    => $instanceID,
                    'phone'         => $phone_number,
                    'message'       => $message,
                    'serverSend'    => 'false'
                ]);
    
            if ($response->successful()) {
                $responseData = $response->json();
            } else {
                $errorMessage = $response->body();
            }
        }
    }
}
