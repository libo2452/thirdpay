<?php

namespace Hantanqing\WeixinPay\Pay\App;


use Hantanqing\WeixinPay\BasePay;

class AppPay extends BasePay
{
    public function getRequestParam($requestParamName, $params, $config, $sign)
    {
        $className = '\Hantanqing\WeixinPay\Pay\App\RequestParams\\'.$requestParamName;

        return new $className($params, $config, $sign);
    }
}