<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\Progress;
use App\Models\od;
use App\Models\Fileupload;
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
class UserController extends Controller
{
    //
    public function index(){
        if(!Session::get('login')){
            return redirect('login')->with('alert','LOGIN DULU');
        }
        else{
            $user = $employees = DB::table('users')->get();
            $progress= Employee::with('progress')->get();
            $user1 = Employee::with('progress')
                        ->whereBetween('grade', [0,1])
                        ->orderBy('id', 'DESC')
                        ->paginate(9);
            $user2 = Employee::with('progress')
                        ->whereBetween('grade', [0,3])
                        ->orderBy('id', 'DESC')
                        ->paginate(9);
            $employees = DB::table('employees')->get();
            $pegawai = DB::table('employees')->paginate(10);
            return view('homepage')->with('employees', $employees)->with('pegawai', $pegawai)->with('progress',$progress)->with('user',$user)->with('user1',$user1)->with('user2',$user2);
        }
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
        return view('Remuneration')->with('data', $data);
    }

    public function loginPost(Request $request){
        $email = $request->email;
        $password = $request->password;

        $data = User::where('email',$email)->first();
        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('name',$data->name);
                Session::put('email',$data->email);
                Session::put('grade',$data->grade);
                Session::put('login',TRUE);
                return redirect('home');
            }
            else{
                return redirect('login')->with('alert','Password atau Email, Salah !');
            }
        }
        else{
            return redirect('login')->with('alert','Password atau Email, Salah!');
        }
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
        ]);

        $data =  new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->grade = $request->grade;
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
        if(!Session::get('login')){
            return redirect('login')->with('alert','LOGIN DULU');
        }
        else{
            $user = $employees = DB::table('users')->get()->sortBy('nama');;
            $progress= Employee::with('progress')->get();
            $empdata = Employee::with('remuneration')->get();
            $employees = DB::table('employees')->get();
            $pegawai = DB::table('employees')->paginate(10);
            return view('ticket')->with('employees', $employees)->with('pegawai', $pegawai)->with('progress',$progress)->with('empdata',$empdata);
        }
    }
    public function accept($id){
        $data['employee']= Employee::with('progress')->find($id);
        $empid = $data['employee']->id;

        // $kodeposisi = od::select('kodeposisi')->where('EmployeeId', $data['employee']->id)->get()->pluck('kodeposisi');
        $dataexist = od::where('Employeeid',$empid)->get()->pluck('id');
        // return $dataexist;
        $rem =  new od();
        $rem->EmployeeId = $data['employee']->id;
		$rem->kodeposisi = '-';
        $rem->save();
        $kodeOd = od::where('EmployeeId', $id)->first();
        // return $kode->kodeposisi;
        if ( $kodeOd->kodeposisi == '-'){
            od::destroy($dataexist);
            return redirect('/nokodeposisi')->with('alert', 'Data Already Exist!');
        }
        // return $kodeposisi;
       

        // return $empid;
        $dataexist2 = Remuneration::where('Employeeid',$empid)->get()->pluck('id');
        // $dataexist2 = od::where('Employeeid',$empid)->whereNotNull('kode')->get()->pluck('kode');
        // return $dataexist;
        if (count($dataexist2) > 2){
            echo '<script>alert("Data Already Exist! Returning to homepage")</script>';
            return redirect('/dataexist')->with('alert', 'Data Already Exist!');
        }
        $kode = Employee::find($id);
        $kode->kode = $kodeOd->kodeposisi;
        $kode->status = "accepted";
        $kode->push();
        $rem =  new Remuneration();
        $rem->EmployeeId = $data['employee']->id;
        $rem->nama = $data['employee']->nama;
        $rem->posisi = $data['employee']->posisi;
        $rem->email = $data['employee']->email;
        $rem->kode = $kodeOd->kodeposisi;
        $rem->grade = $data['employee']->grade;
        $rem->status = "accepted";
        $rem->save();
        return redirect('/home');
    }
    public function reject($id){
        $progress = Employee::find($id);
        $progress->progress->progress = '0';
        $progress->token = Str::random(12);
        $progress->status = 'Not complete';
        $progress->push();
        Fileupload::where('EmployeeId', $id)->delete();
           
           return redirect('/home');
    }
    public function kode(Request $request,$id){
        $kode = od::where('EmployeeId', $id)->first();
        // $kode->remuneration->kode = $request->kode;
        // $kode->kode = $request->kode;
        $kode->kodeposisi = $request->kode;
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
        $progress= Employee::with('progress')->get();
        $data['employee']= Employee::with('progress')->find($id);
        if ($data['employee']->token!=$token) {
            $data['message'] = "Token not match";
            $data['employee'] = null;
        }
    	return view('certif')->with('data', $data);
    }
 
    public function cetakpdf($id,$token=null)
    {
    	$progress= Employee::with('progress')->get();
        $data['employee']= Employee::with('progress')->find($id);
        if ($data['employee']->token!=$token) {
            $data['message'] = "Token not match";
            $data['employee'] = null;
        }
 
    	$pdf = PDF::loadview('certifpdf',['data'=>$data]);
    	return $pdf->download('laporan-pegawai.pdf');
    }
}