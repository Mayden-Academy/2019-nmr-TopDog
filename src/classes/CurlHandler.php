<?php

class CurlHandler {

    private $ch;

    /**
     * CurlHandler constructor.
     *
     * this construct method initialises the curl
     *
     * returns a string
     */
    public function __construct()
    {
        $this->ch = curl_init();
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
    }

    /**
     * gets the curl handle
     *
     * @return false|resource the private $ch
     */
    public function getCurlHandle()
    {
        return $this->ch;
    }
}