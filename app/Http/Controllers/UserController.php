<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\Progress;
use App\Models\od;
use App\Models\Fileupload;
use App\Models\FinalApproval;
use App\Models\FinanceApproval;
use App\Models\DownloadFile;
use App\Models\Rejected;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\Handler;
use App\Models\Remuneration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use PDF;
use Auth;
class UserController extends Controller
{
    //
    public function index(){
            $user = $employees = DB::table('users')->get();
            $progress= Employee::with('progress')->get();
            $user2 = Employee::with('remuneration')->with('rejected')->with('files')
                        ->orderBy('id', 'DESC')
                        ->paginate(9);
            $employees = DB::table('employees')->get();
            $rem = Remuneration::where('status','=','Accepted By Remuneration')->count();
            $ongoing = DB::table('employees')->where('status','!=','Accepted By Respective Manager')->get()->count();
            $rejected = DB::table('rejected')->count();
            $pegawai = DB::table('employees')->paginate(10);
            return view('homepage')->with('rejected',$rejected)->with('ongoing',$ongoing)->with('rem',$rem)->with('employees', $employees)->with('pegawai', $pegawai)->with('progress',$progress)->with('user',$user)->with('user2',$user2);
    }
    public function loginindex(){
        if(Session::has('login')){
            return redirect('home')->with('jsAlert','Sudah Login');
        }
        else{
            return view('login');
        }
    }
    public function login(){
        return view('login');
    }
    public function dataexist(){
        return view('dataexist');
    }
    public function datetime($id,$token=null){
        $data['employee']= Employee::with('remuneration')->find($id);
        if ($data['employee']->token!=$token) {
            $data['message'] = "Token not match";
            $data['employee'] = null;
        }
        return view('datetime')->with('data', $data);
    }
    public function nokodeposisi(){
        return view('nokodeposisi');
    }
    public function userlanding($id,$token=null){
        $data['employee']= Employee::with('progress')->find($id);
        return view('Employeelanding')->with('data', $data);
    }
    public function remuneration($id){
        $data['employee']= Employee::where('id', $id)->with('files')->with('userinformation')->find($id);
        $kode = Employee::where('id', $id)->first();
        $kode->status = 'Email Already Read by Remuneration';
        $kode->push();
        return view('Remuneration')->with('data', $data);
    }

    public function loginPost(Request $request){
        $credentials = $request->validate([
            'email'=>['required','email'],
            'password'=>['required'],
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            Session::put('name', $request->email);
            return redirect()->intended('/home');
        }
            return redirect('login')->with('alert','Password atau Email, Salah!');
    }

    public function logout(){
        Session::flush();
        return redirect('login')->with('alert','Kamu sudah logout');
    }
    public function register(Request $request){
        return view('register');
    }
    public function filenotcomplete($id,$token=null){
        $data['employee']= Employee::with('userinformation')->find($id);
        return view('filenotcomplete')->with('data',$data);
    }
    public function registerPost(Request $request){
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|min:4|email|unique:users',
            'password' => 'required',
            'confirmation' => 'required|same:password',
            'status'=>'required',
        ]);

        $data =  new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->status= $request->status;
        $data->save();
        return redirect('login')->with('alert-success','Kamu berhasil Register');
    }
    public function show($id,$token=null){
        $progress= Employee::with('files')->get();
        $empprogress = '';
        $data['employee']= Employee::with('progress')->find($id);
        if ($data['employee']->token!=$token) {
            $data['message'] = "Token not match";
        $data['employee'] = null;
        }
        $file['type'] = FileUpload::where('EmployeeId', $id)->first();
        return view('user')->with('data', $data)->with('progress',$progress)->with('file',$file)->with('empprogress',$empprogress);
    }
    public function contractemail($id,$token=null){
        $data['employee']= Employee::with('remuneration')->find($id);
        if ($data['employee']->remuneration->token!=$token) {
            $data['message'] = "Token not match";
            $data['employee'] = null;
        }
        $filename =DownloadFile::where('EmployeeId', $id)->first();
        $download = public_path()."/".$filename->contract;
            return response()->file($download);
    }
    public function ticket(){
            $user = $employees = DB::table('users')->get()->sortBy('nama');
            $progress= Employee::with('progress')->get();
            $empdata = Employee::with('remuneration')->with('progress')->orderBy('id', 'DESC')->paginate(9);
            $employees = DB::table('employees')->get();
            $rem = Remuneration::where('status','=','Accepted By Remuneration')->count();
            $finprocess = Remuneration::where('status','=','All Files Complete. Ready to be reviewed')->count();
            $rejected = Remuneration::where('status','=','Rejected')->count();
            $pegawai = DB::table('employees')->paginate(10);
            $ongoing = DB::table('remuneration')->where('status','!=','Accepted By Respective Manager')->get()->count();
            return view('ticket')->with('ongoing',$ongoing)->with('rejected',$rejected)->with('finprocess',$finprocess)->with('rem',$rem)->with('employees', $employees)->with('pegawai', $pegawai)->with('progress',$progress)->with('empdata',$empdata);
    }
    public function accept($id){
        $data['employee']= Employee::with('progress')->find($id);
        $empid = $data['employee']->id;

        // $dataexist = od::where('Employeeid',$empid)->get()->pluck('id');
        // // return $dataexist;
        // $rem =  new od();
        // $rem->EmployeeId = $data['employee']->id;
		// $rem->kodeposisi = '-';
        // $rem->save();
        // $kodeOd = od::where('EmployeeId', $id)->first();
        // return $kode->kodeposisi;
        // if ( $kodeOd->kodeposisi == '-'){
        //     od::destroy($dataexist);
        //     return redirect('/nokodeposisi')->with('alert', 'Data Already Exist!');
        // }
        // return $kodeposisi;
       

        // return $empid;
        $dataexist2 = Remuneration::where('Employeeid',$empid)->get()->pluck('id');
        // $dataexist2 = od::where('Employeeid',$empid)->whereNotNull('kode')->get()->pluck('kode');
 
        // return $dataexist;
        if (count($dataexist2) > 0){
            echo '<script>alert("Data Already Exist! Returning to homepage")</script>';
            return redirect('/dataexist')->with('alert', 'Data Already Exist!');
        }
        $rem =  new Remuneration();
        $rem->EmployeeId = $data['employee']->id;
        $rem->kode = '';
        $rem->status = "Waiting for Position Code";
        $rem->save();
        $kode = Employee::where('id', $id)->first();
        $kode->status = 'Accepted by Remuneration';
        $kode->progress->progress ='3';
        $kode->push();
        return view('completelanding');
    }
    public function acceptfinal($id){
        $dataexist2 = FinalApproval::where('Employeeid',$id)->get()->pluck('id');
        if (count($dataexist2) > 0){
            echo '<script>alert("Data Already Exist! Returning to homepage")</script>';
            return redirect('/dataexist')->with('alert', 'Data Already Exist!');
        }
        $data['employee']= Employee::with('progress')->find($id);
        $rem =  new FinalApproval();
        $rem->EmployeeId = $data['employee']->id;
        $rem->status = "Accepted by Respective Manager";
        $rem->save();
        $kode = Remuneration::where('EmployeeId', $id)->first();
        $kode->status = 'Accepted by Respective Manager';
        $kode->push();
        $home = Employee::where('id', $id)->first();
        $home->status = 'Accepted by Respective Manager';
        $home->progress->progress ='7';
        $home->push();
        $pdf = PDF::loadview('cetakpdf2',['data'=>$data]);
        $fileloc = 'document/'.'contract-'.time().'.pdf';
        $employee = Employee::find($id);
        $fileupload = $employee->files()->update([
         'contract' => $fileloc,
        ]);
        $employee->push();
        $pdf->save($fileloc);
        return view('completelanding');
    }
    public function acceptfinancefinal($id){
        $dataexist2 = FinanceApproval::where('Employeeid',$id)->get()->pluck('id');
        if (count($dataexist2) > 0){
            echo '<script>alert("Data Already Exist! Returning to homepage")</script>';
            return redirect('/dataexist')->with('alert', 'Data Already Exist!');
        }
        $data['employee']= Employee::with('progress')->find($id);
        $rem =  new FinanceApproval();
        $rem->EmployeeId = $data['employee']->id;
        $rem->status = "Accepted by Payroll Team";
        $rem->save();
        $kode = Remuneration::where('EmployeeId', $id)->first();
        $kode->status = 'Accepted by Payroll Team';
        $kode->push();
        $home = Employee::where('id', $id)->first();
        $home->status = 'Accepted by Payroll Team';
        $home->progress->progress ='6';
        $home->push();
      
        return view('completelanding');
    }
    public function reject($id, Request $request){
        $this->validate($request, [
            'reason' => 'required',

        ]);
        $dataexist = Rejected::where('EmployeeId',$id)->count();
        if ($dataexist > 0){
            Rejected::where('EmployeeId', $id)->delete();
        }
        $data['employee']= Employee::with('progress')->find($id);
        $progress = Employee::find($id);
        $progress->progress->progress = '0';
        $progress->token = Str::random(12);
        $progress->status = 'Rejected by Remuneration';
        $progress->push();
        $data =  new Rejected();
        $data->EmployeeId = $id;
        $data->reason = $request->reason;
        $data->save();
           
           return redirect('/home');
    }
    
    public function rejectlanding($id,$token=null,Request $request){
        $data['employee']= Employee::with('progress')->find($id);
        return view('rejectlanding')->with('data', $data);
    }
    public function rejectfinancelanding($id,$token=null,Request $request){
        $data['employee']= Employee::with('progress')->find($id);
        return view('rejectfinancelanding')->with('data', $data);
    }
    public function rejectfinallanding($id,$token=null,Request $request){
        $data['employee']= Employee::with('progress')->find($id);
        return view('rejectfinallanding')->with('data', $data);
    }

    public function rejectfinance($id,Request $request){
        $dataexist = Rejected::where('EmployeeId',$id)->count();
        if ($dataexist > 0){
            Rejected::where('EmployeeId', $id)->delete();
        }
        $data['employee']= Employee::with('progress')->find($id);
        $progress = Employee::find($id);
        $progress->progress->progress = '0';
        $progress->token = Str::random(12);
        $progress->status = 'Rejected By Payroll Team';
        $progress->push();
        $kode = Remuneration::where('EmployeeId', $id)->first();
        $kode->status = $request->reason;
        $kode->push();
        $data =  new Rejected();
        $data->EmployeeId = $id;
        $data->reason = $request->reason;
        $data->save();
        Remuneration::where('EmployeeId', $id)->delete();
           
           return redirect('/home');
    }
    public function rejectfinal($id,Request $request){
        $dataexist = Rejected::where('EmployeeId',$id)->count();
        if ($dataexist > 0){
            Rejected::where('EmployeeId', $id)->delete();
        }
        $data['employee']= Employee::with('progress')->find($id);
        $progress = Employee::find($id);
        $progress->progress->progress = '0';
        $progress->token = Str::random(12);
        $progress->status = 'Rejected By Respective Manager';
        $progress->push();
        $kode = Remuneration::where('EmployeeId', $id)->first();
        $kode->status = $request->reason;
        $kode->push();
        $data =  new Rejected();
        $data->EmployeeId = $id;
        $data->reason = $request->reason;
        $data->save();
        Remuneration::where('EmployeeId', $id)->delete();
        FinanceApproval::where('EmployeeId', $id)->delete();
           return redirect('/home');
    }
    public function reset($id,Request $request){
        $dataexist = Rejected::where('EmployeeId',$id)->count();
        if ($dataexist > 0){
            Rejected::where('EmployeeId', $id)->delete();
        }
        $data['employee']= Employee::with('progress')->find($id);
        $progress = Employee::find($id);
        $progress->progress->progress = '0';
        $progress->token = Str::random(12);
        $progress->status = 'Rejected By Payroll Team';
        $progress->push();
        $kode = Remuneration::where('EmployeeId', $id)->first();
        $kode->status = 'Employee files not Complete';
        $kode->push();
        $data =  new Rejected();
        $data->EmployeeId = $id;
        $data->reason = 'Employee files not Complete';
        $data->save();
        Remuneration::where('EmployeeId', $id)->delete();
        FinanceApproval::where('EmployeeId', $id)->delete();
           return redirect('/home');
    }
    public function kode(Request $request,$id){
        $kode = Remuneration::where('EmployeeId', $id)->first();
        // $kode->remuneration->kode = $request->kode;
        // $kode->kode = $request->kode;
        $kode->kode = $request->kode;
        $kode->status = 'Ready to be reviewed by Payroll Team';
        $kode->push();
        $progress = Employee::find($id);
        $progress->progress->progress = '5';
        $progress->push();
        return $kode;
        
    }
    public function showOd($id,$token=null){
        $progress= Employee::with('progress')->get();
        $data['employee']= Employee::with('progress')->find($id);
        if ($data['employee']->token!=$token) {
            $data['message'] = "Token not match";
            $data['employee'] = null;
        }
        $kode = Remuneration::where('EmployeeId', $id)->first();
		$kode->status = "Email Already Read by OD, Review on progress";
        $kode->push();
        return view('teamOd')->with('data', $data)->with('progress',$progress);
    }
    public function uploaddate($id,$token=null,Request $request){
        $progress = Employee::find($id);
        $progress->progress->progress = '8';
        $progress->push();
        $time = Employee::find($id);
        $time ->date = $request->time;
        $time ->push();
        return redirect('/home');
    }
    public function empdetails($id,$token=null){
        $progress= Employee::with('progress')->get();
        $data['employee']= Employee::with('progress')->find($id);
        if ($data['employee']->token!=$token) {
            $data['message'] = "Token not match";
            $data['employee'] = null;
        }

        return view('empdetails')->with('data', $data)->with('progress',$progress);
    }
    public function certif($id,$token=null)
    {
        $data['employee']= Employee::with('remuneration')->find($id);
        if ($data['employee']->token!=$token) {
            $data['message'] = "Token not match";
            $data['employee'] = null;
        }

        $pdf = PDF::loadview('cetakpdf2',['data'=>$data]);
    	return $pdf->stream('laporan-pegawai.pdf');
    }
    public function idcard($id,$token=null)
    {
        $data['employee']= Employee::with('files')->find($id);
        if ($data['employee']->token!=$token) {
            $data['message'] = "Token not match";
            $data['employee'] = null;
        }

        $pdf = PDF::loadview('cetakidcard',['data'=>$data]);
    	return $pdf->stream('laporan-pegawai.pdf');
    }
    public function certif2($id,$token=null)
    {
        $data['employee']= Employee::with('remuneration')->find($id);
        if ($data['employee']->token!=$token) {
            $data['message'] = "Token not match";
            $data['employee'] = null;
        }

        $pdf = PDF::loadview('cetakpdf',['data'=>$data]);
    	return $pdf->stream('laporan-pegawai.pdf');
    }
 
    // public function cetakpdf($id,$token=null)
    // {
    //     $data['employee']= Employee::with('remuneration')->find($id);
    //     if ($data['employee']->remuneration->token!=$token) {
    //         $data['message'] = "Token not match";
    //         $data['employee'] = null;
    //     }
 
    // 	$pdf = PDF::loadview('certifpdf',['data'=>$data]);
    // 	return $pdf->download('laporan-pegawai.pdf');
    // }
    public function finalapprovalview($id,$token=null){
        $data['employee']= Employee::with('progress')->find($id);
        if ($data['employee']->token!=$token) {
            $data['message'] = "Token not match";
            $data['employee'] = null;
            return redirect('/home');
        }else{
            $kode = Remuneration::where('EmployeeId', $id)->first();
            $kode->status = 'Email Already Read by Respective Manager';
            $kode->push();
        return view('finalapprview')->with('data', $data);}
    }
    public function docs($id,$token=null){
        $user = $employees = DB::table('users')->get();
        $progress= Employee::with('progress')->get();
        $user2 = Employee::with('progress')
                    ->orderBy('id', 'DESC')
                    ->paginate(9);
        $employees = DB::table('employees')->get();
        $rem = Remuneration::where('status','=','Accepted By Remuneration')->count();
        $finprocess = Remuneration::where('status','=','All Files Complete. Ready to be reviewed')->count();
        $rejected = Remuneration::where('status','=','Rejected')->count();
        $pegawai = DB::table('employees')->paginate(10);
        $data['employee']= Employee::with('files')->find($id);
        if ($data['employee']->token!=$token) {
            $data['message'] = "Token not match";
            $data['employee'] = null;
        }
        return view('docs')->with('data', $data)->with('rejected',$rejected)->with('finprocess',$finprocess)->with('rem',$rem)->with('employees', $employees)->with('pegawai', $pegawai)->with('progress',$progress)->with('user',$user)->with('user2',$user2);
    }
    public function financeapprovalroute($id){
        $data['employee']= Employee::with('progress')->find($id);
        $kode = Remuneration::where('EmployeeId', $id)->first();
        $kode->status = 'Email Already Read by Payroll Team';
        $kode->push();
        return view('financeapprfinal')->with('data', $data);
    }
}