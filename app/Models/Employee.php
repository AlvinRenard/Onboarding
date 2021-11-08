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
    	return $this->hasOne('App\Models\FileUpload',"EmployeeId");
    }
    public function remuneration()
    {
    	return $this->hasOne('App\Models\Remuneration',"EmployeeId");
    }
    public function odemployee()
    {
    	return $this->hasOne('App\Models\od',"EmployeeId");
    }
    public function finalapproval()
    {
    	return $this->hasOne('App\Models\FinalApproval',"EmployeeId");
    }
}
