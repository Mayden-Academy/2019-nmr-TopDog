<?php

namespace TopDog\Classes;

class FormHandler
{
    private $formValue;

    /**
     * Gets the value of the select option from the html form and assigns to formValue property
     */
    public function assignSelectValue() {
        $this->formValue = $_POST['Breeds'];
    }

    /**
     * Gets the value of the FormHandler property
     *
     * @return int which represents the value of the html dropdown
     */
    public function getSelectIdValue(){
        return $this->formValue;
    }
}