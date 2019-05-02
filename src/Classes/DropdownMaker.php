<?php
namespace TopDog\Classes;

class DropdownMaker
{
    public function populateDropdown (array $breeds) : string
    {
        $dropDownList = '';
        if ($breeds == [[]] || $breeds == []) {
            $dropDownList .= "<option>No Doggies</option>";
        } else
            if (count($breeds, true) > 0) {
                foreach ($breeds as $breed) {
                    if ($breed['sub_breed'] === '') {
                        $dropDownList .= "<option value=" . $breed['id'] . ">" . $breed['breed_name'] . "</option>";
                    } else {
                        $dropDownList .= "<option value=" . $breed['id'] . ">" . $breed['sub_breed'] . "-" . $breed['breed_name'] . "</option>";
                    }
                }
            }
        return $dropDownList;
    }
}