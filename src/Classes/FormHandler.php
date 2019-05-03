<?php

namespace TopDog\Classes;

class FormHandler
{
    private $formValue;
    private $selectIdData;
    private $formFav;
    private $favId;

    /**
     *  FormHandler constructor.
     *
     * @param int $postData post value from index.php
     *
     */
    public function __construct($postData)
    {
        $this->selectIdData = $postData;
        $this->favId = $postData;
    }

    /**
     * Gets the value of the select option from the html form and assigns to formValue property
     */
    public function assignSelectValue() {
        $this->formValue = $this->selectIdData['Breeds'];
    }

    /**
     * Gets the value of the FormHandler property
     *
     * @return int which represents the value of the html dropdown
     */
    public function getSelectIdValue(){
        return $this->formValue;
    }

    /**
     * Gets the value of the favourite dog selected from the html form and assigns to favIdValue property
     */
    public function assignFavId() {
        $this->formFav = $this->favId['fav_id'];
    }

    /**
     * Gets the value of the favIdValue property
     *
     * @return int which represents the value of the html dropdown
     */
    public function getFavId(){
        return $this->formFav;
    }
}