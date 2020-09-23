<?php

namespace Sample;

date_default_timezone_set('UTC');

use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\api\DefaultApi;
use Amazon\ProductAdvertisingAPI\v1\ApiException;
use Amazon\ProductAdvertisingAPI\v1\Configuration;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\GetItemsRequest;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\GetItemsResource;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\PartnerType;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\ProductAdvertisingAPIClientException;
use GuzzleHttp;

use Aws\DynamoDb\Exception\DynamoDbException;
use Aws\DynamoDb\Marshaler;

use Aws\DynamoDb\DynamoDbClient;

use Aws\S3\S3Client;

class Greetings {

    /**
     * Returns the array of items mapped to ASIN
     *
     * @param array $items Items value.
     *
     * @return array of \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\Item mapped to ASIN.
     */
    public function parseResponse($items)
    {
        $mappedResponse = array();
        foreach ($items as $item) {
            $mappedResponse[$item->getASIN()] = $item;
        }
        return $mappedResponse;
    }

    public static function sayHelloWorld()
    {
        echo "local";
    }


}
