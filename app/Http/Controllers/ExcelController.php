<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Excel;
use App\Student;

class ExcelController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index(){
    	return view('student/excel');
    }


    public function import(Request $request){
    	$this -> validate($request,[
                'excel_file' => '',
            ]);
    	$file = $request->file('excel_file');
    	// dd($file);
        if (!is_null($file)) {
            $file->store('excel');
            // echo $file->hashName();
        }else{
        	echo "存储失败";
        }


    	$filePath = 'public/upload/excel/'.$file->hashName();
	    Excel::load($filePath, function($reader) {
	        // $data = $reader->all();
	        // dd($reader->toArray());
	        $students = $reader->toArray();
	        foreach ($students as $stu) {
	        	$student = new Student;
	        	$student->UserName = $stu['姓名'];
	        	$student->IDcard = $stu['身份证号'];
                $student->UNumber = $stu['准考证号'];
                $student->Usex = $stu['性别'];
                $student->UClass = $stu['班级'];
	        	$student->Pic = 'upload/'.$stu['身份证号'].'.jpg';
	        	$student->save();
	        }
	    });

	    return redirect('excel')->witherrors('从excel导入学生数据成功');
    }

    public function export(){
    	// $cellData = [
     //        ['学号','姓名','成绩'],
     //        ['10001','AAAAA','99'],
     //        ['10002','BBBBB','92'],
     //        ['10003','CCCCC','95'],
     //        ['10004','DDDDD','89'],
     //        ['10005','EEEEE','96'],
     //    ];
     //    Excel::create('学生成绩',function($excel) use ($cellData){
     //        $excel->sheet('score', function($sheet) use ($cellData){
     //            $sheet->rows($cellData);
     //        });
     //    })->store('xls')->export('xls');
    }
}
