<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Userinformation extends Authenticatable
{
    //
    protected $table = 'userdetail';
    public $timestamps = false;
    public function userinformation()
    {
    	return $this->belongsTo('App\Models\Employee','id');
    }
}