<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\FileUpload;
use App\Models\Userinformation;
use Illuminate\Http\Request;

class FileUploadController extends Controller

{
private $count = 0;
    public function fileStorefpk(Request $request,$id,$token=null){
        // return $request->all();
        $request->validate([
            'file' => 'required|mimes:pdf',
        ]);
        $dataexist = FileUpload::where('EmployeeId',$request->id)->count('file_fpk');
        // return $dataexist;
        if ($dataexist > 1){
            FileUpload::destroy($dataexist);
  
        }
        $data['employee']= Employee::with('progress')->find($id);
       $fileLoc = public_path('uploads');
       $fileName =time().'-'.request()->file->getClientOriginalName();
       $request->file->move(public_path('uploads'), $fileName);
       $employee = Employee::find($id);
       $fileupload = $employee->files()->update([
        'file_fpk' => $fileName,

       ]);
        $employee->push();
        return redirect('/onboarding/'.$data['employee']->id.'/'.$data['employee']->token)->with('success','File has been uploaded.');
    }
    public function empinformation(Request $request,$id,$token=null){
       
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postalcode' => 'required',
        ]);
        $dataexist = Userinformation::where('EmployeeId',$id)->count();
        if ($dataexist > 0){
            Userinformation::where('EmployeeId', $id)->delete();
        }

        $data =  new UserInformation();
        $data->EmployeeId = $id;
        $data->name = $request->name;
        $data->address = $request->address;
        $data->city = $request->city;
        $data->state = $request->state;
        $data->postalcode= $request->postalcode;
        $data->save();
        $employee = Employee::find($id);
        $employee->progress->progress = '1';
        $employee->status = 'File already submitted';
        $employee->push();
        $file['type'] = FileUpload::where('EmployeeId', $id)->first();
        if(FileUpload::where('EmployeeId', $id)->count() > 0){
        $fileupload = $employee->files()->update([
         'file_cv' => $file['type']->file_cv,
         'file_ijazah' => $file['type']->file_ijazah,
         'file_photo' => $file['type']->file_photo,
         'file_fpk' => $file['type']->file_fpk,
         'contract' => '',
         'idcard' => '',
            'type'=> '',
        ]);
        }else{
            $fileupload = $employee->files()->create([
                'file_cv' => '',
                'file_ijazah' => '',
                'file_photo' => '',
                'file_fpk' => '',
                'contract' => '',
                'idcard' => '',
                   'type'=> '',
               ]);
        }
        return redirect('/onboarding/'.$id.'/'.$token);

    }
    public function fileStorecv(Request $request,$id,$token=null){
        // return $request->all();
        $request->validate([
            'file' => 'required|mimes:pdf',
        ]);
        $dataexist = FileUpload::where('EmployeeId',$request->id)->count('file_cv');
        // return $dataexist;
        if ($dataexist > 1){
            FileUpload::destroy($dataexist);
        }
        $data['employee']= Employee::with('progress')->find($id);
       $fileLoc = public_path('uploads');
       $fileName =time().'-'.request()->file->getClientOriginalName();
       $request->file->move(public_path('uploads'), $fileName);
       $employee = Employee::find($request->id);
     $fileupload = $employee->files()->update([
        'file_cv' => $fileName,
        'type' => $this-> count + 1,
       ]);
        return redirect('/onboarding/'.$data['employee']->id.'/'.$data['employee']->token)->with('success','File has been uploaded.');
    }
    public function fileStoreijazah(Request $request,$id,$token=null){
        // return $request->all();
        $request->validate([
            'file' => 'required|mimes:pdf',
        ]);
        $dataexist = FileUpload::where('EmployeeId',$request->id)->count('file_ijazah');
        // return $dataexist;
        if ($dataexist > 1){
            FileUpload::destroy($dataexist);
          
        }
        $data['employee']= Employee::with('progress')->find($id);
       $fileLoc = public_path('uploads');
       $fileName =time().'-'.request()->file->getClientOriginalName();
       $request->file->move(public_path('uploads'), $fileName);
       $employee = Employee::find($request->id);
       $fileupload = $employee->files()->update([
        'file_ijazah' => $fileName,
      
       ]);
        return redirect('/onboarding/'.$data['employee']->id.'/'.$data['employee']->token)->with('success','File has been uploaded.');
    }
    public function fileStorephoto(Request $request,$id,$token=null){
        // return $request->all();
        $request->validate([
            'file' => 'required|mimes:jpeg,bmp,png,jpg',
        ]);
        $dataexist = FileUpload::where('EmployeeId',$request->id)->count('file_photo');
        // return $dataexist;
        if ($dataexist > 1){
            FileUpload::where('EmployeeId', $id)->delete();
       
        }
        $data['employee']= Employee::with('progress')->find($id);
       $fileLoc = public_path('uploads');
       $fileName =time().'-'.request()->file->getClientOriginalName();
       $request->file->move(public_path('uploads'), $fileName);
       $employee = Employee::find($request->id);
       $fileupload = $employee->files()->update([
        'file_photo' => $fileName,
  
       ]);
        return redirect('/onboarding/'.$data['employee']->id.'/'.$data['employee']->token)->with('success','File has been uploaded.');
    }
    public function final($id){
        return redirect('/finalemplanding/'.$data['employee']->id.'/'.$data['employee']->token);
    }
    public function finalemplanding($id,$token=null){
        
        $employee = Employee::find($id);
        $employee->progress->progress = '2';
        $employee->status = 'Completed File Submission';
        $employee->push();
        $data['employee']= Employee::with('progress')->find($id);
        return view('finalemplanding')->with('data', $data);
    }
}
