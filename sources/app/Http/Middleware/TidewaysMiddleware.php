<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TidewaysMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (extension_loaded('tideways_xhprof')) {
            tideways_xhprof_enable(TIDEWAYS_XHPROF_FLAGS_CPU + TIDEWAYS_XHPROF_FLAGS_MEMORY);
        }

        $response = $next($request);

        if (extension_loaded('tideways_xhprof')) {
            $xhprofData = tideways_xhprof_disable();
            if (empty($xhprofData)) {
                error_log("XHProf data is empty!");
            } else {
                $data = [
                    'meta' => [
                        'url' => $_SERVER['REQUEST_URI'] ?? '/',
                        'get' => $_GET,
                        'env' => $_ENV,
                        'SERVER' => $_SERVER,
                        'simple_url' => parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/',
                        'request_ts' => microtime(true),
                        'request_ts_micro' => microtime(true),
                        'request_date' => date('Y-m-d'),
                    ],
                    'profile' => $xhprofData,
                ];
                error_log("XHProf data: " . print_r($data, true));
                $this->saveXhprofData($data);
            }
        }

        return $response;
    }

    protected function saveXhprofData($data)
    {
        $url = 'http://xhprof-ui:8082/run/import';
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Убираем ключ 'profile'
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $errorMessage = curl_error($ch);
            $errorCode = curl_errno($ch);
            error_log("cURL error (code $errorCode): $errorMessage");
        } else {
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            error_log("HTTP response code: $httpCode");
            error_log("Response body: " . $response);
        }

        curl_close($ch);

        return $response;
    }
}
