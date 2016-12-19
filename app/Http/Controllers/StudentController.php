<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Student;
use App\Classroom;
use App\Test;

class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function test()
    {
        $classroom = Classroom::find(21);
        print_r($classroom->students);
        // $student = Student::find(768);
        // print_r($student->classroom);  //classroom not classroom()
    }
    public function search(Request $request)
    {
        $numOrName = $request->numOrName;
        if (is_numeric($numOrName)) {
            $result = Student::where('UNumber',$numOrName);
            // $result2 = Student::where('IDcard',$numOrName);
            // dd($result);
        } else {
            $result = Student::where('UserName',$numOrName);
        }
        $student = $result->paginate(2);
        return view('student/index')->withStudents($student);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = Student::orderBy('id','desc')->paginate(20);
        return view('student/index')->withStudents($students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $classrooms = Classroom::orderBy('id','desc')->get();
        return view('student/newStu')->withClassrooms($classrooms);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this -> validate($request,[
                'UserName' => 'required',
                'UNumber' => 'required',
                'Usex' => 'required',
                'UClass' => 'required',
                'Pic' => '',
                'Intime' => '',
                'Outtime' => '',
                'Utel' => '',
                'Udep' => '',
            ]);
        $student = new Student;   // new Student 不是new Student()
        $student->UserName = $request->get('UserName');
        $student->UNumber = $request->get('UNumber');
        $student->IDcard = $request->get('IDcard');
        $student->Usex = $request->get('Usex');
        $student->UClass = $request->get('UClass');
        // $student->Intime = $request->get('Intime');
        // $student->Outtime = $request->get('Outtime');
        $classroom = Classroom::where('ClassName',$request->get('UClass'))->first();
        // echo $classroom->ClassName;
        $student->Intime = $classroom->InTime;
        $student->Outtime = $classroom->OutTime;
        $student->Utel = $request->get('Utel');
        $student->Udep = $request->get('Udep');

        $file = $request->file('Pic');
        if (!is_null($file)) {
            $file->store('');
            $student->Pic = 'upload/'.$file->hashName();
        }

        if ($student->save()) {
            return redirect('student');
        } else {    
            return redirect()->back()->withInput()->withErrors("新增失败");
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        return view('student/edit')->withStudent(Student::find($id))->withClassrooms(Classroom::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this -> validate($request,[
                'UserName' => 'required',
                'UNumber' => 'required',
                'Usex' => 'required',
                'UClass' => 'required',
                'Pic' => '',
                'Intime' => '',
                'Outtime' => '',
                'Utel' => '',
                'Udep' => '',
            ]);
        $student = Student::find($id);   
        $student->UserName = $request->get('UserName');
        $student->UNumber = $request->get('UNumber');
        $student->IDcard = $request->get('IDcard');
        $student->Usex = $request->get('Usex');
        $student->UClass = $request->get('UClass');
        // $student->Intime = $request->get('Intime');
        // $student->Outtime = $request->get('Outtime');
        $classroom = Classroom::where('ClassName',$request->get('UClass'))->first();
        $student->Intime = $classroom->InTime;
        $student->Outtime = $classroom->OutTime;
        $student->Utel = $request->get('Utel');
        $student->Udep = $request->get('Udep');

        $file = $request->file('Pic');
        if (!is_null($file)) {
            $file->store('');
            $student->Pic = 'upload/'.$file->hashName();
        }

        if ($student->save()) {
            return redirect('student');
        } else {    
            return redirect()->back()->withInput()->withErrors("新增失败");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        // if (Student::where('id',$id)->delete()) {
        if (Student::find($id)->delete()) {
            return redirect()->back()->withInput()->withErrors('删除成功！');
        }else{
            return redirect()->back()->withInput()->withErrors('删除失败！');
        }
        // dd(Student::destroy($id));
    }
}
