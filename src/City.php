<?php

namespace Melsaka\WorldCountries;

class City
{
	public $data;

	public function __construct($country_code) 
	{
		$this->data = $this->getData($country_code);
	}

	public function get($state_code = null) 
	{
		return $state_code ? $this->select($state_code) : $this->data;
	}

	private function select($state_code)
	{
		$state_code = strtoupper($state_code);

		return $this->data->where('state_code', $state_code);
	}

	private function getData($country_code)
	{
		$path = $this->getFilePath($country_code);

	    $jsonData = $this->getFileContent($path);

	    $citiesList = json_decode($jsonData, true);

	    return collect($citiesList);
	}

	private function getFileContent($path) 
	{
		return $path ? file_get_contents($path) : collect([]);
	}
	    
	private static function getFilePath($country_code) 
	{
		$country_code = substr(strtoupper($country_code), 0, 2);

		$path = __DIR__ . "/data/cities/{$country_code}.json";

    	return file_exists($path) ? $path : null;
	}
}