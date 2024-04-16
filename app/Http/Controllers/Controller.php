<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function query(string $url, string|array $params = null)
    {
        $token = $_COOKIE['access_token'];
        $response = Http::withToken($token)->post(env('APP_SERVER_V1') . $url, $params);

        if($response->successful()) {
            return $response->json()['data'];
        }
        return abort($response->status());
     
    }

    protected function post(string $url)
    {
        $token = $_COOKIE['access_token'];
        $response = Http::withToken($token)->post(env('APP_SERVER_V1') . $url);
        if($response->successful()) {
            return $response->json()['data'];
        }
        return abort($response->status());
    }

    protected function get(string $url)
    {
        $token = $_COOKIE['access_token'];
        $response = Http::withToken($token)->get(env('APP_SERVER_V1') . $url);
        if($response->successful()) {
            return $response->json()['data'];
        }
        saveLogs('Error pada ' . env('APP_SERVER_V1') . $url, 'Error', $response->status());
        return abort($response->status());
    }

    protected function error(string $message = 'Error!', int $code = Response::HTTP_INTERNAL_SERVER_ERROR)
    {
        return response()->json([
            'success'   => false,
            'message'   => $message
        ], $code);
    }

    protected function success(string|array $data = null, $message = 'Success!', int $code = Response::HTTP_OK)
    {
        $response = [
            'success'   => true,
            'message'   => $message
        ];

        if (!is_null($data)) {
            $response['metadata'] = $data;
        }

        return response()->json($response, $code);
    }
}
