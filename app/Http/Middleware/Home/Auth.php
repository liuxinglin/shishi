<?php

namespace App\Http\Middleware\Home;

use App\Services\MemberService;
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
                try {
                    $config = config('wechat.official_account.default');
                    $scopes = array_get($config, 'oauth.scopes', ['snsapi_base']);
                    $app = Factory::officialAccount($config);
                    $oauth = $app->oauth;

                    if ($request->has('code')) {
                        $user = $oauth->user()->toArray();
                        $memberService = app()->make(MemberService::class);
                        $snsUserInfo = [
                            'openid' => $user['id'],
                            'unionid' => $user['id'],
                            'nickname' => $user['nickname'],
                            'sex' => $user['original']['sex'],
                            'headimgurl' => $user['avatar'],
                            'platform' => 1
                        ];
                        $memberService->loginBySns($snsUserInfo);
                        return redirect()->to($this->getTargetUrl($request));
                    }

                    session()->forget($sessionKey);

                    return $oauth->scopes($scopes)->redirect($request->fullUrl());
                } catch (\Exception $e) {
                    var_dump($e);
                }
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
