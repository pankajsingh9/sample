<?php
/**
 * CedCommerce
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the End User License Agreement (EULA)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://cedcommerce.com/license-agreement.txt
 *
 * @category    Ced
 * @package     Ced_Shopifynxtgen
 * @author      CedCommerce Core Team <connect@cedcommerce.com>
 * @copyright   Copyright CEDCOMMERCE (http://cedcommerce.com/)
 * @license     http://cedcommerce.com/license-agreement.txt
 */

namespace App\Amazonwebapi\Components\Authenticate;

//use App\Amazonwebapi\Components\Core\Common;
use Exception;

class Sign extends \App\Apiconnect\Api\Base
{
    protected $options;

    protected $endpoint;

    public function init($data){
        foreach ($data['sign_params'] as $k => $value){
            if($k == 'SignatureVersion') $this->options[$k] = (int)$value;
            else $this->options[$k] = $value;
        }
        $this->endpoint = $data['endpoint'];
    }

    public function getSignature($data)
    {
        if($validate = $this->paramsMissing($data)) return $validate;
        $this->init($data);
        unset($this->options['Signature']);
        $appConfig = $this->di->getRegistry()->getAppConfig();
        $secretKey = $appConfig[$data['region']]['secret_key'];
        $this->options['AWSAccessKeyId'] = $appConfig[$data['region']]['access_key'];



        $this->options['Signature'] = $this->_signParameters($this->options, $secretKey);

        echo "sign";
        var_dump($this->options);
        echo 'secret key = ';var_dump($secretKey);
        echo 'signature = ';var_dump($this->options['Signature']);
        die('test 000');

        echo "after sign";
        //print_r($this->options);die;

        return [
            'success' => true,
            'signed_params' => $this->_getParametersAsString($this->options)
        ];
    }

    protected function paramsMissing($amazon_param){
        if(!isset($amazon_param['region']) || empty($amazon_param['region']) || !in_array($amazon_param['region'], ['EU', 'NA', 'FE', 'IN'])) {
            return ['success' => false, 'msg' => 'region missing or invalid region provided.'];
        } elseif (!isset($amazon_param['sign_params']) || empty($amazon_param['sign_params'])){
            return ['success' => false, 'msg' => 'sign param missing'];
        } elseif (!isset($amazon_param['endpoint']) || empty($amazon_param['endpoint'])){
            return ['success' => false, 'msg' => 'endpoint missing'];
        } else {
            return false;
        }
    }

    /**
     * validates signature and sets up signing of them, copied from Amazon
     * @param array $parameters
     * @param string $key
     * @return string signed string
     * @throws \Exception
     */
    protected function _signParameters(array $parameters, $key)
    {
        $algorithm = $this->options['SignatureMethod'];
        $stringToSign = null;
        if (2 === $this->options['SignatureVersion']) {
            $stringToSign = $this->_calculateStringToSignV2($parameters);
        } else {
            throw new \Exception("Invalid Signature Version specified");
        }
        return $this->_sign($stringToSign, $key, $algorithm);
    }

    /**
     * generates the string to sign, copied from Amazon
     * @param array $parameters
     * @return string
     */
    protected function _calculateStringToSignV2(array $parameters)
    {
        $data = 'POST';
        $data .= "\n";
        //$endpoint = parse_url($this->urlbase . $this->urlbranch);
        $endpoint = parse_url($this->endpoint);
        $data .= $endpoint['host'];
        $data .= "\n";
        $uri = array_key_exists('path', $endpoint) ? $endpoint['path'] : null;
        if (!isset($uri)) {
            $uri = "/";
        }
        $uriencoded = implode("/", array_map([$this, "_urlencode"], explode("/", $uri)));
        $data .= $uriencoded;
        $data .= "\n";
        uksort($parameters, 'strcmp');
        $data .= $this->_getParametersAsString($parameters);
        return $data;
    }

    /**
     * Reformats the provided string using rawurlencode while also replacing ~, copied from Amazon
     *
     * Almost the same as using rawurlencode
     * @param string $value
     * @return string
     */
    protected function _urlencode($value)
    {
        return rawurlencode($value);
        //return str_replace('%7E', '~', rawurlencode($value));
    }

    /**
     * Fuses all of the parameters together into a string, copied from Amazon
     * @param array $parameters
     * @return string
     */
    protected function _getParametersAsString(array $parameters)
    {
        $queryParameters = [];
        foreach ($parameters as $key => $value) {
            $queryParameters[] = $key . '=' . $this->_urlencode($value);
        }
        return implode('&', $queryParameters);
    }

    /**
     * Runs the hash, copied from Amazon
     * @param string $data
     * @param string $key
     * @param string $algorithm 'HmacSHA1' or 'HmacSHA256'
     * @return string
     * @throws \Exception
     */
    protected function _sign($data, $key, $algorithm)
    {
        if ($algorithm === 'HmacSHA1') {
            $hash = 'sha1';
        } elseif ($algorithm === 'HmacSHA256') {
            $hash = 'sha256';
        } else {
            throw new \Exception("Non-supported signing method specified");
        }

        return base64_encode(
            hash_hmac($hash, $data, $key, true)
        );
    }

}