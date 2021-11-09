<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\Progress;
use App\Models\od;
use App\Models\Fileupload;
use App\Models\FinalApproval;
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
            $user2 = Employee::with('progress')
                        ->whereBetween('grade', [0,5])
                        ->orderBy('id', 'DESC')
                        ->paginate(9);
            $employees = DB::table('employees')->get();
            $rem = Remuneration::where('status','=','Accepted By Remuneration')->count();
            $finprocess = Remuneration::where('status','=','All Files Complete. Ready to be reviewed')->count();
            $rejected = Remuneration::where('status','=','Rejected')->count();
            $pegawai = DB::table('employees')->paginate(10);
            return view('homepage')->with('rejected',$rejected)->with('finprocess',$finprocess)->with('rem',$rem)->with('employees', $employees)->with('pegawai', $pegawai)->with('progress',$progress)->with('user',$user)->with('user2',$user2);
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
    public function nokodeposisi(){
        return view('nokodeposisi');
    }
    public function userlanding($id){
        $data['employee']= Employee::with('progress')->find($id);
        return view('Employeelanding')->with('data', $data);
    }
    public function remuneration($id){
        $data['employee']= Employee::with('progress')->find($id);
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
    

    public function registerPost(Request $request){
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|min:4|email|unique:users',
            'password' => 'required',
            'confirmation' => 'required|same:password',
            'grade' => 'required',
            'status'=>'required',
        ]);

        $data =  new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->grade = $request->grade;
        $data->status= $request->status;
        $data->save();
        return redirect('login')->with('alert-success','Kamu berhasil Register');
    }
    public function show($id,$token=null){
        $progress= Employee::with('progress')->get();
        $data['employee']= Employee::with('progress')->find($id);
        if ($data['employee']->token!=$token) {
            $data['message'] = "Token not match";
            $data['employee'] = null;
        }
        return view('user')->with('data', $data)->with('progress',$progress);
    }
    public function ticket(){
            $user = $employees = DB::table('users')->get()->sortBy('nama');
            $progress= Employee::with('progress')->get();
            $empdata = DB::table('remuneration')->orderBy('EmployeeId', 'DESC')->paginate(9);
            $employees = DB::table('employees')->get();
            $rem = Remuneration::where('status','=','Accepted By Remuneration')->count();
            $finprocess = Remuneration::where('status','=','All Files Complete. Ready to be reviewed')->count();
            $rejected = Remuneration::where('status','=','Rejected')->count();
            $pegawai = DB::table('employees')->paginate(10);
            return view('ticket')->with('rejected',$rejected)->with('finprocess',$finprocess)->with('rem',$rem)->with('employees', $employees)->with('pegawai', $pegawai)->with('progress',$progress)->with('empdata',$empdata);
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
        $rem->nama = $data['employee']->nama;
        $rem->kode = "Not Yet Filled";
        $rem->token = Str::random(12);
        $rem->posisi = $data['employee']->posisi;
        $rem->email = $data['employee']->email;
        $rem->grade = $data['employee']->grade;
        $rem->odprogress = "1";
        $rem->status = "Waiting for Position Code";
        $rem->save();
        $kode = Employee::where('id', $id)->first();
        $kode->status = 'Accepted by Remuneration';
        $kode->progress->progress ='6';
        $kode->push();
        return redirect('/home');
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
        $rem->grade = $data['employee']->grade;
        $rem->status = "Accepted by Respective Manager";
        $rem->save();
        $kode = Remuneration::where('EmployeeId', $id)->first();
        $kode->odprogress = "4";
        $kode->status = 'Accepted by Respective Manager';
        $kode->push();
        $home = Employee::where('id', $id)->first();
        $home->status = 'Accepted by Respective Manager';
        $home->progress->progress ='7';
        $home->push();
    }
    public function reject($id){
        $data['employee']= Employee::with('progress')->find($id);
        $progress = Employee::find($id);
        $progress->progress->progress = '0';
        $progress->token = Str::random(12);
        $progress->status = 'Rejected By Remuneration';
        $progress->push();
        Fileupload::where('EmployeeId', $id)->delete();
           
           return redirect('/home');
    }
    public function kode(Request $request,$id){
        $kode = Remuneration::where('EmployeeId', $id)->first();
        // $kode->remuneration->kode = $request->kode;
        // $kode->kode = $request->kode;
        $kode->kode = $request->kode;
        $kode->status = 'All Files Complete. Ready to be reviewed';
        $kode->odprogress = "3";
        $kode->push();
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
        if ($data['employee']->remuneration->token!=$token) {
            $data['message'] = "Token not match";
            $data['employee'] = null;
        }
        $pdf = PDF::loadview('certifpdf',['data'=>$data]);
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
    public function finalapprovalview($id){
        $data['employee']= Employee::with('progress')->find($id);
        return view('finalapprview')->with('data', $data);
    }
    public function docs($id,$token=null){
        $user = $employees = DB::table('users')->get();
        $progress= Employee::with('progress')->get();
        $user2 = Employee::with('progress')
                    ->whereBetween('grade', [0,5])
                    ->orderBy('id', 'DESC')
                    ->paginate(9);
        $employees = DB::table('employees')->get();
        $rem = Remuneration::where('status','=','Accepted By Remuneration')->count();
        $finprocess = Remuneration::where('status','=','All Files Complete. Ready to be reviewed')->count();
        $rejected = Remuneration::where('status','=','Rejected')->count();
        $pegawai = DB::table('employees')->paginate(10);
        $data['employee']= Employee::with('progress')->find($id);
        if ($data['employee']->token!=$token) {
            $data['message'] = "Token not match";
            $data['employee'] = null;
        }
        return view('docs')->with('data', $data)->with('rejected',$rejected)->with('finprocess',$finprocess)->with('rem',$rem)->with('employees', $employees)->with('pegawai', $pegawai)->with('progress',$progress)->with('user',$user)->with('user2',$user2);
    }
}