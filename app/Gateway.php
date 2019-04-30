<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Gateway extends Eloquent{
	protected $collection = 'gateways';
}
