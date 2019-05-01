<?php
	/**
	 * Created by PhpStorm.
	 * User: academy
	 * Date: 2019-05-01
	 * Time: 11:55
	 */

	namespace TopDog\Classes;


	class Dog
	{
		private $id;
		Private $url;

		/**
		 * This method gets the id of a dog
		 *
		 * @return int which represents a private id
		 */
		public function getId() : int {
			return $this->id;
		}

		/**
		 * This method gets the url of a dog image
		 *
		 * @return string which represents a private url
		 */
		public function getUrl(): string {
			return $this->url;
		}

		/**
		 * * This method gets all the information relating to a dog
		 *
		 * @return array containing all the information relating to a dog
		 */
		public function getInfo() : array {
			return ['id'=> $this->id, 'url'=> $this->url];
		}
	}