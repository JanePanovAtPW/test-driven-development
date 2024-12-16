<?php

namespace App;
use App\Item;

class ItemChild extends Item{
    public function getID(){
        return parent::getID();
    }
}