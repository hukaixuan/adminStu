@extends('layouts.app')

@section('content')
<div class="container">  
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">新增班级</div>
                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>新增失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <form enctype="multipart/form-data" action="{{ url('classroom') }}" method="POST">
                        {!! csrf_field() !!}      <!-- 防止跨站伪造攻击csrf -->
                        <table class="table table-bordered">
                            <tr>
                                <td width="350px"><label>班级名称：</label><input type="text" name="ClassName" required="required" placeholder="" class="form-control"></td>
                                <td><label>地域：</label><input type="text" name="CTeacher" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>                       
                                    <label>入学时间</label>          
                                    <input type="month" name="InTime"  min="2010-01" max="2020-12">
                                </td>
                                <td>
                                    <label>毕业时间</label>
                                    <input type="month" name="OutTime"  min="2010-01" max="2020-12">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>所属专业</label>
                                    <select name="XcDepID" class="form-control">
                                            <option value="美术考级">美术考级</option>
                                    </select>
                                </td>
                                <td></td>
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