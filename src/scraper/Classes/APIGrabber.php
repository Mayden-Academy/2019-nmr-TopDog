<?php
	/**
	 * Created by PhpStorm.
	 * User: academy
	 * Date: 2019-04-30
	 * Time: 14:25
	 */

	namespace TopDog\scraper\Classes;

	class APIGrabber
	{
		protected $ch;

		public Function __construct($curl){
			$this->ch = $curl->getCurlHandle();
		}

		public function getData($url){
			curl_setopt($this->ch, CURLOPT_URL, $url);
			$output = curl_exec($this->ch);
			curl_close($this->ch);
			return $output;
		}

		public function jsonData($data){
			return json_decode($data);
		}
	}


