<?php

namespace App\Http\Controllers;

use Log;

class WeChatController extends Controller
{

    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {
        Log::info('info request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志

        $app = app('wechat.official_account');
        $app->server->push(function($message){
            return "终于等到你，亲爱的，加入通信与信号处理科研小组，探索前沿科学问题，收获知识、成长、友情和欢乐!";
        });

        return $app->server->serve();
    }
}
?>
