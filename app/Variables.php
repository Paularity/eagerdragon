<?php

namespace App;

use OwenIt\Auditing\Auditable as AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Variables extends Model implements Auditable
{
    use AuditableTrait;

    protected $businessType = [
        'sole-proprietorship' => 'Sole Proprietorship',
        'partnership' => 'Partnership',
        'corporation' => 'Corporation or LLC',
        'non-profit' => 'Non-Profit',
        'trust' => 'Trust',
    ];

    protected $timezones = [
        'GMT -12:00' => '(GMT -12:00) Eniwetok, Kwajalein',
        'GMT -11:00' => '(GMT -11:00) Midway Island, Samoa',
        'GMT -10:00' => '(GMT -10:00) Hawaii',
        'GMT -9:00' => '(GMT -9:00) Alaska',
        'GMT -8:00' => '(GMT -8:00) Pacific Time (US &amp; Canada)',
        'GMT -7:00' => '(GMT -7:00) Mountain Time (US &amp; Canada)',
        'GMT -6:00' => '(GMT -6:00) Central Time (US &amp; Canada), Mexico City',
        'GMT -5:00' => '(GMT -5:00) Eastern Time (US &amp; Canada), Bogota, Lima',
        'GMT -4:00' => '(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz',
        'GMT -3:00' => '(GMT -3:00) Brazil, Buenos Aires, Georgetown',
        'GMT -2:00' => '(GMT -2:00) Mid-Atlantic',
        'GMT -1:00' => '(GMT -1:00) Azores, Cape Verde Islands',
        'GMT 0:00' => '(GMT) Western Europe Time, London, Lisbon, Casablanca',
        'GMT +1:00' => '(GMT +1:00 hour) Brussels, Copenhagen, Madrid, Paris',
        'GMT +2:00' => '(GMT +2:00) Kaliningrad, South Africa',
        'GMT +3:00' => '(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg',
        'GMT +4:00' => '(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi',
        'GMT +5:00' => '(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent',
        'GMT +6:00' => '(GMT +6:00) Almaty, Dhaka, Colombo',
        'GMT +7:00' => '(GMT +7:00) Bangkok, Hanoi, Jakarta',
        'GMT +8:00' => '(GMT +8:00) Beijing, Perth, Singapore, Hong Kong',
        'GMT +9:00' => '(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk',
        'GMT +10:00' => '(GMT +10:00) Eastern Australia, Guam, Vladivostok',
        'GMT +11:00' => '(GMT +11:00) Magadan, Solomon Islands, New Caledonia',
        'GMT +12:00' => '(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka',
    ];

    protected $countryList = [
        'US' => 'UNITED STATES OF AMERICA',
        'AF' => 'AFGHANISTAN',
        'AL' => 'ALBANIA',
        'DZ' => 'ALGERIA',
        'AS' => 'AMERICAN SAMOA',
        'AD' => 'ANDORRA',
        'AO' => 'ANGOLA',
        'AI' => 'ANGUILLA',
        'AQ' => 'ANTARCTICA',
        'AG' => 'ANTIGUA AND BARBUDA',
        'AR' => 'ARGENTINA',
        'AM' => 'ARMENIA',
        'AW' => 'ARUBA',
        'AU' => 'AUSTRALIA',
        'AT' => 'AUSTRIA',
        'AZ' => 'AZERBAIJAN',
        'BS' => 'BAHAMAS',
        'BH' => 'BAHRAIN',
        'BD' => 'BANGLADESH',
        'BB' => 'BARBADOS',
        'BY' => 'BELARUS',
        'BE' => 'BELGIUM',
        'BZ' => 'BELIZE',
        'BJ' => 'BENIN',
        'BM' => 'BERMUDA',
        'BT' => 'BHUTAN',
        'BO' => 'BOLIVIA',
        'BA' => 'BOSNIA AND HERZEGOVINA',
        'BW' => 'BOTSWANA',
        'BV' => 'BOUVET ISLAND',
        'BR' => 'BRAZIL',
        'IO' => 'BRITISH INDIAN OCEAN TERRITORY',
        'BN' => 'BRUNEI DARUSSALAM',
        'BG' => 'BULGARIA',
        'BF' => 'BURKINA FASO',
        'BI' => 'BURUNDI',
        'KH' => 'CAMBODIA',
        'CM' => 'CAMEROON',
        'CA' => 'CANADA',
        'CV' => 'CAPE VERDE',
        'KY' => 'CAYMAN ISLANDS',
        'CF' => 'CENTRAL AFRICAN REPUBLIC',
        'TD' => 'CHAD',
        'CL' => 'CHILE',
        'CN' => 'CHINA',
        'CX' => 'CHRISTMAS ISLAND',
        'CC' => 'COCOS (KEELING) ISLANDS',
        'CO' => 'COLOMBIA',
        'KM' => 'COMOROS',
        'CG' => 'CONGO',
        'CD' => 'CONGO, THE DEMOCRATIC REPUBLIC OF THE',
        'CK' => 'COOK ISLANDS',
        'CR' => 'COSTA RICA',
        'CI' => 'COTE D IVOIRE',
        'HR' => 'CROATIA',
        'CU' => 'CUBA',
        'CY' => 'CYPRUS',
        'CZ' => 'CZECH REPUBLIC',
        'DK' => 'DENMARK',
        'DJ' => 'DJIBOUTI',
        'DM' => 'DOMINICA',
        'DO' => 'DOMINICAN REPUBLIC',
        'TP' => 'EAST TIMOR',
        'EC' => 'ECUADOR',
        'EG' => 'EGYPT',
        'SV' => 'EL SALVADOR',
        'GQ' => 'EQUATORIAL GUINEA',
        'ER' => 'ERITREA',
        'EE' => 'ESTONIA',
        'ET' => 'ETHIOPIA',
        'FK' => 'FALKLAND ISLANDS (MALVINAS)',
        'FO' => 'FAROE ISLANDS',
        'FJ' => 'FIJI',
        'FI' => 'FINLAND',
        'FR' => 'FRANCE',
        'GF' => 'FRENCH GUIANA',
        'PF' => 'FRENCH POLYNESIA',
        'TF' => 'FRENCH SOUTHERN TERRITORIES',
        'GA' => 'GABON',
        'GM' => 'GAMBIA',
        'GE' => 'GEORGIA',
        'DE' => 'GERMANY',
        'GH' => 'GHANA',
        'GI' => 'GIBRALTAR',
        'GR' => 'GREECE',
        'GL' => 'GREENLAND',
        'GD' => 'GRENADA',
        'GP' => 'GUADELOUPE',
        'GU' => 'GUAM',
        'GT' => 'GUATEMALA',
        'GN' => 'GUINEA',
        'GW' => 'GUINEA-BISSAU',
        'GY' => 'GUYANA',
        'HT' => 'HAITI',
        'HM' => 'HEARD ISLAND AND MCDONALD ISLANDS',
        'VA' => 'HOLY SEE (VATICAN CITY STATE)',
        'HN' => 'HONDURAS',
        'HK' => 'HONG KONG',
        'HU' => 'HUNGARY',
        'IS' => 'ICELAND',
        'IN' => 'INDIA',
        'ID' => 'INDONESIA',
        'IR' => 'IRAN, ISLAMIC REPUBLIC OF',
        'IQ' => 'IRAQ',
        'IE' => 'IRELAND',
        'IL' => 'ISRAEL',
        'IT' => 'ITALY',
        'JM' => 'JAMAICA',
        'JP' => 'JAPAN',
        'JO' => 'JORDAN',
        'KZ' => 'KAZAKSTAN',
        'KE' => 'KENYA',
        'KI' => 'KIRIBATI',
        'KP' => 'KOREA DEMOCRATIC PEOPLES REPUBLIC OF',
        'KR' => 'KOREA REPUBLIC OF',
        'KW' => 'KUWAIT',
        'KG' => 'KYRGYZSTAN',
        'LA' => 'LAO PEOPLES DEMOCRATIC REPUBLIC',
        'LV' => 'LATVIA',
        'LB' => 'LEBANON',
        'LS' => 'LESOTHO',
        'LR' => 'LIBERIA',
        'LY' => 'LIBYAN ARAB JAMAHIRIYA',
        'LI' => 'LIECHTENSTEIN',
        'LT' => 'LITHUANIA',
        'LU' => 'LUXEMBOURG',
        'MO' => 'MACAU',
        'MK' => 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF',
        'MG' => 'MADAGASCAR',
        'MW' => 'MALAWI',
        'MY' => 'MALAYSIA',
        'MV' => 'MALDIVES',
        'ML' => 'MALI',
        'MT' => 'MALTA',
        'MH' => 'MARSHALL ISLANDS',
        'MQ' => 'MARTINIQUE',
        'MR' => 'MAURITANIA',
        'MU' => 'MAURITIUS',
        'YT' => 'MAYOTTE',
        'MX' => 'MEXICO',
        'FM' => 'MICRONESIA, FEDERATED STATES OF',
        'MD' => 'MOLDOVA, REPUBLIC OF',
        'MC' => 'MONACO',
        'MN' => 'MONGOLIA',
        'MS' => 'MONTSERRAT',
        'MA' => 'MOROCCO',
        'MZ' => 'MOZAMBIQUE',
        'MM' => 'MYANMAR',
        'NA' => 'NAMIBIA',
        'NR' => 'NAURU',
        'NP' => 'NEPAL',
        'NL' => 'NETHERLANDS',
        'AN' => 'NETHERLANDS ANTILLES',
        'NC' => 'NEW CALEDONIA',
        'NZ' => 'NEW ZEALAND',
        'NI' => 'NICARAGUA',
        'NE' => 'NIGER',
        'NG' => 'NIGERIA',
        'NU' => 'NIUE',
        'NF' => 'NORFOLK ISLAND',
        'MP' => 'NORTHERN MARIANA ISLANDS',
        'NO' => 'NORWAY',
        'OM' => 'OMAN',
        'PK' => 'PAKISTAN',
        'PW' => 'PALAU',
        'PS' => 'PALESTINIAN TERRITORY, OCCUPIED',
        'PA' => 'PANAMA',
        'PG' => 'PAPUA NEW GUINEA',
        'PY' => 'PARAGUAY',
        'PE' => 'PERU',
        'PH' => 'PHILIPPINES',
        'PN' => 'PITCAIRN',
        'PL' => 'POLAND',
        'PT' => 'PORTUGAL',
        'PR' => 'PUERTO RICO',
        'QA' => 'QATAR',
        'RE' => 'REUNION',
        'RO' => 'ROMANIA',
        'RU' => 'RUSSIAN FEDERATION',
        'RW' => 'RWANDA',
        'SH' => 'SAINT HELENA',
        'KN' => 'SAINT KITTS AND NEVIS',
        'LC' => 'SAINT LUCIA',
        'PM' => 'SAINT PIERRE AND MIQUELON',
        'VC' => 'SAINT VINCENT AND THE GRENADINES',
        'WS' => 'SAMOA',
        'SM' => 'SAN MARINO',
        'ST' => 'SAO TOME AND PRINCIPE',
        'SA' => 'SAUDI ARABIA',
        'SN' => 'SENEGAL',
        'SC' => 'SEYCHELLES',
        'SL' => 'SIERRA LEONE',
        'SG' => 'SINGAPORE',
        'SK' => 'SLOVAKIA',
        'SI' => 'SLOVENIA',
        'SB' => 'SOLOMON ISLANDS',
        'SO' => 'SOMALIA',
        'ZA' => 'SOUTH AFRICA',
        'GS' => 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS',
        'ES' => 'SPAIN',
        'LK' => 'SRI LANKA',
        'SD' => 'SUDAN',
        'SR' => 'SURINAME',
        'SJ' => 'SVALBARD AND JAN MAYEN',
        'SZ' => 'SWAZILAND',
        'SE' => 'SWEDEN',
        'CH' => 'SWITZERLAND',
        'SY' => 'SYRIAN ARAB REPUBLIC',
        'TW' => 'TAIWAN, PROVINCE OF CHINA',
        'TJ' => 'TAJIKISTAN',
        'TZ' => 'TANZANIA, UNITED REPUBLIC OF',
        'TH' => 'THAILAND',
        'TG' => 'TOGO',
        'TK' => 'TOKELAU',
        'TO' => 'TONGA',
        'TT' => 'TRINIDAD AND TOBAGO',
        'TN' => 'TUNISIA',
        'TR' => 'TURKEY',
        'TM' => 'TURKMENISTAN',
        'TC' => 'TURKS AND CAICOS ISLANDS',
        'TV' => 'TUVALU',
        'UG' => 'UGANDA',
        'UA' => 'UKRAINE',
        'AE' => 'UNITED ARAB EMIRATES',
        'GB' => 'UNITED KINGDOM',
        'UM' => 'UNITED STATES MINOR OUTLYING ISLANDS',
        'UY' => 'URUGUAY',
        'UZ' => 'UZBEKISTAN',
        'VU' => 'VANUATU',
        'VE' => 'VENEZUELA',
        'VN' => 'VIET NAM',
        'VG' => 'VIRGIN ISLANDS, BRITISH',
        'VI' => 'VIRGIN ISLANDS, U.S.',
        'WF' => 'WALLIS AND FUTUNA',
        'EH' => 'WESTERN SAHARA',
        'YE' => 'YEMEN',
        'YU' => 'YUGOSLAVIA',
        'ZM' => 'ZAMBIA',
        'ZW' => 'ZIMBABWE',
    ];

    protected $statesList = [
        'AL' => 'Alabama',
        'AK' => 'Alaska',
        'AZ' => 'Arizona',
        'AR' => 'Arkansas',
        'CA' => 'California',
        'CO' => 'Colorado',
        'CT' => 'Connecticut',
        'DE' => 'Delaware',
        'DC' => 'District Of Columbia',
        'FL' => 'Florida',
        'GA' => 'Georgia',
        'HI' => 'Hawaii',
        'ID' => 'Idaho',
        'IL' => 'Illinois',
        'IN' => 'Indiana',
        'IA' => 'Iowa',
        'KS' => 'Kansas',
        'KY' => 'Kentucky',
        'LA' => 'Louisiana',
        'ME' => 'Maine',
        'MD' => 'Maryland',
        'MA' => 'Massachusetts',
        'MI' => 'Michigan',
        'MN' => 'Minnesota',
        'MS' => 'Mississippi',
        'MO' => 'Missouri',
        'MT' => 'Montana',
        'NE' => 'Nebraska',
        'NV' => 'Nevada',
        'NH' => 'New Hampshire',
        'NJ' => 'New Jersey',
        'NM' => 'New Mexico',
        'NY' => 'New York',
        'NC' => 'North Carolina',
        'ND' => 'North Dakota',
        'OH' => 'Ohio',
        'OK' => 'Oklahoma',
        'OR' => 'Oregon',
        'PA' => 'Pennsylvania',
        'RI' => 'Rhode Island',
        'SC' => 'South Carolina',
        'SD' => 'South Dakota',
        'TN' => 'Tennessee',
        'TX' => 'Texas',
        'UT' => 'Utah',
        'VT' => 'Vermont',
        'VA' => 'Virginia',
        'WA' => 'Washington',
        'WV' => 'West Virginia',
        'WI' => 'Wisconsin',
        'WY' => 'Wyoming',
    ];

    protected $currencyList = [
        'ALL' => 'Albania Lek',
        'AFN' => 'Afghanistan Afghani',
        'ARS' => 'Argentina Peso',
        'AWG' => 'Aruba Guilder',
        'AUD' => 'Australia Dollar',
        'AZN' => 'Azerbaijan New Manat',
        'BSD' => 'Bahamas Dollar',
        'BBD' => 'Barbados Dollar',
        'BDT' => 'Bangladeshi taka',
        'BYR' => 'Belarus Ruble',
        'BZD' => 'Belize Dollar',
        'BMD' => 'Bermuda Dollar',
        'BOB' => 'Bolivia Boliviano',
        'BAM' => 'Bosnia and Herzegovina Convertible Marka',
        'BWP' => 'Botswana Pula',
        'BGN' => 'Bulgaria Lev',
        'BRL' => 'Brazil Real',
        'BND' => 'Brunei Darussalam Dollar',
        'KHR' => 'Cambodia Riel',
        'CAD' => 'Canada Dollar',
        'KYD' => 'Cayman Islands Dollar',
        'CLP' => 'Chile Peso',
        'CNY' => 'China Yuan Renminbi',
        'COP' => 'Colombia Peso',
        'CRC' => 'Costa Rica Colon',
        'HRK' => 'Croatia Kuna',
        'CUP' => 'Cuba Peso',
        'CZK' => 'Czech Republic Koruna',
        'DKK' => 'Denmark Krone',
        'DOP' => 'Dominican Republic Peso',
        'XCD' => 'East Caribbean Dollar',
        'EGP' => 'Egypt Pound',
        'SVC' => 'El Salvador Colon',
        'EEK' => 'Estonia Kroon',
        'EUR' => 'Euro Member Countries',
        'FKP' => 'Falkland Islands (Malvinas) Pound',
        'FJD' => 'Fiji Dollar',
        'GHC' => 'Ghana Cedis',
        'GIP' => 'Gibraltar Pound',
        'GTQ' => 'Guatemala Quetzal',
        'GGP' => 'Guernsey Pound',
        'GYD' => 'Guyana Dollar',
        'HNL' => 'Honduras Lempira',
        'HKD' => 'Hong Kong Dollar',
        'HUF' => 'Hungary Forint',
        'ISK' => 'Iceland Krona',
        'INR' => 'India Rupee',
        'IDR' => 'Indonesia Rupiah',
        'IRR' => 'Iran Rial',
        'IMP' => 'Isle of Man Pound',
        'ILS' => 'Israel Shekel',
        'JMD' => 'Jamaica Dollar',
        'JPY' => 'Japan Yen',
        'JEP' => 'Jersey Pound',
        'KZT' => 'Kazakhstan Tenge',
        'KPW' => 'Korea (North) Won',
        'KRW' => 'Korea (South) Won',
        'KGS' => 'Kyrgyzstan Som',
        'LAK' => 'Laos Kip',
        'LVL' => 'Latvia Lat',
        'LBP' => 'Lebanon Pound',
        'LRD' => 'Liberia Dollar',
        'LTL' => 'Lithuania Litas',
        'MKD' => 'Macedonia Denar',
        'MYR' => 'Malaysia Ringgit',
        'MUR' => 'Mauritius Rupee',
        'MXN' => 'Mexico Peso',
        'MNT' => 'Mongolia Tughrik',
        'MZN' => 'Mozambique Metical',
        'NAD' => 'Namibia Dollar',
        'NPR' => 'Nepal Rupee',
        'ANG' => 'Netherlands Antilles Guilder',
        'NZD' => 'New Zealand Dollar',
        'NIO' => 'Nicaragua Cordoba',
        'NGN' => 'Nigeria Naira',
        'NOK' => 'Norway Krone',
        'OMR' => 'Oman Rial',
        'PKR' => 'Pakistan Rupee',
        'PAB' => 'Panama Balboa',
        'PYG' => 'Paraguay Guarani',
        'PEN' => 'Peru Nuevo Sol',
        'PHP' => 'Philippines Peso',
        'PLN' => 'Poland Zloty',
        'QAR' => 'Qatar Riyal',
        'RON' => 'Romania New Leu',
        'RUB' => 'Russia Ruble',
        'SHP' => 'Saint Helena Pound',
        'SAR' => 'Saudi Arabia Riyal',
        'RSD' => 'Serbia Dinar',
        'SCR' => 'Seychelles Rupee',
        'SGD' => 'Singapore Dollar',
        'SBD' => 'Solomon Islands Dollar',
        'SOS' => 'Somalia Shilling',
        'ZAR' => 'South Africa Rand',
        'LKR' => 'Sri Lanka Rupee',
        'SEK' => 'Sweden Krona',
        'CHF' => 'Switzerland Franc',
        'SRD' => 'Suriname Dollar',
        'SYP' => 'Syria Pound',
        'TWD' => 'Taiwan New Dollar',
        'THB' => 'Thailand Baht',
        'TTD' => 'Trinidad and Tobago Dollar',
        'TRY' => 'Turkey Lira',
        'TRL' => 'Turkey Lira',
        'TVD' => 'Tuvalu Dollar',
        'UAH' => 'Ukraine Hryvna',
        'GBP' => 'United Kingdom Pound',
        'USD' => 'United States Dollar',
        'UYU' => 'Uruguay Peso',
        'UZS' => 'Uzbekistan Som',
        'VEF' => 'Venezuela Bolivar',
        'VND' => 'Viet Nam Dong',
        'YER' => 'Yemen Rial',
        'ZWD' => 'Zimbabwe Dollar',
    ];

    protected $transactionTypeList = [
        'sales' => 'Sales',
        'refund' => 'Refund/Credit',
        'auth' => 'Authorize Only',
        'capture' => 'Capture',
        'void' => 'Void',
    ];

    protected $paymentMethodList = [
        'sale', 'refund',
    ];

    protected $environmentList = [
        'test', 'livetest', 'live',
    ];

    protected $expirationMonth = [
        1 => 'Jan', 
        2 => 'Feb', 
        3 => 'Mar', 
        4 => 'Apr',
        5 => 'May', 
        6 => 'Jun', 
        7 => 'Jul', 
        8 => 'Aug',
        9 => 'Sep', 
        10 => 'Oct', 
        11 => 'Nov', 
        12 => 'Dec',
    ];

    protected $disputeResultList = [
        'unknown',
        'won',
        'lost',
        'undisputed',
        'do-not-disputed',
    ];

    protected $statusList = [
        'Pending' => 1,
        '1st response sent to bank' => 2,
        '1st response receive from bank' => 3,
        '2nd Response Sent to Bank' => 4,
        '2nd Response Received From Bank' => 5,
        '3rd Response Sent to Bank' => 6,
        '3rd Response Received From Bank' => 7,
        '4th Response Sent to Bank' => 8,
        '4th Response Received From Bank' => 9,
        'Final' => 10,
    ];

    protected $cardTypes = [
        'visa', 'mastercard', 'amex',
        'maestro', 'jcb',
    ];

    protected $chargebackResponses = [
        1 => 'Invalid Transaction - Others',
        2 => 'Transaction Specification Form Error',
        3 => 'Processing Valid',
    ];

    public function getTimezones()
    {
        return $this->timezones;
    }

    public function getCountriesList()
    {
        return $this->countryList;
    }

    public function getStatesList()
    {
        return $this->statesList;
    }

    public function getBusinessType()
    {
        return $this->businessType;
    }

    public function getCurrencyList()
    {
        return $this->currencyList;
    }

    public function getTransactionTypes()
    {
        return $this->transactionTypeList;
    }

    public function getPaymentMethods()
    {
        return $this->paymentMethodList;
    }

    public function getEnvironmentList()
    {
        return $this->environmentList;
    }

    public function getExpirationMonth()
    {
        return $this->expirationMonth;
    }

    public function getDisputeResultList()
    {
        return $this->disputeResultList;
    }

    public function getStatusList()
    {
        return $this->statusList;
    }

    public function getCardTypes()
    {
        return $this->cardTypes;
    }

    public function getChargebackResponses()
    {
        return $this->chargebackResponses;
    }

    public function recurrings()
    {
        return [
            1 => '1st',
            2 => '2nd',
            3 => '3rd',
            4 => '4th',
        ];
    }

    public function bins()
    {
        return [
            10 => 'Top 10',
            15 => 'Top 15',
            25 => 'Top 25',
            50 => 'Top 50',
            100 => 'Top 100',
            200 => 'Top 200',
        ];
    }

    public function supportedCurrnecies()
    {
        return [
            'CAD' => 'Canada Dollar',
            'EUR' => 'Euro Member Countries',
            'GBP' => 'British Pound',
            'USD' => 'United States Dollar',
        ];
    }
}
