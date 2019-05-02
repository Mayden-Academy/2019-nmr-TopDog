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


    /**
     * DogManager constructor.
     *
     * @param DbHandler $dbHandler Db Connection from Class DbHandler
     *
     * @param DropdownMaker $dropdownMaker
     *
     * @param FormHandler $formHandler
     *
     * @param DogDisplayer $dogDisplayer
     */
    public function __construct(DbHandler $dbHandler, DropdownMaker $dropdownMaker, FormHandler $formHandler, DogDisplayer $dogDisplayer)
	{
		$this->dbHandler = $dbHandler;
		$this->dropdownMaker = $dropdownMaker;
		$this->formHandler = $formHandler;
		$this->dogDisplayer = $dogDisplayer;

	}

    /**
     * Sets $dogs to getDogs method from DbHandler Class
     */
    public function getDogs() {
		$this->dogs = $this->dbHandler-$this->getDogs($this->selectId);
	}


    /**
     * Sets $breeds to getBreed method from DbHandler Class
     */
    public function getBreeds() {
		$this->breeds = $this->dbHandler->getBreed();
	}


    /**
     * Sets $dropdownMaker to populateDropdown from DropdownMaker Class
     */
    public function makeDropdown() {
		$this->dropdownMaker->populateDropdown($this->breeds);
	}


    /**
     * Sets $selectId to getSelectidValue method from FormHandler Class
     */
    public function formGetId () {
		$this->selectId = $this->formHandler->getSelectIdValue();
	}


    /**
     * Sets $dogDisplayer to displayDogs method from DogDisplayer Class
     */
    public function displayDogs(){
		$this->dogDisplayer->displayDogs($this->dogs);
	}
}