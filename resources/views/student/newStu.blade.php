@extends('layouts.app')

@section('content')
<div class="container">  
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">新增学生信息</div>
                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>新增失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <form enctype="multipart/form-data" action="{{ url('student') }}" method="POST">
                        {!! csrf_field() !!}      <!-- 防止跨站伪造攻击csrf -->
                        <table class="table table-bordered">
                            <tr>
                                <td width="350px"><label>姓名：</label><input type="text" name="UserName" required="required" placeholder="" class="form-control"></td>
                                <td><label>准考证号</label><input type="text" name="UNumber" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>                       
                                    <label>性别</label>          
                                    <select name="Usex" class="form-control">
                                        <option value="男">男</option>
                                        <option value="女">女</option>
                                    </select>
                                </td>
                                <td>
                                    <label>班级</label>
                                    <select name="UClass" class="form-control">
                                        @foreach($classrooms as $classroom)
                                            <option value="{{$classroom->ClassName}}">{{$classroom->ClassName}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label>上传准考证书</label><input type="file" accpet="image/*" name="Pic" class="form-control"></td>
                                
                            </tr>
                            <!-- <tr>
                                <td>
                                    <label>发证时间</label>      
                                    <input type="month" name="Outtime" class="form-control" min="2010-01" max="2020-12">
                                </td>
                                <td>
                                    <label>报考时间</label>      
                                    <input type="month" name="Intime" class="form-control" min="2010-01" max="2020-12">
                                </td>
                                
                            </tr> -->
                            <tr>
                                <td>
                                    <label>专业</label>
                                    <select name="Udep" class="form-control">
                                            <option value="美术考级">美术考级</option>
                                    </select>
                                </td>
                                <td><label>电话</label><input type="text" name="Utel" class="form-control"></td>
                            </tr>
                        </table>
                        
                        <br>
                        <button class="btn btn-lg btn-info">新增</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>  
                     
@endsection