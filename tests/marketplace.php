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
 * @package     Ced_Amazon
 * @author      CedCommerce Core Team <connect@cedcommerce.com>
 * @copyright   Copyright © 2018 CedCommerce. All rights reserved.
 * @license     EULA http://cedcommerce.com/license-agreement.txt
 */

namespace Amazon\Sdk;

use Amazon\Sdk\Exceptions\NotFoundException;
use Psr\Container\ContainerInterface;

/**
 * All Amazon marketplaces
 * Class Marketplace
 * @package Amazon\Sdk
 * @link https://docs.developer.amazonservices.com/en_IT/dev_guide/DG_Endpoints.html
 */
class Marketplace implements ContainerInterface
{
    // Regions
    const REGION_NORTH_AMERICA = "North America";
    const REGION_BRAZIL = "Brazil";
    const REGION_EUROPE = "Europe";
    const REGION_INDIA = "India";
    const REGION_CHINA = "China";
    const REGION_JAPAN = "Japan";
    const REGION_AUSTRALIA = "Australia";
    const REGION_FAR_EAST = "Far East";

    // Marketplace Ids
    const MARKETPLACE_ID_US = "ATVPDKIKX0DER";
    const MARKETPLACE_ID_CANADA = "A2EUQ1WTGCTBG2";
    const MARKETPLACE_ID_MEXICO = "A1AM78C64UM0Y8";
    const MARKETPLACE_ID_SPAIN = "A1RKKUPIHCS9HS";
    const MARKETPLACE_ID_UK = "A1F83G8C2ARO7P";
    const MARKETPLACE_ID_FRANCE = "A13V1IB3VIYZZH";
    const MARKETPLACE_ID_GERMANY = "A1PA6795UKMFR9";
    const MARKETPLACE_ID_ITALY = "APJ6JRA9NG5V4";
    const MARKETPLACE_ID_BRAZIL = "A2Q3Y263D00KWC";
    const MARKETPLACE_ID_INDIA = "A21TJRUUN4KGV";
    const MARKETPLACE_ID_CHINA = "AAHKV2X7AFYLW";
    const MARKETPLACE_ID_JAPAN = "A1VC38T7YXB528";
    const MARKETPLACE_ID_AUSTRALIA = "A39IBJ37TRP1C6";
    const MARKETPLACE_ID_TURKEY = "A33AVAJ2PDY3EV";
    const MARKETPLACE_ID_UAE = "A2VIGQ35RCS4UG";
    const MARKETPLACE_ID_SG = "A19VAU5U5O7RUS";
    const MARKETPLACE_ID_NL = "A1805IZSGTT6HS";
    const MARKETPLACE_ID_SA = "A17E79C6D8DWNP";
    const MARKETPLACE_ID_SE = "A2NODRKZP88ZB9";

    const MARKETPLACE_IDS = [
        self::MARKETPLACE_ID_US,
        self::MARKETPLACE_ID_CANADA,
        self::MARKETPLACE_ID_MEXICO,
        self::MARKETPLACE_ID_SPAIN,
        self::MARKETPLACE_ID_UK,
        self::MARKETPLACE_ID_FRANCE,
        self::MARKETPLACE_ID_GERMANY,
        self::MARKETPLACE_ID_ITALY,
        self::MARKETPLACE_ID_BRAZIL,
        self::MARKETPLACE_ID_INDIA,
        self::MARKETPLACE_ID_CHINA,
        self::MARKETPLACE_ID_JAPAN,
        self::MARKETPLACE_ID_AUSTRALIA,
        self::MARKETPLACE_ID_TURKEY,
        self::MARKETPLACE_ID_UAE,
        self::MARKETPLACE_ID_SG,
        self::MARKETPLACE_ID_NL,
        self::MARKETPLACE_ID_SA,
        self::MARKETPLACE_ID_SE
    ];

    const CURRENCY_CODE_USD = 'USD';
    const CURRENCY_CODE_INR = 'INR';
    const CURRENCY_CODE_GBP = 'GBP';
    const CURRENCY_CODE_EUR = 'EUR';
    const CURRENCY_CODE_TRY = 'TRY';
    const CURRENCY_CODE_JPY = 'JPY';
    const CURRENCY_CODE_CAD = 'CAD';
    const CURRENCY_CODE_AUD = 'AUD';
    const CURRENCY_CODE_BRL = 'BRL';
    const CURRENCY_CODE_AED = 'AED';
    const CURRENCY_CODE_MXN = 'MXN';
    const CURRENCY_CODE_CNY = 'CNY';
    const CURRENCY_CODE_SGD = 'SGD';
    const CURRENCY_CODE_SAR = 'SAR';
    const CURRENCY_CODE_SEK = 'SEK';
    const CURRENCY_CODE_DEFAULT = 'DEFAULT';

    /**
     * Endpoints are region specific, though indivisual endpoints are also active.
     *
     * North America (includes Canada, US, and Mexico)
     * Canada: https://mws.amazonservices.ca
     * US: https://mws.amazonservices.com
     * Mexico: https://mws.amazonservices.com.mx
     *
     * Brazil: https://mws.amazonservices.com.br
     *
     * Europe (includes Spain, UK, France, Germany, and Italy)
     * Spain: https://mws.amazonservices.es
     * UK: https://mws.amazonservices.co.uk
     * France: https://mws.amazonservices.fr
     * Germany: https://mws.amazonservices.de
     * Italy: https://mws.amazonservices.it
     * Turkey: https://mws-eu.amazonservices.com
     * United Arab Emirates (U.A.E.): https://mws.amazonservices.ae
     *
     * India: https://mws.amazonservices.in
     * China: https://mws.amazonservices.com.cn
     * Japan: https://mws.amazonservices.jp
     * Australia: https://mws.amazonservices.com.au
     *
     * @link https://docs.developer.amazonservices.com/en_IT/dev_guide/DG_Endpoints.html
     */
    const URL_NORTH_AMERICA = "https://mws.amazonservices.com/";
    const URL_BRAZIL = "https://mws.amazonservices.com/";
    const URL_EUROPE = "https://mws-eu.amazonservices.com/";
    const URL_INDIA = "https://mws.amazonservices.in/";
    const URL_CHINA = "https://mws.amazonservices.com.cn/";
    const URL_JAPAN = "https://mws.amazonservices.jp/";
    const URL_AUSTRALIA = "https://mws.amazonservices.com.au/";
    const URL_SINGAPORE = "https://mws-fe.amazonservices.com";
    const URL_CANADA = "https://mws.amazonservices.ca/";

    // Additional endpoints
    const URL_MEXICO = "https://mws.amazonservices.com.mx/";
    const URL_SPAIN = "https://mws.amazonservices.es/";
    const URL_UK = "https://mws.amazonservices.co.uk/";
    const URL_FRANCE = "https://mws.amazonservices.fr/";
    const URL_GERMANY = "https://mws.amazonservices.de/";
    const URL_ITALY = "https://mws.amazonservices.it/";
    const URL_TURKEY = "https://mws-eu.amazonservices.com/";
    const URL_UAE = "https://mws.amazonservices.ae/";
    const URL_SAUDIARABIA = "https://mws-eu.amazonservices.com/";
    const URL_SWEDEN = "https://mws-eu.amazonservices.com/";

    const URLS = [
        self::URL_NORTH_AMERICA,
        self::URL_BRAZIL,
        self::URL_EUROPE,
        self::URL_INDIA,
        self::URL_CHINA,
        self::URL_JAPAN,
        self::URL_AUSTRALIA,
        self::URL_SINGAPORE,
        self::URL_CANADA,
        self::URL_MEXICO,
        self::URL_SPAIN,
        self::URL_UK,
        self::URL_FRANCE,
        self::URL_GERMANY,
        self::URL_ITALY,
        self::URL_TURKEY,
        self::URL_UAE,
        self::URL_SAUDIARABIA,
        self::URL_SWEDEN,
    ];

    // SellerCentral urls
    const SELLER_CENTRAL_URL_IN = "https://sellercentral.amazon.in/";

    const SELLER_CENTRAL_URL_US = "https://sellercentral.amazon.com/";
    const SELLER_CENTRAL_URL_MX = "https://sellercentral.amazon.com.mx/";
    const SELLER_CENTRAL_URL_CA = "https://sellercentral.amazon.ca/";

    const SELLER_CENTRAL_URL_ES = "https://sellercentral.amazon.es/";
    const SELLER_CENTRAL_URL_IT = "https://sellercentral.amazon.it/";
    const SELLER_CENTRAL_URL_UK = "https://sellercentral.amazon.co.uk/";
    const SELLER_CENTRAL_URL_FR = "https://sellercentral.amazon.fr/";
    const SELLER_CENTRAL_URL_DE = "https://sellercentral.amazon.de/";
    const SELLER_CENTRAL_URL_TR = "https://sellercentral.amazon.com.tr/";
    const SELLER_CENTRAL_URL_AE = "https://sellercentral.amazon.ae/";
    const SELLER_CENTRAL_URL_EU = "https://sellercentral-europe.amazon.com/";

    const SELLER_CENTRAL_URL_AU = "https://sellercentral.amazon.com.au/";

    const SELLER_CENTRAL_URL_SG = "https://sellercentral.amazon.com/";

    const SELLER_CENTRAL_URL_CN = "https://mai.amazon.cn/";

    const SELLER_CENTRAL_URL_BR = "https://sellercentral.amazon.com.br/";

    const SELLER_CENTRAL_URL_JP = "https://sellercentral-japan.amazon.com/";

    const SELLER_CENTRAL_URL_NL = "https://sellercentral.amazon.nl/";
    const SELLER_CENTRAL_URL_SA = "https://sellercentral.amazon.sa/";
    const SELLER_CENTRAL_URL_SE = "https://sellercentral.amazon.se/";

    // Sales Channels
    const SALES_CHANNEL_NON = "Non-Amazon";
    const SALES_CHANNEL_CA = "Amazon.ca";
    const SALES_CHANNEL_US = "Amazon.com";
    const SALES_CHANNEL_MX = "Amazon.com.mx";
    const SALES_CHANNEL_AU = "Amazon.com.au";
    const SALES_CHANNEL_BR = "Amazon.com.br";
    const SALES_CHANNEL_TR = "Amazon.com.tr";
    const SALES_CHANNEL_JP = "Amazon.co.jp";
    const SALES_CHANNEL_ES = "Amazon.es";
    const SALES_CHANNEL_IT = "Amazon.it";
    const SALES_CHANNEL_UK = "Amazon.co.uk";
    const SALES_CHANNEL_DE = "Amazon.de";
    const SALES_CHANNEL_FR = "Amazon.fr";
    const SALES_CHANNEL_IN = "Amazon.in";
    const SALES_CHANNEL_CN = "Amazon.cn";
    const SALES_CHANNEL_AE = "Amazon.ae";
    const SALES_CHANNEL_SG = "Amazon.com.sg";
    const SALES_CHANNEL_NL = "Amazon.nl";
    const SALES_CHANNEL_SA = "Amazon.sa";
    const SALES_CHANNEL_SE = "Amazon.se";
    protected static $channels = [
        self::SALES_CHANNEL_US => self::MARKETPLACE_ID_US,
        self::SALES_CHANNEL_CA => self::MARKETPLACE_ID_CANADA,
        self::SALES_CHANNEL_MX => self::MARKETPLACE_ID_MEXICO,
        self::SALES_CHANNEL_ES => self::MARKETPLACE_ID_SPAIN,
        self::SALES_CHANNEL_IT => self::MARKETPLACE_ID_ITALY,
        self::SALES_CHANNEL_UK => self::MARKETPLACE_ID_UK,
        self::SALES_CHANNEL_DE => self::MARKETPLACE_ID_GERMANY,
        self::SALES_CHANNEL_FR => self::MARKETPLACE_ID_FRANCE,
        self::SALES_CHANNEL_AU => self::MARKETPLACE_ID_AUSTRALIA,
        self::SALES_CHANNEL_IN => self::MARKETPLACE_ID_INDIA,
        self::SALES_CHANNEL_AE => self::MARKETPLACE_ID_UAE,
        self::SALES_CHANNEL_BR => self::MARKETPLACE_ID_BRAZIL,
        self::SALES_CHANNEL_TR => self::MARKETPLACE_ID_TURKEY,
        self::SALES_CHANNEL_JP => self::MARKETPLACE_ID_JAPAN,
        self::SALES_CHANNEL_CN => self::MARKETPLACE_ID_CHINA,
        self::SALES_CHANNEL_SG => self::MARKETPLACE_ID_SG,
        self::SALES_CHANNEL_NL => self::MARKETPLACE_ID_NL,
        self::SALES_CHANNEL_SA => self::MARKETPLACE_ID_SA,
        self::SALES_CHANNEL_SE => self::MARKETPLACE_ID_SE,
    ];

    protected static $definitions = [
        self::MARKETPLACE_ID_US => [
            "region" => self::REGION_NORTH_AMERICA,
            "code" => "US",
            "value" => self::MARKETPLACE_ID_US,
            "name" => "US",
            "label" => "US [" . self::MARKETPLACE_ID_US . "]",
            "currency" => [
                self::CURRENCY_CODE_USD
            ],
            "sellercentral" => self::SELLER_CENTRAL_URL_US,
            "endpoint" => self::URL_NORTH_AMERICA,
        ],
        self::MARKETPLACE_ID_CANADA => [
            "region" => self::REGION_NORTH_AMERICA,
            "code" => "CA",
            "value" => self::MARKETPLACE_ID_CANADA,
            "name" => "Canada",
            "label" => "Canada [" . self::MARKETPLACE_ID_CANADA . "]",
            "currency" => [
                self::CURRENCY_CODE_CAD
            ],
            "sellercentral" => self::SELLER_CENTRAL_URL_CA,
            "endpoint" => self::URL_CANADA,
        ],
        self::MARKETPLACE_ID_MEXICO => [
            "region" => self::REGION_NORTH_AMERICA,
            "code" => "MX",
            "value" => self::MARKETPLACE_ID_MEXICO,
            "name" => "Mexico",
            "label" => "Mexico  [" . self::MARKETPLACE_ID_MEXICO . "]",
            "currency" => [
                self::CURRENCY_CODE_MXN
            ],
            "sellercentral" => self::SELLER_CENTRAL_URL_MX,
            "endpoint" => self::URL_MEXICO,
        ],
        self::MARKETPLACE_ID_SPAIN => [
            "region" => self::REGION_EUROPE,
            "code" => "ES",
            "value" => self::MARKETPLACE_ID_SPAIN,
            "name" => "Spain",
            "label" => "Spain [" . self::MARKETPLACE_ID_SPAIN . "]",
            "currency" => [
                self::CURRENCY_CODE_EUR
            ],
            "sellercentral" => self::SELLER_CENTRAL_URL_EU,
            "endpoint" => self::URL_SPAIN,
        ],
        self::MARKETPLACE_ID_UK => [
            "region" => self::REGION_EUROPE,
            "code" => "UK",
            "value" => self::MARKETPLACE_ID_UK,
            "name" => "UK",
            "label" => "UK [" . self::MARKETPLACE_ID_UK . "]",
            "currency" => [
                self::CURRENCY_CODE_EUR,
                self::CURRENCY_CODE_GBP,
            ],
            "sellercentral" => self::SELLER_CENTRAL_URL_EU,
            "endpoint" => self::URL_UK,
        ],
        self::MARKETPLACE_ID_FRANCE => [
            "region" => self::REGION_EUROPE,
            "code" => "FR",
            "value" => self::MARKETPLACE_ID_FRANCE,
            "name" => "France",
            "label" => "France [" . self::MARKETPLACE_ID_FRANCE . "]",
            "currency" => [
                self::CURRENCY_CODE_EUR,
            ],
            "sellercentral" => self::SELLER_CENTRAL_URL_EU,
            "endpoint" => self::URL_FRANCE,
        ],
        self::MARKETPLACE_ID_GERMANY => [
            "region" => self::REGION_EUROPE,
            "code" => "DE",
            "value" => self::MARKETPLACE_ID_GERMANY,
            "name" => "Germany",
            "label" => "Germany [" . self::MARKETPLACE_ID_GERMANY . "]",
            "currency" => [
                self::CURRENCY_CODE_EUR,
            ],
            "sellercentral" => self::SELLER_CENTRAL_URL_EU,
            "endpoint" => self::URL_GERMANY,
        ],
        self::MARKETPLACE_ID_ITALY => [
            "region" => self::REGION_EUROPE,
            "code" => "IT",
            "value" => self::MARKETPLACE_ID_ITALY,
            "name" => "Italy",
            "label" => "Italy [" . self::MARKETPLACE_ID_ITALY . "]",
            "currency" => [
                self::CURRENCY_CODE_EUR,
            ],
            "sellercentral" => self::SELLER_CENTRAL_URL_EU,
            "endpoint" => self::URL_ITALY,
        ],
        self::MARKETPLACE_ID_TURKEY => [
            "region" => self::REGION_EUROPE,
            "code" => "TR",
            "value" => self::MARKETPLACE_ID_TURKEY,
            "name" => "Turkey",
            "label" => "Turkey [" . self::MARKETPLACE_ID_TURKEY . "]",
            "currency" => [
                self::CURRENCY_CODE_EUR,
                self::CURRENCY_CODE_TRY,
            ],
            "sellercentral" => self::SELLER_CENTRAL_URL_TR,
            "endpoint" => self::URL_TURKEY,
        ],
        self::MARKETPLACE_ID_BRAZIL => [
            "region" => self::REGION_BRAZIL,
            "code" => "BR",
            "value" => self::MARKETPLACE_ID_BRAZIL,
            "name" => "Brazil",
            "label" => "Brazil [" . self::MARKETPLACE_ID_BRAZIL . "]",
            "currency" => [
                self::CURRENCY_CODE_BRL,
            ],
            "sellercentral" => self::SELLER_CENTRAL_URL_BR,
            "endpoint" => self::URL_BRAZIL,
        ],
        self::MARKETPLACE_ID_UAE => [
            "region" => self::REGION_EUROPE,
            "code" => "AE",
            "value" => self::MARKETPLACE_ID_UAE,
            "name" => "U.A.E.",
            "label" => "U.A.E. [" . self::MARKETPLACE_ID_UAE . "]",
            "currency" => [
                self::CURRENCY_CODE_AED,
            ],
            "sellercentral" => self::SELLER_CENTRAL_URL_AE,
            "endpoint" => self::URL_UAE,
        ],
        self::MARKETPLACE_ID_INDIA => [
            "region" => self::REGION_INDIA,
            "code" => "IN",
            "value" => self::MARKETPLACE_ID_INDIA,
            "name" => "India",
            "label" => "India [" . self::MARKETPLACE_ID_INDIA . "]",
            "currency" => [
                self::CURRENCY_CODE_INR,
            ],
            "sellercentral" => self::SELLER_CENTRAL_URL_IN,
            "endpoint" => self::URL_INDIA,
        ],
        self::MARKETPLACE_ID_CHINA => [
            "region" => self::REGION_CHINA,
            "code" => "CN",
            "value" => self::MARKETPLACE_ID_CHINA,
            "name" => "China",
            "label" => "China [" . self::MARKETPLACE_ID_CHINA . "]",
            "currency" => [
                self::CURRENCY_CODE_CNY,
            ],
            "sellercentral" => self::SELLER_CENTRAL_URL_CN,
            "endpoint" => self::URL_CHINA,
        ],
        self::MARKETPLACE_ID_JAPAN => [
            "region" => self::REGION_AUSTRALIA,
            "code" => "JP",
            "value" => self::MARKETPLACE_ID_JAPAN,
            "name" => "Japan",
            "label" => "Japan [" . self::MARKETPLACE_ID_CHINA . "]",
            "currency" => [
                self::CURRENCY_CODE_JPY,
            ],
            "sellercentral" => self::SELLER_CENTRAL_URL_JP,
            "endpoint" => self::URL_JAPAN,
        ],
        self::MARKETPLACE_ID_AUSTRALIA => [
            "region" => self::REGION_AUSTRALIA,
            "code" => "AU",
            "value" => self::MARKETPLACE_ID_AUSTRALIA,
            "name" => "Australia",
            "label" => "Australia [" . self::MARKETPLACE_ID_AUSTRALIA . "]",
            "currency" => [
                self::CURRENCY_CODE_AUD,
            ],
            "sellercentral" => self::SELLER_CENTRAL_URL_AU,
            "endpoint" => self::URL_AUSTRALIA,
        ],
        self::MARKETPLACE_ID_SG => [
            "region" => self::REGION_FAR_EAST,
            "code" => "SG",
            "value" => self::MARKETPLACE_ID_SG,
            "name" => "Singapore",
            "label" => "Singapore [" . self::MARKETPLACE_ID_SG . "]",
            "currency" => [
                self::CURRENCY_CODE_SGD,
            ],
            "sellercentral" => self::SELLER_CENTRAL_URL_SG,
            "endpoint" => self::URL_SINGAPORE,
        ],
        self::MARKETPLACE_ID_NL => [
            "region" => self::REGION_EUROPE,
            "code" => "NL",
            "value" => self::MARKETPLACE_ID_NL,
            "name" => "Netherland",
            "label" => "Netherland [" . self::MARKETPLACE_ID_NL . "]",
            "currency" => [
                self::CURRENCY_CODE_EUR,
            ],
            "sellercentral" => self::SELLER_CENTRAL_URL_NL,
            "endpoint" => self::URL_GERMANY,
        ],
        self::MARKETPLACE_ID_SA => [
            "region" => self::REGION_EUROPE,
            "code" => "SA",
            "value" => self::MARKETPLACE_ID_SA,
            "name" => "SaudiArabia",
            "label" => "SaudiArabia [" . self::MARKETPLACE_ID_SA . "]",
            "currency" => [
                self::CURRENCY_CODE_SAR,
            ],
            "sellercentral" => self::SELLER_CENTRAL_URL_SA,
            "endpoint" => self::URL_SAUDIARABIA,
        ],
        self::MARKETPLACE_ID_SE => [
            "region" => self::REGION_EUROPE,
            "code" => "SE",
            "value" => self::MARKETPLACE_ID_SE,
            "name" => "Sweden",
            "label" => "Sweden [" . self::MARKETPLACE_ID_SE . "]",
            "currency" => [
                self::CURRENCY_CODE_SEK,
            ],
            "sellercentral" => self::SELLER_CENTRAL_URL_SE,
            "endpoint" => self::URL_SWEDEN,
        ]

    ];

    /**
     * @return array
     */
    public function getCollection()
    {
        return self::$definitions;
    }

    /**
     * Get endpoint url, default is US
     * @param $id
     * @param string $type , "region"|"mp"
     * @return string
     */
    public function url($id, $type = "region")
    {
        $url = self::URL_NORTH_AMERICA;
        if ($this->has($id)) {
            $marketplace = $this->get($id);
            if ($type == "region") {
                switch ($marketplace['region']) {
                    case self::REGION_NORTH_AMERICA:
                        $url = self::URL_NORTH_AMERICA;
                        break;
                    case self::REGION_EUROPE:
                        $url = self::URL_EUROPE;
                        break;
                    case self::REGION_BRAZIL:
                        $url = self::URL_BRAZIL;
                        break;
                    case self::REGION_AUSTRALIA:
                        $url = self::URL_AUSTRALIA;
                        break;
                    case self::REGION_JAPAN:
                        $url = self::URL_JAPAN;
                        break;
                    case self::REGION_CHINA:
                        $url = self::URL_CHINA;
                        break;
                    case self::REGION_INDIA:
                        $url = self::URL_INDIA;
                        break;
                    // Far east : Singapore only
                    case self::REGION_FAR_EAST:
                        $url = self::URL_SINGAPORE;
                        break;
                }
            } else {
                $url = $marketplace["endpoint"];
            }
        }

        return $url;
    }

    /**
     * @inheritdoc
     */
    public function has($id)
    {
        return isset(self::$definitions[$id]);
    }

    /**
     * @inheritdoc
     */
    public function get($id)
    {
        if (!isset(self::$definitions[$id])) {
            throw new NotFoundException("No entry found for '{$id}'");
        }

        return self::$definitions[$id];
    }

    public static function getRegionByMarketplaceId($id)
    {
        $region = null;
        if (isset(self::$definitions[$id]['region'])) {
            $region = self::$definitions[$id]['region'];
        }

        return $region;
    }


    public static function getCodeByMarketplaceId($id)
    {
        $code = null;
        if (isset(self::$definitions[$id]['code'])) {
            $code = self::$definitions[$id]['code'];
        }

        return $code;
    }

    public static function getCodeBySalesChannel($channel)
    {
        $code = null;

        if (isset(self::$channels[$channel])) {
            $code = self::$channels[$channel];
        }

        return $code;
    }

    public static function getSellerCentralByMarketplaceId($id)
    {
        $url = null;
        if (isset(self::$definitions[$id]['sellercentral'])) {
            $url = self::$definitions[$id]['sellercentral'];
        }

        return $url;
    }

    /**
     * @param $marketplaceId
     * @return mixed
     */
    public function getCurrencyCodeByMarketplaceId($marketplaceId)
    {
        $currency = [
            'A2Q3Y263D00KWC' => 'BRL',
            'A2EUQ1WTGCTBG2' => 'CAD',
            'A1AM78C64UM0Y8' => 'MXN',
            'ATVPDKIKX0DER' => 'USD',
            'A2VIGQ35RCS4UG' => 'AED',
            'A1PA6795UKMFR9' => 'EUR',
            'ARBP9OOSHTCHU' => 'EGP',
            'A1RKKUPIHCS9HS' => 'EUR',
            'A13V1IB3VIYZZH' => 'EUR',
            'A1F83G8C2ARO7P' => 'GBP',
            'A21TJRUUN4KGV' => 'INR',
            'APJ6JRA9NG5V4' => 'EUR',
            'A17E79C6D8DWNP' => 'SAR',
            'A33AVAJ2PDY3EV' => 'TRY',
            'A19VAU5U5O7RUS' => 'SGD',
            'A39IBJ37TRP1C6' => 'AUD',
            'A1VC38T7YXB528' => 'JPY',
            'A1805IZSGTT6HS' => 'EUR',
            'A2NODRKZP88ZB9' => 'SEK',
        ];
        $currencyCode = $currency[$marketplaceId];

        return $currencyCode;
    }
}
