<?php
 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Progress extends Model
{
    protected $table = "progress";
    public $timestamps = false;
 
    public function employees()
    {
    	return $this->belongsTo('App\Models\Employee','id');
    }
    
}