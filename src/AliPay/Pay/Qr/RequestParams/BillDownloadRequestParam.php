<?php
namespace Hantanqing\AliPay\Pay\Qr\RequestParams;

use Hantanqing\AliPay\BaseRequestParam;
use Hantanqing\AliPay\Helper;

class BillDownloadRequestParam extends BaseRequestParam
{
    public function __construct($params, $config, $sign)
    {
        parent::__construct($params, $config, $sign);
    }

    public function init(Array $params)
    {
        $params['seller_id'] = $this->config['partner'];
        $bizContent = Helper::convertToBizContentFormat($params);
        $businessParams['biz_content'] = $bizContent;

        $this->params = $businessParams;
    }

    public function params()
    {
        return $this->params;
    }

    public function getRequestUrl()
    {
        $urlParams = Helper::createLinkstringUrlencode($this->getAllCommonParams());

        return $this->config['alipay_gateway_new'].$urlParams;
    }

    public function getAllCommonParams()
    {
        $commonParams = $this->addNewCommonParams([]);
        $commonParams['timestamp'] = date("Y-m-d H:i:s", $this->now);
        $commonParams['method'] = 'alipay.data.dataservice.bill.downloadurl.query';
        $allParams = array_merge($commonParams, $this->params);
        $commonParams['sign'] = $this->sign->createSign(Helper::buildRequestPreStr($allParams, true), $this->config['private_key_path']);
        return $commonParams;
    }
}