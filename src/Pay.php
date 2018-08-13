<?php

namespace Hantanqing;

class Pay
{
    private static $map = [
        'alipay' => [
            'direct' => 'Hantanqing\AliPay\Pay\Direct\DirectPay',
            'app' => 'Hantanqing\AliPay\Pay\App\AppPay',
            'qr' => 'Hantanqing\AliPay\Pay\Qr\QrPay',
            'wap' => 'Hantanqing\AliPay\Pay\Wap\WapPay',
        ],
        'weixinpay' => [
            'app'=> 'Hantanqing\WeixinPay\Pay\App\AppPay',
            'js'=> 'Hantanqing\WeixinPay\Pay\Js\JsPay',
            'qr'=> 'Hantanqing\WeixinPay\Pay\Qr\QrPay',
        ]
    ];

    private static $instance;       //支付对象

    /**
     * 使用单例模式实例化支付对象
     *
     * @param $name
     * @return mixed
     */
    public static function getInstance($name)
    {
        if (is_null(self::$instance)) {
            $arr = explode('.', $name);
            $company = $arr[0];
            $type = $arr[1];
            $className = self::$map[$company][$type];
            self::$instance = new $className;
        }

        return self::$instance;
    }
}