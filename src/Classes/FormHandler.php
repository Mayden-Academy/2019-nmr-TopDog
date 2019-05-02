<?php

namespace TopDog\Classes;

class FormHandler
{
    private $formValue;

    public function assignSelectValue() {
        $this->formValue = $_POST['Breeds'];
    }

    public function getSelectIdValue(){
        return $this->formValue;
    }
}