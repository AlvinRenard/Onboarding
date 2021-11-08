<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinalApproval extends Model
{
    //
    protected $table = 'finalapproval';
    public $timestamps = false;
    public function Finapproval()
    {
    	return $this->belongsTo('App\Models\Employee','id');
    }
}