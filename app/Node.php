<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Node extends Eloquent{

    protected $collection = 'nodes';
    
    public function farm(){
        return $this->belongsTo('Farm');
    }
}
