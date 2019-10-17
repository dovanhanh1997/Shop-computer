<?php

namespace App\Http\Middleware;

use App\Services\impl\LangService;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Lang
{
    /**
     * @var LangService
     */
    private $langService;

    public function __construct(LangService $langService)
    {
        $this->langService = $langService;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Session::has('lang')) return $next($request);

        App::setLocale(Session::get('lang'));

        return $next($request);
    }
}
