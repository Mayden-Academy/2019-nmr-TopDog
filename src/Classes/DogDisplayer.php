<?php
namespace TopDog\Classes;

class DogDisplayer
{
    public function displayDogs(array $dogs) {
        $favDiv = '';
        $dogDiv = '';

        foreach ($dogs as $dog) {
            $img = '<img src="' . $dog->getUrl() . '" alt="doggy">';
            $dogId = '<input type="hidden" id="favDogId" name="favDogId" value="' . $dog->getId() . '">';
            if ($dog->getIsFav()) {
                $favDiv = '<div class="best-dog"><div class="dog-image">' . $img . '</div><h3>The Best Doggo!</h3></div>';
            }
            else $dogDiv .= '<div class="dog-holder"><form action="post"><div class="dog-image">' . $img . '</div>' . $dogId . '<input type="submit" value="Make favourite!"></form></div>';
        }
        return ['faveDog'=>$favDiv, 'dogs'=>$dogDiv];
    }
}