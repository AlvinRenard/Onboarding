<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\FinalApproval;
use App\Models\Remuneration;
use App\Models\od;
use App\Mail\FinApproval1;
use App\Mail\FinApproval2;
use App\Mail\FinApproval3;
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
		$kode = Employee::where('id', $id)->first();
        $kode->status = 'Email Sent to Remuneration';
        $kode->push();
		return redirect()->to('/home');
 
	}
	public function empemail($id,$token){
		$data['employee']= Employee::with('progress')->find($id);
		$token = $data['employee']->token;
		Mail::to($data['employee']->email)->send(new UserEmail($id,$token));
 
		return redirect()->to('/home');
 
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
		$kode = Remuneration::where('EmployeeId', $id)->first();
        $kode->odprogress = "2";
		$kode->status = "Email Sent, wait to be reviewed";
        $kode->push();
		$token = $data['employee']->token;
		Mail::to("fooslammers@gmail.com")->send(new TeamOdEmail($id,$token));
 
		return redirect()->to('/ticket');
 
	}
	public function finapproval1($id,$token){
		$data['employee']= Employee::with('progress')->find($id);
        $empid = $data['employee']->id;
        // $fin=  new FinalApproval();
		// $fin->EmployeeId = $data['employee']->id;
		// $fin->grade=$data['employee']->grade;
		// $fin->status='-';
        // $fin->save();
		$id = $data['employee']->id;
		$token = $data['employee']->token;
		Mail::to("fooslammers@gmail.com")->send(new FinApproval1($id,$token));
 
		return redirect()->to('/ticket');
 
	}
	public function finapproval2($id,$token){
		$data['employee']= Employee::with('progress')->find($id);
        $empid = $data['employee']->id;
        $fin=  new FinalApproval();
		$fin->EmployeeId = $data['employee']->id;
		$fin->grade=$data['employee']->grade;
		$fin->status='-';
        $fin->save();
		$id = $data['employee']->id;
		$token = $data['employee']->token;
		Mail::to("fooslammers@gmail.com")->send(new FinApproval2($id,$token));
 
		return redirect()->to('/ticket');
 
	}
	public function finapproval3($id,$token){
		$data['employee']= Employee::with('progress')->find($id);
        $empid = $data['employee']->id;
        $fin=  new FinalApproval();
		$fin->EmployeeId = $data['employee']->id;
		$fin->grade=$data['employee']->grade;
		$fin->status='-';
        $fin->save();
		$id = $data['employee']->id;
		$token = $data['employee']->token;
		Mail::to("fooslammers@gmail.com")->send(new FinApproval3($id,$token));
 
		return redirect()->to('/ticket');
 
	}
}