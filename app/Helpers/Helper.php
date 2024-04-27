<?php

use Illuminate\Support\Facades\Http;

if(!function_exists('formatRp')) {
function formatRp($number) {
    return 'Rp ' . number_format($number, 0, ',', '.');
    }
}

if(!function_exists('masking')) {
    function masking($name) {
        $words = explode(" ", $name); // Memecah string berdasarkan spasi
        $maskedName = '';

        foreach ($words as $word) {
            $maskedPart = strlen($word) > 2 ? substr($word, 2) : ''; // Mengambil sisanya jika panjang kata lebih dari 2 karakter
            $maskedName .= substr($word, 0, 2) . str_repeat('*', strlen($maskedPart)) . ' '; // Menggabungkan hasil dengan spasi
        }

        return $maskedName;

        // $words = explode(" ", $name);
        // $firstWord = $words[0];
        // $second = end($words);

        // $tes = substr($firstWord, 0, 2) . str_repeat('*', strlen($name) - 2);
        // $testt = substr($second, 0, 2) . str_repeat('*', strlen($name) - 2);
        // return $tes . $testt;
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