@extends('layouts.app')

@section('content')
<div class="container">
	@if (count($errors) > 0)
        <div class="alert alert-danger">
            {!! implode('<br>', $errors->all()) !!}
        </div>
    @endif
	<form enctype="multipart/form-data" action="{{ url('excel/import') }}" method="POST">
    {!! csrf_field() !!}
		<div class="row">
		  <div class="col-lg-6">
		  	<span>请上传excel文件：<a href="{{url('download/excel_template')}}">(没有excel导入模板？点击下载)</a></span>
		    <div class="input-group">
		      <input name="excel_file" type="file" class="form-control">
		      <span class="input-group-btn">
		        <button class="btn btn-default" >开始导入</button>
		      </span>
		    </div><!-- /input-group -->
		  </div><!-- /.col-lg-6 -->
		</div><!-- /.row -->
	</form>
	<hr>
	<form action="{{ url('pic/upload') }}" method="post" id="upload" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
		  <div class="col-lg-6">
			<span>请上传证书图片：</span>
		    <div class="input-group">
		      <input type="file" name="file[]" multiple="multiple" class="form-control" />
		      <span class="input-group-btn">
		        <button class="btn btn-default" >开始上传</button>
		      </span>
		    </div><!-- /input-group -->
		  </div><!-- /.col-lg-6 -->
		</div><!-- /.row -->
	</form>
</div>


@endsection