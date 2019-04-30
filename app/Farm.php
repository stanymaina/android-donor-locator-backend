<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Farm extends Eloquent{
    protected $collection = 'farms';

    public function nodes(){
        return $this->hasMany('Node');
    }
}
