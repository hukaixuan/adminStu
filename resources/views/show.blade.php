@foreach ($students as $student)
	
@endforeach

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>中国美术学院-证书查询系统-查询结果</title>

	<style type="text/css">
		body {
			margin-left: 0px;
			margin-top: 0px;
			margin-right: 0px;
			margin-bottom: 0px;
		}
	</style>
</head>
<body>
	<table width="779" height="100" border="0" align="center" cellpadding="0" cellspacing="1" class="TableAll">
  		<tbody>
  			<tr>
    			<td align="center"><img src="{{ asset('img/Top.gif') }}" width="778" height="100"></td>
  			</tr>
		</tbody>
	</table>
</html>
@if( count($students)==0 )
  <center><h1>请检查输入信息是否完整正确</h1></center>
  <center><a href="{{url('/')}}">返回上一页</a></center><br>
  <br>
  <br>
@endif
<table width="778" height="200" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tbody>
  @foreach($students as $student)
  <tr>
    <td align="center" valign="top" bgcolor="#FFFFFF">
        <br>
        <table width="760" border="1" cellpadding="0" cellspacing="1" bordercolor="#F39D9D" background="{{asset('img/Byz.gif')}}" class="TableAll" bordercolordark="#FFFFFF">
            <tbody>
        	  <tr align="center">
            	<th colspan="5" class="TrTop">考级证书详细信息</th>
          	  </tr>
              <tr>
                <td width="80" height="25" align="center">姓名</td>
                <td width="300">&nbsp;{{$student->UserName}}</td>
                <td width="80" align="center">性别</td>
                <td width="300">&nbsp;{{$student->Usex}}</td>
              </tr>
              <tr>
                <td height="25" align="center">准考证号</td>
                <td>&nbsp;{{$student->UNumber}}</td>
                <td align="center">专业</td>
                <td>&nbsp;{{$student->Udep}}</td>
              </tr>

                <tr>
                
              </tr>
              <tr>
                <td height="25" align="center">报考时间</td>
                <td>&nbsp;{{$student->Intime}}</td>
                <td align="center">发证时间</td>
                <td>&nbsp;{{$student->Outtime}}</td>
              </tr>
              <tr>
                <td height="25" align="center">证书</td>
                <td height="556" colspan="4" valign="top">
					<table width="400" border="0" align="center" cellpadding="1" cellspacing="1" class="w9pt">
	                 <tbody>
	                 	<tr>
	                 		<td width="400" rowspan="0" align="center" valign="middle">
	                  			<a href="{{asset($student->Pic)}}" target="blank"><img src="{{asset($student->Pic)}}" width="400" height="556" border="0"></a>
	                  		</td>
	                  </tr>
	                 </tbody>
	                </table>
                </td>
              </tr>
            </tbody>
        </table>

&nbsp;

&nbsp;

&nbsp;

    </td>
  </tr>
 </tbody>
 @endforeach
</table>
  

<style type="text/css">
.STYLE2 {
	font-size: 14px;
	font-weight: bold;
}
</style>
<table width="779" height="80" border="0" align="center" cellpadding="0" cellspacing="0" background="{{ asset('img/Foot.gif') }}" class="w9pt">
  <tbody>
  	<tr>
    	<td align="center"><span class="STYLE2">版权所有：中国艺术教育网</span></td>
  	</tr>
  </tbody>
</table>

</body>
</html>