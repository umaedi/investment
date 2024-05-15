<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ReqwdController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $instanceID = '66069f95c302c5956ac9ca24';
        $phoneNumbers = '62811163319';

        $token = Cache::get('token');

        // $nomorWhatsAppBaru = "62" . substr($request->phone, 1);
        $messagePersonal = '
*Request Withdraw*

Seseorang baru saja melakukan Request Withdraw dengan data sebagai berikut:

------------------------------------
*Nama :* '. $request->name .',
*Jumlah Penarikan:* '. $request->wd .',
*Tanggal Request:* '. date('Y-m-d H:i:s') .',
*Nomor WhtasApp:* '. $request->no_hp .'
------------------------------------

Mohon untuk segera di konfirmasi
';

$response = Http::withToken($token)
            ->post('https://apiks.ristekmuslim.com/client/v1/message/send-text', [
                'instanceID'    => $instanceID,
                'phone'         => $phoneNumbers,
                'message'       => $messagePersonal,
                'serverSend'    => 'false'
            ]);

            $responseData = $response->json();
            if($response->successful()) {
                if($responseData['status'] === 'error') {
                    $response = Http::post('https://apiks.ristekmuslim.com/public/v1/client/login', [
                        "uid" => "628170031000",
                        "pass" => "JiNgvO"
                    ]);

                    $token = $responseData['data']['token'];
                    Cache::put('token', $token, 172800);

                    Http::withToken($token)->post('https://apiks.ristekmuslim.com/client/v1/message/send-text', [
                        'instanceID'    => $instanceID,
                        'phone'         => $phoneNumbers,
                        'message'       => $messagePersonal,
                        'serverSend'    => 'false'
                    ]);
                    dd('ok1');
                    return $this->success('OK', "Request Withdraw Berhasil Terikirim, PIC funding kami segera menghubungi bapak / ibu");
                }
            }else {
                $response = Http::post('https://apiks.ristekmuslim.com/public/v1/client/login', [
                    "uid" => "628170031000",
                    "pass" => "JiNgvO"
                ]);

                $responseData = $response->json();

                if($response->successful()) {
                    $token = $responseData['data']['token'];
                    Cache::put('token', $token, 172800);
                }

                Http::withToken($token)->post('https://apiks.ristekmuslim.com/client/v1/message/send-text', [
                    'instanceID'    => $instanceID,
                    'phone'         => $phoneNumbers,
                    'message'       => $messagePersonal,
                    'serverSend'    => 'false'
                ]);
                dd('ok2');
                return $this->success('OK', "Request Withdraw Berhasil Terikirim, PIC funding kami segera menghubungi bapak / ibu");
            }
            return $this->success('OK', "Request Withdraw Berhasil Terikirim, PIC funding kami segera menghubungi bapak / ibu");
    }
}
