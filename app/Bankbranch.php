<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bank;

class Bankbranch extends Model
{
	protected $appends = ['bank_name'];
    protected $fillable = ['bank_id','location'];

    public function bank()
    {
    	return $this->belongsTo(Bank::class);
    }

    public function getBankNameAttribute()
    {
    	return $this->bank->name;
    }
}

