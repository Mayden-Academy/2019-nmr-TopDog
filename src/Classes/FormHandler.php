<?php

namespace TopDog\Classes;

class FormHandler
{
    private $formValue;

    public function assignFormValue() {
        $this->formValue = $_POST['Breeds'];
    }

    public function getFormValue(){
        return $this->formValue;
    }
}