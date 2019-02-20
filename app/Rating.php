<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
	use HasCompositeKey;
    protected $primaryKey = ['mid', 'uid'];
}
