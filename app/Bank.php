<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bankbranch;

class Bank extends Model
{
    protected $fillable = ['name']; 

    public function branches()
    {
    	return $this->hasMany(Bankbranch::class);
    }
}
