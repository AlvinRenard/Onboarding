<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinanceApproval extends Model
{
    //
    protected $table = 'financeapprovaldb';
    public $timestamps = false;
    public function Financeappr()
    {
    	return $this->belongsTo('App\Models\Employee','id');
    }
}