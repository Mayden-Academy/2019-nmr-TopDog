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
     * Sets $selectId to the return of the getSelectIdValue method
     */
    public function formGetId () {
        $this->formHandler->assignSelectValue();
		$this->selectId = $this->formHandler->getSelectIdValue();
	}


    /**
     * Sets $dogDisplayer to the return of the displayDogs method
     */
    public function displayDogs(){
		return $this->dogDisplayer->displayDogs($this->dogs);
	}
}