<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
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
            $progress= Employee::with('progress')->get();
            $employees = DB::table('employees')->get();
            $pegawai = DB::table('employees')->paginate(10);
            return view('homepage')->with('employees', $employees)->with('pegawai', $pegawai)->with('progress',$progress);
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

    public function loginPost(Request $request){
        $email = $request->email;
        $password = $request->password;

        $data = User::where('email',$email)->first();
        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('name',$data->name);
                Session::put('email',$data->email);
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
        ]);

        $data =  new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
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
}