<?php

namespace App\Http\Middleware;

use App;
use Closure;
use GuzzleHttp\Client;

class ValidateRecaptcha
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (App::environment('local')) return $next($request);

        if (! $request->has('g-recaptcha-response'))
            abort(403, 'Google Recaptcha Validation Failed - Access denied');

        $ip = $request->getClientIp();
        $response = $request->get('g-recaptcha-response');
        $response = (new Client)->post('https://www.google.com/recaptcha/api/siteverify', [
            'verify' => false,
            'form_params' => [
                'secret'   => config('services.recaptcha.secret'),
                'response' => $response,
                'remoteip' => $ip,
            ],
        ]);

        $response = json_decode((string) $response->getBody(), true);
        if (!$response['success'])
            abort(403, "Google Recaptcha Validation Failed ({$response['error-codes'][0]})");

        return $next($request);
    }
}
