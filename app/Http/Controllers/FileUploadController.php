<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\FileUpload;
use Illuminate\Http\Request;

class FileUploadController extends Controller

{
    public function fileStorefpk(Request $request){
        // return $request->all();
        $request->validate([
            'file' => 'required',
        ]);
        $dataexist = FileUpload::where('EmployeeId',$request->id)->where('type',$request->process)->get()->pluck('id');
        // return $dataexist;
        if (count($dataexist) > 0){
            FileUpload::destroy($dataexist);
        }
       $fileLoc = public_path('uploads');
       $fileName =time().'-'.request()->file->getClientOriginalName();
       $request->file->move(public_path('uploads'), $fileName);
       $employee = Employee::find($request->id);
       $fileupload = $employee->files()->update([
        'file_fpk' => $fileName,
           'type'=> $request-> process,
       ]);
       if($employee->progress->progress < $request->process){
       $employee->progress->progress = $request->process;
       }
        $employee->push();
        return response()->json(['success'=>'File Uploaded Successfully']);
    }
    public function fileStorecv(Request $request){
        // return $request->all();
        $request->validate([
            'file' => 'required',
        ]);
        $dataexist = FileUpload::where('EmployeeId',$request->id)->where('type',$request->process)->get();
        // return $dataexist;
        if (count($dataexist) > 0){
            FileUpload::destroy($dataexist);
        }
       $fileLoc = public_path('uploads');
       $fileName =time().'-'.request()->file->getClientOriginalName();
       $request->file->move(public_path('uploads'), $fileName);
       $employee = Employee::find($request->id);
       $fileupload = $employee->files()->create([
        'file_cv' => $fileName,
        'file_ijazah' => '',
        'file_photo' => '',
        'file_fpk' => '',
           'location' =>config('app.url').'/uploads/'.$fileName,
           'type'=> $request-> process,
       ]);
       if($employee->progress->progress < $request->process){
       $employee->progress->progress = $request->process;
       }
        $employee->push();
        return response()->json(['success'=>'File Uploaded Successfully']);
    }
    public function fileStoreijazah(Request $request){
        // return $request->all();
        $request->validate([
            'file' => 'required',
        ]);
        $dataexist = FileUpload::where('EmployeeId',$request->id)->where('type',$request->process)->get()->pluck('id');
        // return $dataexist;
        if (count($dataexist) > 0){
            FileUpload::destroy($dataexist);
        }
       $fileLoc = public_path('uploads');
       $fileName =time().'-'.request()->file->getClientOriginalName();
       $request->file->move(public_path('uploads'), $fileName);
       $employee = Employee::find($request->id);
       $fileupload = $employee->files()->update([
        'file_ijazah' => $fileName,
           'type'=> $request-> process,
       ]);
       if($employee->progress->progress < $request->process){
       $employee->progress->progress = $request->process;
       }
        $employee->push();
        return response()->json(['success'=>'File Uploaded Successfully']);
    }
    public function fileStorephoto(Request $request){
        // return $request->all();
        $request->validate([
            'file' => 'required',
        ]);
        $dataexist = FileUpload::where('EmployeeId',$request->id)->where('type',$request->process)->get()->pluck('id');
        // return $dataexist;
        if (count($dataexist) > 0){
            FileUpload::destroy($dataexist);
        }
       $fileLoc = public_path('uploads');
       $fileName =time().'-'.request()->file->getClientOriginalName();
       $request->file->move(public_path('uploads'), $fileName);
       $employee = Employee::find($request->id);
       $fileupload = $employee->files()->update([
        'file_photo' => $fileName,
           'type'=> $request-> process,
       ]);
       if($employee->progress->progress < $request->process){
       $employee->progress->progress = $request->process;
       }
        $employee->push();
        return response()->json(['success'=>'File Uploaded Successfully']);
    }
}
