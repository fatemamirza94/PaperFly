<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\District;
class Thana extends Model
{
     protected $appends = ['district_name'];
    protected $fillable = ['code','name','district_id'];

    public function district()
    {
    	return $this->belongsTo(District::class);
    }
    public function getDistrictNameAttribute(){
         return $this->district->name;
    }

}
