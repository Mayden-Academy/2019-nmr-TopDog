<?php

	namespace TopDog\scraper\Classes;

	class APIGrabber
	{
		protected $ch;

		/**
		 * APIGrabber constructor.
		 *
		 * This constructor accepts a curl object and initialises
		 * an object that interacts with an API
		 *
		 * @param $curl
		 */
		public Function __construct($curl){
			$this->ch = $curl->getCurlHandle();
		}

		/**
		 * Fetches data from API
		 * @param $url which represents the API
		 * @return String of data from the API
		 */
		public function getData($url) : String{
			curl_setopt($this->ch, CURLOPT_URL, $url);
			$output = curl_exec($this->ch);
			curl_close($this->ch);
			return $output;
		}

		/**
		 * Converts String of data into an Array
		 * @param $data a string which represents the data from the API
		 * @return Array of results
		 */
		public function jsonData($data) : Array{
			return json_decode($data, true);
		}
	}