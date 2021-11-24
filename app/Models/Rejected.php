<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rejected extends Model
{
    protected $table = "rejected";
    public $timestamps = false;
    public function rejected()
    {
    	return $this->belongsTo('App\Models\Employee','id');
    }
   
}
