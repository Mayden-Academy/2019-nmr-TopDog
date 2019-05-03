<?php
namespace TopDog\Classes;

class DogManager
{
	private $dbHandler;
	private $dropdownMaker;
	private $dogs;
	private $breeds;
	private $formHandler;
	private $selectId;
	private $dogDisplayer;
	private $faveId;

    /**
     * DogManager constructor.
     *
     * @param DbHandler $dbHandler Db Connection from Class DbHandler
     * @param DropdownMaker $dropdownMaker Class for creating dropdowns
     * @param FormHandler $formHandler Class for handling forms
     * @param DogDisplayer $dogDisplayer Class for displaying dog images
     */
    public function __construct(DbHandler $dbHandler, DropdownMaker $dropdownMaker, FormHandler $formHandler, DogDisplayer $dogDisplayer)
	{
		$this->dbHandler = $dbHandler;
		$this->dropdownMaker = $dropdownMaker;
		$this->formHandler = $formHandler;
		$this->dogDisplayer = $dogDisplayer;

	}

    /**
     * Sets $selectId to the return of the getSelectIdValue method
     */
    public function formGetId ($breed_id) {
        $this->formHandler->assignSelectValue($breed_id);
        $this->selectId = $this->formHandler->getSelectIdValue();
    }

    /**
     * Sets $dogs to the return of the getDogs method
     */
    public function populateDogs() {
		$this->dogs = $this->dbHandler->getDogs($this->selectId);
	}

    /**
     * Sets $breeds to the return of the getBreed method
     */
    public function getBreeds() {
		$this->breeds = $this->dbHandler->getBreed();

	}

    /**
     * Sets $dropdownMaker to the return of the populateDropdown method
     */
    public function makeDropdown() {
		return $this->dropdownMaker->populateDropdown($this->breeds);
	}



    /**
     * Sets $dogDisplayer to the return of the displayDogs method
     */
    public function displayDogs(){
		return $this->dogDisplayer->displayDogs($this->dogs);
	}

	public function getFaveId(){
        $this->faveId = $this->dbHandler->getFavouriteDog($this->selectId);
    }

    public function faveToDb($image_id, $breed_id){
        $this->dbHandler->setFav($image_id, $breed_id);
    }

    /**
     * Checks the dogs array of object for the dog with the same id as the favourite one taken from the database and set
     * the isFav variable to true to display it properly
     */
    public function setFavouriteDog() {
        foreach ($this->dogs as $dog) {
            if ($dog->getId() == $this->faveId['fav_dog']) {
                $dog->setIsFav();
            }
        }
    }
}