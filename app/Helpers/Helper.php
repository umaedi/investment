<?php

use Illuminate\Support\Facades\Http;

if(!function_exists('formatRp')) {
function formatRp($number) {
    return 'Rp ' . number_format($number, 0, ',', '.');
    }
}

if(!function_exists('masking')) {
    function masking($name) {
        $words = explode(" ", $name);
        $firstWord = $words[0];
        $second = end($words);

        $tes = substr($firstWord, 0, 2) . str_repeat('*', strlen($name) - 2);
        $testt = substr($second, 0, 2) . str_repeat('*', strlen($name) - 2);
        return $tes . $testt;
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