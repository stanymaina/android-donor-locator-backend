<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Farmer extends Eloquent{
    
    protected $collection = 'farmers';

    public function farms(){
        return $this->hasMany('Farm');
    }
}
