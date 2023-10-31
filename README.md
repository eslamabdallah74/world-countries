# World Countries

World Countries, is a Laravel package that provides an easy way to retrieve a list of countries with their respective states and cities. This can be useful for various applications, such as creating location-based forms, populating dropdowns, or any other scenario where you need to work with geographical data.

## Installation

Add the package to your Laravel app via Composer:

```bash
composer require melsaka/world-countries
```

Register the package's service provider in config/app.php.

```php
'providers' => [
    ...
    Melsaka\WorldCountries\WorldCountriesServiceProvider::class,
    ...
];
```

## Usage

After installing the package, you can start using it in your Laravel application.

### Countries

You can access all countries data using the `get()` method:

```php
use Melsaka\WorldCountries\Country;

$countries = new Country();

// returns a laravel collection of all supported countries. 
$allCountries = $countries->get();

// returns the data of a specifc country as an array
$egypt = $countries->get('eg');
```

Country Data Example:

```php
array:24 [▼
  "id" => 65
  "name" => "Egypt"
  "name_ar" => "مصر"
  "iso3" => "EGY"
  "iso2" => "EG"
  "numeric_code" => "818"
  "phone_code" => "20"
  "capital" => "Cairo"
  "currency" => "EGP"
  "currency_name" => "Egyptian pound"
  "currency_symbol" => "ج.م"
  "tld" => ".eg"
  "native" => "مصر‎"
  "region" => "Africa"
  "region_id" => "1"
  "subregion" => "Northern Africa"
  "subregion_id" => "1"
  "nationality" => "Egyptian"
  "timezones" => array:1 [▼
    0 => array:5 [▼
      "zoneName" => "Africa/Cairo"
      "gmtOffset" => 7200
      "gmtOffsetName" => "UTC+02:00"
      "abbreviation" => "EET"
      "tzName" => "Eastern European Time"
    ]
  ]
  "translations" => array:13 [▼
    "kr" => "이집트"
    "pt-BR" => "Egito"
    "pt" => "Egipto"
    "nl" => "Egypte"
    "hr" => "Egipat"
    "fa" => "مصر"
    "de" => "Ägypten"
    "es" => "Egipto"
    "fr" => "Égypte"
    "ja" => "エジプト"
    "it" => "Egitto"
    "cn" => "埃及"
    "tr" => "Mısır"
  ]
  "latitude" => "27.00000000"
  "longitude" => "30.00000000"
  "emoji" => "🇪🇬"
  "emojiU" => "U+1F1EA U+1F1EC"
]
```

### States

To get the country states data:

```php
// returns a laravel collection of egyptian states. 
$egyptianStates = Country::states($egypt);

// returns the data of a specifc state in egypt as an array
$alexandria = Country::states($egypt, 'ALX');
```

You can also access each country states data by calling the `get()` method form `State` object:

```php
use Melsaka\WorldCountries\State;

$states = new State($egypt); 
// or 
$states = new State('EG');

// returns a laravel collection of egyptian states. 
$egyptianStates = $states->get();

// returns the data of a specifc state in egypt as an array
$alexandria = $states->get('ALX');
```

State Data Example:

```php
array:10 [▼
  "id" => 3235
  "name" => "Alexandria"
  "name_ar" => "Alexandria"
  "country_id" => 65
  "country_code" => "EG"
  "country_name" => "Egypt"
  "state_code" => "ALX"
  "type" => null
  "latitude" => "30.87605680"
  "longitude" => "29.74260400"
]
```

### Cities

To get the country cities data:

```php
// returns a laravel collection of egyptian cities. 
$egyptianCities = Country::cities($egypt);

// returns a laravel collection of egyptian cities that belongs to specifc state in egypt
$alexandriaCities = Country::cities($egypt, 'ALX');
// or
$alexandriaCities = Country::cities($egypt, $alexandria);
```

You can also access each country cities data by calling the `get()` method from `City` object:

```php
use Melsaka\WorldCountries\City;

$cities = new City($egypt); 
// or 
$cities = new City('EG');

// returns a laravel collection of egyptian cities. 
$egyptianCities = $cities->get();

// returns a laravel collection of egyptian cities that belongs to specifc state in egypt
$alexandriaCities = $cities->get('ALX');
```

City Data Example:

```php
array:9 [▼
  "id" => 1140594
  "name" => "Abees"
  "name_ar" => "Abees"
  "state_id" => 3235
  "state_code" => "ALX"
  "state_name" => "Alexandria"
  "country_id" => 65
  "country_code" => "EG"
  "country_name" => "Egypt"
]
```

## License

This package is released under the MIT license (MIT).
