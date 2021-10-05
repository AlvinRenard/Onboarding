<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function disp(){
		return Employee::all();
	}
	public function create(request $request){
		$emp = new Employee;
		$emp -> nama = $request -> nama;
		$emp -> alamat = $request -> alamat;
		$emp -> save();

		return "Berhasil Buat";
	}
	public function update(request $request, $id){
		$nama = $request -> nama;
		$alamat = $request -> alamat;

		$emp = Employee::find($id);
		$emp -> nama = $nama;
		$emp -> alamat = $alamat;
		$emp -> save();

		return "Berhasil Update";
	}
	public function delete($id){
		$emp = Employee::find($id);
		$emp -> delete();

		return "Berhasill Delete";
	}
}
