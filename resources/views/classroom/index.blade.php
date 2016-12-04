@extends('layouts.app')

@section('content')
<!-- <div class="container">   -->
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">班级管理</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif
                    <a href="{{ url('classroom/create') }}" class="btn btn-lg btn-primary">新增</a>

                <div class="tabbable">
                    <div class="tab-content">
                         
                        <div class="tab-pane active">
                            <p>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>序号</th>
                                            <th>班级名称</th>
                                            <th>地域</th>
                                            <th>入学时间</th>
                                            <th>毕业时间</th>
                                            <th>专业</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <hr>
                                    
                                    <tbody>
                                        @foreach ($classrooms as $classroom)
                                        <div>
                                            <div class="content">

                                                <tr>
                                                    <td>{{ $classroom->id }}</td>
                                                    <td>{{ $classroom->ClassName }}</td>
                                                    <td>{{ $classroom->CTeacher }}</td>
                                                    <td>{{ $classroom->InTime }}</td>
                                                    <td>{{ $classroom->OutTime }}</td>
                                                    <td>{{ $classroom->XcDepID }}</td>
                                                    <td>
                                                        
                                                        <form action="{{ url('classroom/'.$classroom->id) }}" method="POST" style="display: inline;">
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
                            </p>
                        {!!$classrooms->links()!!}    <!-- 分页链接 -->
                        </div>
                        
                    </div>

                    
                        

                </div>
            </div>
        </div>
    </div>
<!-- </div>   -->
@endsection