<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\FinalApproval;
use App\Models\Remuneration;
use App\Models\od;
use App\Mail\FinanceAppr;
use App\Mail\FinApproval1;
use App\Mail\FinApproval2;
use App\Mail\FinApproval3;
use App\Mail\EmployeeEmail;
use App\Mail\UserEmail;
use App\Mail\UserContractEmail;
use App\Mail\TeamOdEmail;
use App\Models\Rejected;
use Illuminate\Support\Facades\Mail;
use PDF;
 
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
		Rejected::where('EmployeeId', $id)->delete();
		return redirect()->to('/home');
 
	}
	public function empcontractemail($id,$token,Request $request){
		$data['employee']= Employee::with('files')->find($id);
		$date =  $data['employee']->date;
		$token = $data['employee']->token;
		$pdf = PDF::loadview('cetakidcard',['data'=>$data]);
        $fileloc = 'document/'.'contract-'.time().'.pdf';
        $employee = Employee::find($id);
        $fileupload = $employee->files()->update([
         'idcard' => $fileloc,
        ]);
        $employee->push();
        $pdf->save($fileloc);
		Mail::to($data['employee']->email)->send(new UserContractEmail($id,$token,$date));
 
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
		$kode->status = "Email Sent to OD, wait to be reviewed";
        $kode->push();
		$progress = Employee::find($id);
        $progress->progress->progress = '4';
        $progress->push();
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
		$kode = Remuneration::where('EmployeeId', $id)->first();
		$kode->status = 'Email Sent to Respective Manager';
        $kode->push();
		Mail::to("fooslammers@gmail.com")->send(new FinApproval1($id,$token));
 
		return redirect()->to('/ticket');
 
	}
	public function finapproval2($id,$token){
		$data['employee']= Employee::with('progress')->find($id);
        $empid = $data['employee']->id;
		$id = $data['employee']->id;
		$token = $data['employee']->token;
		Mail::to("fooslammers@gmail.com")->send(new FinApproval2($id,$token));
		$kode = Remuneration::where('EmployeeId', $id)->first();
		$kode->status = 'Email Sent to Respective Manager';
        $kode->push();
		return redirect()->to('/ticket');
 
	}
	public function finapproval3($id,$token){
		$data['employee']= Employee::with('progress')->find($id);
        $empid = $data['employee']->id;
		$id = $data['employee']->id;
		$token = $data['employee']->token;
		Mail::to("fooslammers@gmail.com")->send(new FinApproval3($id,$token));
		$kode = Remuneration::where('EmployeeId', $id)->first();
		$kode->status = 'Email Sent to Respective Manager';
	$kode->push();
		return redirect()->to('/ticket');
 
	}
	public function financeapproval($id,$token){
		$data['employee']= Employee::with('progress')->find($id);
        $empid = $data['employee']->id;
		$id = $data['employee']->id;
		$token = $data['employee']->token;
		Mail::to("fooslammers@gmail.com")->send(new FinanceAppr($id,$token));
		$kode = Remuneration::where('EmployeeId', $id)->first();
		$kode->status = 'Email Sent to Payroll Team';
        $kode->push();
		return redirect()->to('/ticket');
 
	}
}