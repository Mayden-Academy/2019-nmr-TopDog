<?php
namespace TopDog\Classes;


class DogDisplayer
{
    public function displayDogs(array $dogs) {
    $dogDiv = '';
        foreach ($dogs as $dog) {
            $img = '<img src="' . $dog->getUrl() . '" alt="doggy">';
            $dogDiv .= '<div class="dog-holder"><div class="dog-image">' . $img . '</div></div>';
        }
        return $dogDiv;
    }
}