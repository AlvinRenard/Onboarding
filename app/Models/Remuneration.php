<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Remuneration extends Model
{
    //
    protected $table = 'remuneration';
    public function rem()
    {
    	return $this->belongsTo('App\Models\Employee','id');
    }
}