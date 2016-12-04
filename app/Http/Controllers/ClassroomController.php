<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Classroom;

class ClassroomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $classrooms = Classroom::orderBy('id','desc')->paginate(15);
        return view('classroom/index')->withClassrooms($classrooms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('classroom/newClass');
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
                'ClassName' => 'required',
                'CTeacher' => 'required',
                'InTime' => 'required',
                'OutTime' => 'required',
                'XcDepID' => '',
        ]);

        $classroom = new Classroom;
        $classroom->ClassName = $request->get('ClassName');
        $classroom->CTeacher = $request->get('CTeacher');
        $classroom->InTime = $request->get('InTime');
        $classroom->OutTime = $request->get('OutTime');
        $classroom->XcDepID = $request->get('XcDepID');

        if ($classroom->save()) {
            return redirect('classroom');
        } else {
            return redirect()->back()->withInput()->withErrors('创建班级失败');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (Classroom::find($id)->delete()) {
            return redirect()->back()->withInput()->withErrors('删除成功！');
        } else {
            return redirect()->back()->withInput()->withErrors('删除失败！');
        }
        
    }
}
