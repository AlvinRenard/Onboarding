<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\DownloadFile;
use Illuminate\Http\Request;

class DownloadController extends Controller

{
    public function downloadijazah($id){
    $filename =DownloadFile::where('EmployeeId', $id)->first();
          $download = public_path()."/uploads/$filename->file_ijazah";
        return response()->download($download);
    }
    public function downloadcv($id){
      $filename =DownloadFile::where('EmployeeId', $id)->first();
            $download = public_path()."/uploads/$filename->file_cv";
          return response()->download($download);
      }
      public function downloadfpk($id){
        $filename =DownloadFile::where('EmployeeId', $id)->first();
              $download = public_path()."/uploads/$filename->file_fpk";
            return response()->download($download);
        }
        public function downloadphoto($id){
          $filename =DownloadFile::where('EmployeeId', $id)->first();
                $download = public_path()."/uploads/$filename->file_photo";
              return response()->download($download);
          }
}