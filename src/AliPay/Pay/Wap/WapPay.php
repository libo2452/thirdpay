<?php

namespace Hantanqing\AliPay\Pay\Wap;

use Hantanqing\AliPay\BasePay;
use Hantanqing\AliPay\Pay\Common\CommonPay;

/**
 * 对应新版支付宝wap支付接口
 */
class WapPay extends BasePay
{
    public function __construct(array $config=[], $sign=null)
    {
        parent::__construct($config, $sign);

        $this->commom = new CommonPay($config);
    }

    public function getRequestParam($requestParamName, $params, $config, $sign)
    {
        $className = '\Hantanqing\AliPay\Pay\Wap\RequestParams\\'.$requestParamName;

        return new $className($params, $config, $sign);
    }

    /**
     * 发起支付
     *
     * @param array $params 参数字段名与支付宝接口字段名一样，具体请查看支付宝接口参数文档以及对应的CreateOrderRequestParam类的init方法
     * @return mixed
     */
    public function createOrder(Array $params)
    {
        $createOrderRequest = $this->getRequestParam('CreateOrderRequestParam', $params, $this->config, $this->sign);

        $formContent = $this->executeFormRequest($createOrderRequest);

        echo $formContent;
    }
}