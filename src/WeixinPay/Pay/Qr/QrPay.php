<?php

namespace Hantanqing\WeixinPay\Pay\Qr;

use Hantanqing\WeixinPay\BasePay;

class QrPay extends BasePay
{
    public function getRequestParam($requestParamName, $params, $config, $sign)
    {
        $className = '\Hantanqing\WeixinPay\Pay\Qr\RequestParams\\'.$requestParamName;

        return new $className($params, $config, $sign);
    }
}