<?php

	namespace TopDog\Classes;


	class Dog
	{
		private $id;
		private $breedId;
		private $imgUrl;

		public function __construct(int $id, int $breedId, string $url)
		{
			$this->id = $id;
			$this->breedId = $breedId;
			$this->imgUrl = $url;
		}

		/**
		 * This method gets the id of a dog
		 *
		 * @return int which represents a private id
		 */
		public function getId() : int {
			return $this->id;
		}

		/**
		 * This method gets the id of a dog breed
		 *
		 * @return int which represents a private id
		 */
		public function getBreedId() : int {
			return $this->breedId;
		}

		/**
		 * This method gets the url of a dog image
		 *
		 * @return string which represents a private url
		 */
		public function getUrl(): string {
			return $this->imgUrl;
		}

		/**
		 * * This method gets all the information relating to a dog
		 *
		 * @return array containing all the information relating to a dog
		 */
		public function getInfo() : array {
			return ['id'=> $this->id,'breedId'=>$this->breedId, 'url'=> $this->imgUrl];
		}
	}