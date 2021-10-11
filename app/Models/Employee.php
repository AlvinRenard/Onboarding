<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "employees";
 
    public function progress()
    {
    	return $this->hasOne('App\Models\Progress',"EmployeeId");
    }
    public function files()
    {
    	return $this->hasMany('App\Models\FileUpload',"EmployeeId");
    }
}
