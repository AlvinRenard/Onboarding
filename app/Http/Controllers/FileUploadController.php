<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\FileUpload;
use Illuminate\Http\Request;

class FileUploadController extends Controller

{
    public function fileStorefpk(Request $request,$id,$token=null){
        // return $request->all();
        $request->validate([
            'file' => 'required|mimes:pdf',
        ]);
        $dataexist = FileUpload::where('EmployeeId',$request->id)->where('type',$request->process)->get()->pluck('id');
        // return $dataexist;
        if (count($dataexist) > 0){
            FileUpload::destroy($dataexist);
        }
        $data['employee']= Employee::with('progress')->find($id);
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
        return redirect('/onboarding/'.$data['employee']->id.'/'.$data['employee']->token)->with('success','File has been uploaded.');
    }
    public function fileStorecv(Request $request,$id,$token=null){
        // return $request->all();
        $request->validate([
            'file' => 'required|mimes:pdf',
        ]);
        $dataexist = FileUpload::where('EmployeeId',$request->id)->where('type',$request->process)->get();
        // return $dataexist;
        if (count($dataexist) > 0){
            FileUpload::destroy($dataexist);
        }
        $data['employee']= Employee::with('progress')->find($id);
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
        return redirect('/onboarding/'.$data['employee']->id.'/'.$data['employee']->token)->with('success','File has been uploaded.');
    }
    public function fileStoreijazah(Request $request,$id,$token=null){
        // return $request->all();
        $request->validate([
            'file' => 'required|mimes:pdf',
        ]);
        $dataexist = FileUpload::where('EmployeeId',$request->id)->where('type',$request->process)->get()->pluck('id');
        // return $dataexist;
        if (count($dataexist) > 0){
            FileUpload::destroy($dataexist);
        }
        $data['employee']= Employee::with('progress')->find($id);
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
        return redirect('/onboarding/'.$data['employee']->id.'/'.$data['employee']->token)->with('success','File has been uploaded.');
    }
    public function fileStorephoto(Request $request,$id,$token=null){
        // return $request->all();
        $request->validate([
            'file' => 'required|mimes:pdf',
        ]);
        $dataexist = FileUpload::where('EmployeeId',$request->id)->where('type',$request->process)->get()->pluck('id');
        // return $dataexist;
        if (count($dataexist) > 0){
            FileUpload::destroy($dataexist);
        }
        $data['employee']= Employee::with('progress')->find($id);
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
        return redirect('/onboarding/'.$data['employee']->id.'/'.$data['employee']->token)->with('success','File has been uploaded.');
    }
    public function final($id){
        return redirect('/finalemplanding/'.$data['employee']->id.'/'.$data['employee']->token);
    }
    public function finalemplanding($id,$token=null){
        $employee = Employee::find($id);
        $employee->progress->progress = '5';
        $employee->status = 'Completed File Submission';
        $employee->push();
        $data['employee']= Employee::with('progress')->find($id);
        return view('finalemplanding')->with('data', $data);
    }
}
