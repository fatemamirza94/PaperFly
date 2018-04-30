<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\District;
use App\Thana;
use App\Bank;
use App\Atm;
class Atm extends Model
{    
    protected $appends = ['district_name','thana_name','bank_name'];
     protected $fillable = ['district_id','thana_id','bank_id','address'];

     public function district()
    {
    	return $this->belongsTo(District::class);
    }
    public function getDistrictNameAttribute(){
         return $this->district->name;
    }

     public function thana()
    {
    	return $this->belongsTo(Thana::class);
    }
    public function getThanaNameAttribute(){
         return $this->thana->name;
    }

     public function bank()
    {
    	return $this->belongsTo(Bank::class);
    }
    public function getBankNameAttribute(){
         return $this->bank->name;
    }
}
