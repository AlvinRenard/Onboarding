<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Mail\EmployeeEmail;
use Illuminate\Support\Facades\Mail;
 
class EmailController extends Controller
{
	public function index($id){

		Mail::to("fooslammers@gmail.com")->send(new EmployeeEmail($id));
 
		return "Email telah dikirim";
 
	}
 
}