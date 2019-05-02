<?php
require_once '../../../vendor/autoload.php';

use PHPUnit\Framework\Testcase;

class DogDisplayerTest extends Testcase
{
    public function testGetId()
    {
        $dog = $this->createMock(TopDog\Classes\Dog::class); //blank pretend object
        $dog->method('getUrl')
            ->willReturn('www.dog.com');
        $inputDogs = [$dog];
        $dogDisplayer = new \TopDog\Classes\DogDisplayer();
        $result = $dogDisplayer->displayDogs($inputDogs);
        $stringResult = '<div class="dog-holder"><div class="dog-image"><img src="www.dog.com" alt="doggy"></div></div>';
        $this->assertEquals($result, $stringResult);
    }

    public function testFailure()
    {
        $dog = $this->createMock(TopDog\Classes\Dog::class); //blank pretend object
        $dog->method('getUrl')
            ->willReturn('');
        $inputDogs = [$dog];
        $dogDisplayer = new \TopDog\Classes\DogDisplayer();
        $result = $dogDisplayer->displayDogs($inputDogs);
        $stringResult = '<div class="dog-holder"><div class="dog-image"><img src="" alt="doggy"></div></div>';
        $this->assertEquals($result, $stringResult);
    }

    public function testMalformed()
    {
        $dogDisplayer = new \TopDog\Classes\DogDisplayer();
        $this->expectException(TypeError::class);
        $dogDisplayer->displayDogs(7);
    }
}