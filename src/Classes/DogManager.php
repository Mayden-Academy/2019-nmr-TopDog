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

	public function __construct(DbHandler $dbHandler, DropdownMaker $dropdownMaker, FormHandler $formHandler, DogDisplayer $dogDisplayer)
	{
		$this->dbHandler = $dbHandler;
		$this->dropdownMaker = $dropdownMaker;
		$this->formHandler = $formHandler;
		$this->dogDisplayer = $dogDisplayer;

	}

	public function getDogs() {
		$this->dogs = $this->dbHandler-$this->getDogs($this->selectId);
	}

	public function getBreeds() {
		$this->breeds = $this->dbHandler->getBreed();
	}

	public function makeDropdown() {
		$this->dropdownMaker->populateDropdown($this->breeds);
	}

	public function formGetId () {
		$this->selectId = $this->formHandler->getSelectIdValue();
	}

	public function displayDogs(){
		$this->dogDisplayer->displayDogs($this->dogs);
	}
}