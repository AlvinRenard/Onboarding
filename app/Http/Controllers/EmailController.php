<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Mail\EmployeeEmail;
use App\Mail\UserEmail;
use Illuminate\Support\Facades\Mail;
 
class EmailController extends Controller
{
	public function index($id){

		Mail::to("fooslammers@gmail.com")->send(new EmployeeEmail($id));
 
		return "Email telah dikirim";
 
	}
	public function empemail($id,$token){
		$data['employee']= Employee::with('progress')->find($id);
		$token = $data['employee']->token;
		Mail::to($data['employee']->email)->send(new UserEmail($id,$token));
 
		return "Email telah dikirim";
 
	}
 
}