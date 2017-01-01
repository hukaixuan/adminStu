@extends('layouts.app')

@section('content')
<div class="container">  
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">修改学生信息</div>
                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>修改失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <form enctype="multipart/form-data" action="{{ url('student/'.$student->id) }}" method="POST">
                        {{ method_field('PATCH') }}
                        {!! csrf_field() !!}      <!-- 防止跨站伪造攻击csrf -->
                        <table class="table table-bordered">
                            <tr>
                                <td><img src="{{asset($student->Pic)}}" width="150px" height="230px"></td>
                                <td width="350px"><label>姓名：</label><input type="text" name="UserName" required="required" placeholder="" class="form-control" value="{{ $student->UserName }}"><br>
                                <br><hr>
                                <br>
                                <label>准考证号：</label><input type="text" name="UNumber" class="form-control" value="{{ $student->UNumber }}">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <label>性别</label>          
                                    <select name="Usex" class="form-control" value="{{ $student->Usex }}">
                                        @if ($student->Usex == '男')
                                            <option value="男" selected="true">男</option>
                                            <option value="女">女</option>
                                        @elseif ($student->Usex == '女')
                                            <option value="男">男</option>
                                            <option value="女" selected="true">女</option>
                                        @else
                                            <option value="男">男</option>
                                            <option value="女" >女</option>
                                            <option selected="true" value=""></option> 
                                        @endif 
                                    </select>
                                </td>
                                <td>
                                   <label>身份证号：</label><input type="text" name="IDcard" class="form-control" value="{{ $student->IDcard}}"> 
                                </td>
                            </tr>
                            <tr>
                                <td><label>修改准考证书</label><input type="file" accpet="image/*" name="Pic" class="form-control" value="{{ $student->Pic }}"></td>
                                <td>
                                    <label>班级</label>
                                    <select name="UClass" class="form-control">
                                        @if($student->UClass == NULL)
                                            <option value="" selected="true"></option>
                                        @endif
                                        @foreach($classrooms as $classroom)
                                            @if ($classroom->ClassName == $student->UClass)
                                                <option value="{{$classroom->ClassName}}" selected="true">{{$classroom->ClassName}}</option>
                                            
                                            @else
                                                <option value="{{$classroom->ClassName}}">{{$classroom->ClassName}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </td>
                                
                            </tr>
                            <!-- <tr>
                                <td>
                                    <label>报考时间</label>      
                                    <input type="text" name="Intime" class="form-control" value="{{ $student->Intime }}">
                                </td>
                                <td>
                                    <label>发证时间</label>      
                                    <input type="text" name="Outtime" class="form-control" value="{{ $student->Outtime }}">
                                </td>
                                <td><label>电话</label><input type="text" name="Utel" class="form-control" value="{{ $student->Utel }}"></td>
                            </tr> -->
                            <tr>
                                <td>
                                    <label>专业</label>
                                    <select name="Udep" class="form-control" value="{{ $student->Udep }}">
                                            <option value="美术考级">美术考级</option>
                                    </select>
                                </td>
                                <td>
                                    <label>电话</label><input type="text" name="Utel" class="form-control" value="{{ $student->Utel}}">
                                </td>
                            </tr>
                        </table>
                        
                        <br>
                        <button class="btn btn-lg btn-info">确认修改</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>  
                     
@endsection