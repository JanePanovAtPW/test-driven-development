<?php

namespace App;
use App\AbstractPerson;

class Doctor extends AbstractPerson{

    protected function getTitle()
    {
        return 'Dr.';
    }
}