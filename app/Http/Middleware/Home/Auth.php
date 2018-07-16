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
        $member = session('member');

        //未登录则跳转到登录页面
        if(empty($member)) {
            if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {
                $config = config('wechat.official_account');

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

//                session()->forget($sessionKey);
//
//                return $officialAccount->oauth->scopes($scopes)->redirect($request->fullUrl())

            } else {
                return redirect(route('auth.index'));
            }
        }
        return $next($request);
    }
}
