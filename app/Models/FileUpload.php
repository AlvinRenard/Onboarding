<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    protected $table = "file_uploads";
 
    protected $fillable = ['EmployeeId','type','file_fpk','file_cv','file_photo','file_ijazah','contract','idcard'];
    
    public function files()
    {
    	return $this->belongsTo('App\Models\Employee','id');
    }
}
