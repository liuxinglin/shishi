<?php

namespace App\Http\Middleware\Home;

use Closure;
use EasyWeChat\Factory;
use URL, Route;

class Auth
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
        $sessionKey = 'member';
        $member = session($sessionKey);

        //未登录则跳转到登录页面
        if(empty($member)) {
            if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {
                $config = config('wechat.official_account.default');
                $scopes = array_get($config, 'oauth.scopes', ['snsapi_base']);
                $app = Factory::officialAccount($config);
                $oauth = $app->oauth;

                if ($request->has('code')) {
                    $user = $oauth->user();
//                    session([$sessionKey => $officialAccount->oauth->user() ?? []]);
//                    $isNewSession = true;
//
//                    Event::fire(new WeChatUserAuthorized(session($sessionKey), $isNewSession, $account));
//
//                    return redirect()->to($this->getTargetUrl($request));
                    var_dump($user);
                }

                session()->forget($sessionKey);

                return $oauth->scopes($scopes)->redirect($request->fullUrl());

            } else {
                return redirect(route('auth.index'));
            }
        }
        return $next($request);
    }

    /**
     * Build the target business url.
     *
     * @param Request $request
     *
     * @return string
     */
    protected function getTargetUrl($request)
    {
        $queries = array_except($request->query(), ['code', 'state']);

        return $request->url().(empty($queries) ? '' : '?'.http_build_query($queries));
    }
}
