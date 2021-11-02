<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Remuneration;
use App\Models\od;
use App\Mail\EmployeeEmail;
use App\Mail\UserEmail;
use App\Mail\TeamOdEmail;
use Illuminate\Support\Facades\Mail;
 
class EmailController extends Controller
{
	public function index($id,$token){
		$data['employee']= Employee::with('progress')->find($id);
		$token = $data['employee']->token;
		Mail::to("fooslammers@gmail.com")->send(new EmployeeEmail($id,$token));

		return redirect()->to('/home');
 
	}
	public function empemail($id,$token){
		$data['employee']= Employee::with('progress')->find($id);
		$token = $data['employee']->token;
		Mail::to($data['employee']->email)->send(new UserEmail($id,$token));
 
		return "Email telah dikirim";
 
	}
	public function odemail($id,$token){
		$data['employee']= Employee::with('progress')->find($id);
        $empid = $data['employee']->id;
        // return $empid;
        $dataexist = od::where('Employeeid',$empid)->get()->pluck('id');
        // return $dataexist;
        if (count($dataexist) > 0){
			od::destroy($dataexist);
        }
        $rem =  new od();
        $rem->EmployeeId = $data['employee']->id;
		$rem->kodeposisi = '-';
        $rem->save();
		$token = $data['employee']->token;
		Mail::to("fooslammers@gmail.com")->send(new TeamOdEmail($id,$token));
 
		return "Email telah dikirim";
 
	}
 
}