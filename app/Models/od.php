<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class od extends Model
{
    protected $table = "od";
    protected $fillable = ['kodeposisi'];
    public $timestamps = false;
 
    public function odemployee()
    {
    	return $this->belongsTo('App\Models\Employee','id');
    }
}
