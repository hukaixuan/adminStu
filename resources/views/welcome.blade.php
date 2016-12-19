<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/css/app.css" rel="stylesheet">
        <title>中国美术学院-证书查询系统</title>
    </head>
    <body>
    <div style="height: 100px">
        
    </div>
    <div class="table">
        <table style="width: 745px; height: 454px; background-repeat: no-repeat; table-layout:fixed " align="center"  background="{{ asset('img/allbg.jpg') }}" >
        <form action="{{ url('search') }}">
            {{csrf_field()}}
            <tr>
            </tr>
            <tr>
            </tr>
            <tr>
                <td></td>
                <td><br><br><br>
                    <label>姓名：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" name="UserName"><br><br>
                    <label>准考证号：</label><input type="text" name="UNumber"><br><br>
                    <label>身份证号：</label><input type="text" name="IDcard">
                </td>
            </tr>
            <tr>
                <td></td>
                <td><button class="button">查询</button></td>
            </tr>
            
        </form>
            
        </table>
    </div>
       
</html>
