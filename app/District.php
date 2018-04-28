<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Division;
use App\Thana;
class District extends Model
{
     protected $appends = ['division_name'];
    protected $fillable = ['code','name','division_id'];

    public function division()
    {
    	return $this->belongsTo(Division::class);
    }
    public function getDivisionNameAttribute(){
         return $this->division->name;
    }
     public function thana()
    {
    	return $this->hasMany(Thana::class);
    } 

}

?>