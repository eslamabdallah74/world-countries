<?php

namespace Melsaka\WorldCountries;

class Country
{
	public $data;

	public function __construct() 
	{
		$this->data = $this->getData();
	}

	public function get($country_code = null)
	{
		return $country_code ? $this->select($country_code) : $this->data;
	}

	public static function states($country, $state_code = null)
	{
		$country_code = is_array($country) ? $country['iso2'] : $country;

		$states = new State($country_code);

		return $state_code ? $states->get($state_code) : $states->get();
	}

	public static function cities($country, $state = null)
	{
		$country_code = is_array($country) ? $country['iso2'] : $country;
		
		$state_code = is_array($state) ? $state['state_code'] : $state;

		$cities = new City($country_code);

		return $state_code ? $cities->get($state_code) : $cities->get();
	}

	private function select($country_code)
	{
		$country_code = substr(strtoupper($country_code), 0, 2);

		return $this->data->where('iso2', $country_code)->first();
	}

	private function getData()
	{
		$path = $this->getFilePath();

	    $jsonData = file_get_contents($path);

	    $countriesList = json_decode($jsonData, true);

	    return collect($countriesList);
	}

	private function getFilePath() 
	{
    	return __DIR__ . '/data/countries.json';
	}
}