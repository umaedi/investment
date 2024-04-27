<?php

use Illuminate\Support\Facades\Http;

if(!function_exists('formatRp')) {
function formatRp($number) {
    return 'Rp ' . number_format($number, 0, ',', '.');
    }
}

if(!function_exists('masking')) {
    function masking($name) {
        $firstPart = substr($name, 0, 2);
        $secondPart = substr($name, 2);
        $maskedPart = str_repeat('*', strlen($secondPart));
        return $firstPart . $maskedPart;
    }
}

if (!function_exists('saveLogs')) {
    function saveLogs($description, $logType, $status)
    {
        $endpoint = 'https://api.telegram.org/bot6398091267:AAE_IljrWh5_Ju0GBeFA5wKYyrUXEUs1kds/sendMessage';
        $chatId = '1480722754';
        $message = 
'
UPTIME MONITORING DULUIN

Description: '.$description.'

Logtype: '.$logType.'
Status: '.$status.'
';

        $response = Http::post($endpoint, [
            'chat_id'   => $chatId,
            'text'      => $message
        ]);
    }
}