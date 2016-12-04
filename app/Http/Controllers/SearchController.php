<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Student;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
    	$UserName = $request->get('UserName');
    	$UNumber = $request->get('UNumber');
    	$results = Student::where('UserName',$UserName)->where('UNumber',$UNumber)->get();   //返回一个数组，防止一个考生多张证书
    	return view('show')->withStudents($results);
    	
    }
}
