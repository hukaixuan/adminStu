@extends('layouts.app')

@section('content')
<!-- <div class="container">   -->
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">学生管理</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif
                    <a href="{{ url('student/create') }}" class="btn btn-lg btn-primary">新增</a>

                    <form action="{{ url('student/search') }}" method="POST" style="display: inline;">
                        {{ csrf_field() }}
                        <div style="float: right;"> 
                            <input type="text" name="numOrName" placeholder="请输入姓名或准考证号进行查询" size="30">
                            <button type="submit" class="btn btn-primary">搜索</button>
                        </div>
                        
                    </form>
                    
                <div class="tabbable">
                    <div class="tab-content">
                         
                        <div class="tab-pane active">
                            <p>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>序号</th>
                                            <th>准考证号</th>
                                            <th>姓名</th>
                                            <th>班级</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <hr>
                                    
                                    <tbody>
                                        @foreach ($students as $student)
                                        <div>
                                            <div class="content">

                                                <tr>
                                                    <td>{{ $student->id }}</td>
                                                    <td>{{ $student->UNumber }}</td>
                                                    <td>{{ $student->UserName }}</td>
                                                    <td>{{ $student->UClass }}</td>
                                                    <td>
                                                        <a href="{{ url('student/'.$student->id.'/edit') }}" class="btn btn-success">编辑</a>
                                                        <form action="{{ url('student/'.$student->id) }}" method="POST" style="display: inline;">
                                                            {{ method_field('DELETE') }}
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-danger">删除</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                                    @if(count($students)==0)
                                        <h3 align="center">暂无学生信息</h3>
                                    @endif
                            </p>
                        {!!$students->links()!!}    <!-- 分页链接 -->
                        </div>
                        
                    </div>

                    
                        

                </div>
            </div>
        </div>
    </div>
<!-- </div>   -->
@endsection