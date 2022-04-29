<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
        if (! $request->expectsJson()) {
            $URI = explode("post/create", $request->getRequestUri());
            switch ($URI[1]){
                //管理画面が https/xxx.xxx/admin/xxxxxのケース
                case 'admin':
                return route('admin_login');

                //管理画面が https/xxx.xxx/shop_admin/xxxxxのケース
                case 'shop_admin':
                return route('shop_admin_login');

                //ユーザーマイページが https/xxx.xxx/mypage/xxxxxのケース
                case 'views/auth':
                return route('login');
            }
        }
    }
}
