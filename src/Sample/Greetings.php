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


        $amazon = [
            'EU' => [
                'dev_id' => 233623308975,
                'access_key' => 'AKIAJPQEXA5OEL5OK5QQ',
                'secret_key' => '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'
            ],
            'NA' => [
                'dev_id' => 337320726556,
                'access_key' => 'AKIAJREM35VIGP7YALWA',
                'secret_key' => '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'
            ],
            'FE' => [
                'dev_id' => 716069427621,
                'access_key' => 'AKIAI5IWWEKODV46Z4GA',
                'secret_key' => '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'
            ]
        ];

        echo base64_encode(json_encode($amazon));die('test');

        $sdk = new \Aws\Sdk([
            'region'   => 'us-east-2',
            'version'  => 'latest',
            'credentials' => [
                'key' => 'AKIAU3EY6KRD7D37Q6OV',
                'secret' => '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',
            ]
        ]);

        $dynamodb = $sdk->createDynamoDb();
        $marshaler = new Marshaler();

        $tableName = 'queue_config';

        $year = 1;

        $eav = $marshaler->marshalJson('
            {
                ":app_key": "AKIAU3EY6KRDQPFUVDWA"
            }
        ');

        /*$params = [
            'TableName' => $tableName,
            'Key' => $key
        ];*/

        /*$params = [
            'TableName' => $tableName,
            'KeyConditionExpression' => '#yr = :app_id',
            'ExpressionAttributeNames'=> [ '#yr' => 'appId' ],
            'ExpressionAttributeValues'=> $eav
        ];*/

        $params = [
            'TableName' => $tableName,
            /*'ProjectionExpression' => '#yr, title, info.rating',*/
            'FilterExpression' => 'app_key = :app_key',
            /*'ExpressionAttributeNames'=> [ '#yr' => 'year' ],*/
            'ExpressionAttributeValues'=> $eav
        ];

        echo "Scanning for app_id : 1.<br />";

        $arr = [];
        try {
            while (true) {
                $result = $dynamodb->scan($params);

                foreach ($result['Items'] as $i) {
                    $movie = $marshaler->unmarshalItem($i);
                    $arr[] = $movie['id'];
                    /*echo $movie['id'].'<br />';*/
                    /*echo ' ... ' . $movie['info']['rating']
                        . "\n";*/
                }

                if (isset($result['LastEvaluatedKey'])) {
                    $params['ExclusiveStartKey'] = $result['LastEvaluatedKey'];
                } else {
                    break;
                }
            }

        } catch (DynamoDbException $e) {
            echo "Unable to scan:\n";
            echo $e->getMessage() . "\n";
        }

        print_r($arr);
        die('test 000');









        $client = new DynamoDbClient([
            'region'  => 'us-east-2',
            'version' => 'latest',
            'credentials' => [
                'key' => 'AKIAU3EY6KRD7D37Q6OV',
                'secret' => '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',
            ]
            ]);

        try{
           /* $result = $client->describeTable(array(
                'TableName' => 'webhook_config'
            ));*/
            $response = $client->query(array(
                'TableName' => 'webhook_config',
                'KeyConditionExpression' => '[Hash_Name] = :queue_name',
                'ExpressionAttributeValues' =>  array (
                    ':queue_name'  => array('S' => 'facebook_webhook_order_delete')
                )
            ));
        } catch (\Exception $e){
            echo $e->getMessage() ;
        }


        print_r($response);




        die('test 000');


        $config = new Configuration();

        /*
         * Add your credentials
         * Please add your access key here
         */
        $config->setAccessKey('AKIAJKTSDLJM7GXLQZ4Q');
        # Please add your secret key here
        $config->setSecretKey('kz06Ou/Wb6ML9dYnX5gWux43UkwptEYXWIixP6HD');

        # Please add your partner tag (store/tracking id) here
        $partnerTag = 'siropotech-20';

        /*
         * PAAPI host and region to which you want to send request
         * For more details refer:
         * https://webservices.amazon.com/paapi5/documentation/common-request-parameters.html#host-and-region
         */
        $config->setHost('webservices.amazon.com');
        $config->setRegion('us-east-1');

        $apiInstance = new DefaultApi(
        /*
         * If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
         * This is optional, `GuzzleHttp\Client` will be used as default.
         */
            new GuzzleHttp\Client(), $config);

        # Request initialization

        # Choose item id(s)
        $itemIds = array("059035342X", "B00X4WHP55", "1401263119");

        /*
         * Choose resources you want from GetItemsResource enum
         * For more details, refer: https://webservices.amazon.com/paapi5/documentation/get-items.html#resources-parameter
         */
        $resources = array(
            GetItemsResource::ITEM_INFOTITLE,
            GetItemsResource::OFFERSLISTINGSPRICE);

        # Forming the request
        $getItemsRequest = new GetItemsRequest();
        $getItemsRequest->setItemIds($itemIds);
        $getItemsRequest->setPartnerTag($partnerTag);
        $getItemsRequest->setPartnerType(PartnerType::ASSOCIATES);
        $getItemsRequest->setResources($resources);

        # Validating request
        $invalidPropertyList = $getItemsRequest->listInvalidProperties();
        $length = count($invalidPropertyList);
        if ($length > 0) {
            echo "Error forming the request", PHP_EOL;
            foreach ($invalidPropertyList as $invalidProperty) {
                echo $invalidProperty, PHP_EOL;
            }
            return;
        }

        # Sending the request
        try {
            $getItemsResponse = $apiInstance->getItems($getItemsRequest);

            echo 'API called successfully', PHP_EOL;
            echo 'Complete Response: ', $getItemsResponse, PHP_EOL;

            # Parsing the response
            /*if ($getItemsResponse->getItemsResult() != null) {
                echo 'Printing all item information in ItemsResult:', PHP_EOL;
                if ($getItemsResponse->getItemsResult()->getItems() != null) {
                    $responseList = Greetings::parseResponse($getItemsResponse->getItemsResult()->getItems());

                    foreach ($itemIds as $itemId) {
                        echo 'Printing information about the itemId: ', $itemId, PHP_EOL;
                        $item = $responseList[$itemId];
                        if ($item != null) {
                            if ($item->getASIN()) {
                                echo 'ASIN: ', $item->getASIN(), PHP_EOL;
                            }
                            if ($item->getItemInfo() != null and $item->getItemInfo()->getTitle() != null
                                and $item->getItemInfo()->getTitle()->getDisplayValue() != null) {
                                echo 'Title: ', $item->getItemInfo()->getTitle()->getDisplayValue(), PHP_EOL;
                            }
                            if ($item->getDetailPageURL() != null) {
                                echo 'Detail Page URL: ', $item->getDetailPageURL(), PHP_EOL;
                            }
                            if ($item->getOffers() != null and
                                $item->getOffers()->getListings() != null
                                and $item->getOffers()->getListings()[0]->getPrice() != null
                                and $item->getOffers()->getListings()[0]->getPrice()->getDisplayAmount() != null) {
                                echo 'Buying price: ', $item->getOffers()->getListings()[0]->getPrice()
                                    ->getDisplayAmount(), PHP_EOL;
                            }
                        } else {
                            echo "Item not found, check errors", PHP_EOL;
                        }
                    }
                }
            }*/
            if ($getItemsResponse->getErrors() != null) {
                echo PHP_EOL, 'Printing Errors:', PHP_EOL, 'Printing first error object from list of errors', PHP_EOL;
                echo 'Error code: ', $getItemsResponse->getErrors()[0]->getCode(), PHP_EOL;
                echo 'Error message: ', $getItemsResponse->getErrors()[0]->getMessage(), PHP_EOL;
            }
        } catch (ApiException $exception) {
            echo "Error calling PA-API 5.0!", PHP_EOL;
            echo "HTTP Status Code: ", $exception->getCode(), PHP_EOL;
            echo "Error Message: ", $exception->getMessage(), PHP_EOL;
            if ($exception->getResponseObject() instanceof ProductAdvertisingAPIClientException) {
                $errors = $exception->getResponseObject()->getErrors();
                foreach ($errors as $error) {
                    echo "Error Type: ", $error->getCode(), PHP_EOL;
                    echo "Error Message: ", $error->getMessage(), PHP_EOL;
                }
            } else {
                echo "Error response body: ", $exception->getResponseBody(), PHP_EOL;
            }
        } catch (Exception $exception) {
            echo "Error Message: ", $exception->getMessage(), PHP_EOL;
        }
    }
}
