<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
 
use App\Mail\EmployeeEmail;
use Illuminate\Support\Facades\Mail;
 
class EmailController extends Controller
{
	public function index(){
 
		Mail::to("fooslammers@gmail.com")->send(new EmployeeEmail());
 
		return "Email telah dikirim";
 
	}
 
}