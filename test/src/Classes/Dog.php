<?php
	/**
	 * Created by PhpStorm.
	 * User: academy
	 * Date: 2019-05-01
	 * Time: 13:29
	 */

    require_once '../../../vendor/autoload.php';

	use PHPUnit\Framework\Testcase;

	class DogTest extends Testcase
	{
		public function testGetId ()
		{
			$dog = new \TopDog\Classes\Dog(1,2, 'www.lovehoney.co.uk');
			$result = $dog->getID();
			$this->assertEquals($result, 1);
		}

		public function testGetBreedId ()
		{
			$dog = new \TopDog\Classes\Dog(1,2, 'www.lovehoney.co.uk');
			$result = $dog->getBreedId();
			$this->assertEquals($result, 2);
		}

		public function testGetUrl ()
		{
			$dog = new \TopDog\Classes\Dog(1,2, 'www.lovehoney.co.uk');
			$result = $dog->getUrl();
			$this->assertEquals($result, 'www.lovehoney.co.uk');
		}

		public function testGetInfo ()
		{
			$dog = new \TopDog\Classes\Dog(1,2, 'www.lovehoney.co.uk');
			$result = $dog->getInfo();
			$this->assertEquals($result, ['id'=> 1,'breedId'=>2, 'url'=> 'www.lovehoney.co.uk']);
		}
	}