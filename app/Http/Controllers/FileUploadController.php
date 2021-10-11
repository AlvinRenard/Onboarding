<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\FileUpload;
use Illuminate\Http\Request;

class FileUploadController extends Controller

{
    public function fileStore(Request $request){
        // return $request->all();
        // $emp = Employee::find($id);
        // $data['employee'] ->progress-> progress += 25;
        // $data['employee']->save();
        $request->validate([
            'file' => 'required',
        ]);
       $fileName =time().'-'.request()->file->getClientOriginalName();
       $request->file->move(public_path('uploads'), $fileName);
       $employee = Employee::find($request->id);
       $fileupload = $employee->files()->create([
           'filename' => $fileName,
       ]);
       $employee->progress->progress += 1;
        $employee->push();

    //    $fileupload = new FileUpload;
    //    $fileupload->filename=$fileName;
    //    $fileupload->EmployeeId = $request->id;
    //    $fileupload->employees->progress->progress += 1;
    //    $fileupload->save();
        return response()->json(['success'=>'File Uploaded Successfully']);
    }
}
