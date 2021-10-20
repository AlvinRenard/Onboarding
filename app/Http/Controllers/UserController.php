<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\Remuneration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

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
                        ->get();
            $user2 = Employee::with('progress')
                        ->whereBetween('grade', [0,3])
                        ->get();
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
            $empdata = DB::table('remuneration')->get();
            $employees = DB::table('employees')->get();
            $pegawai = DB::table('employees')->paginate(10);
            return view('ticket')->with('employees', $employees)->with('pegawai', $pegawai)->with('progress',$progress)->with('empdata',$empdata);
        }
    }
    public function accept($id){
        $data['employee']= Employee::with('progress')->find($id);
        $empid = $data['employee']->id;
        // return $empid;
        $dataexist = Remuneration::where('Employeeid',$empid)->get()->pluck('id');
        // return $dataexist;
        if (count($dataexist) > 0){
            echo '<script>alert("Data Already Exist! Returning to homepage")</script>';
            return redirect('/dataexist')->with('alert', 'Data Already Exist!');
        }
        $rem =  new Remuneration();
        $rem->EmployeeId = $data['employee']->id;
        $rem->nama = $data['employee']->nama;
        $rem->alamat = $data['employee']->alamat;
        $rem->grade = $data['employee']->grade;
        $rem->status = "accepted";
        $rem->save();
        return redirect('/home');
    }
}