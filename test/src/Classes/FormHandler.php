<?php

require_once '../../../vendor/autoload.php';

use PHPUnit\Framework\Testcase;

class FormHandlerTest extends Testcase
{
    public function testAssignFormValue ()
    {
        $expected = 3;
        $formHandler = new \TopDog\Classes\FormHandler();
        $case = $formHandler->getFormValue();
        $this->assertEquals($expected, $case);
    }
}