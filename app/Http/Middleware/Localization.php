<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;
use Illuminate\Foundation\Application;

class Localization
{
public function __construct(Application $app, Request $request) {
        $this->app = $app;
	$this->request = $request;
	if (session('my_locale'))
		$this->app->setLocale(session('my_locale'));
	else{
		$language = explode(",", $request->server('HTTP_ACCEPT_LANGUAGE') );
		if (preg_match("/zh-cn|zh/i", $language[0])) 
			$this->app->setLocale('zh_cn');
		else
			$this->app->setLocale('en');
	}
    }
	
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
