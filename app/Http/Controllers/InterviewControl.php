<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

 
class InterviewControl extends Controller
{
    public function process($nama){ 
            return $nama;
    }
    public function form(){
 
    	return view('form');
    }
    public function interview(Request $request){
        $nama = $request->input('nama');
     	$alamat = $request->input('alamat');
         return view('interview',['nama' => $nama,'alamat' => $alamat]);
    }
    public function index()
	{
		$pegawai = DB::table('pegawai')->paginate(10);
		return view('databaseview',['pegawai' => $pegawai]);
 
	}
	public function about(){
		return view('Finalresult');
	}
    public function contact(){
		$listpegawai = DB::table('pegawai')->paginate(10);
		return view('contact',['listpegawai' => $listpegawai]);
	}
	public function add(){
		return view('add');
	}
	public function store(Request $request)
	{
		DB::table('pegawai')->insert([
			'pegawai_nama' => $request->nama,
			'pegawai_jabatan' => $request->jabatan,
			'pegawai_umur' => $request->umur,
			'pegawai_alamat' => $request->alamat
		]);

		return redirect('/success');
	 
	}
	public function success(){
		return view('success');
	}
}