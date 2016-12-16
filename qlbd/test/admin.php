<?php // TODO: sửa link dẫn file css, js cho main index view ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Quản Lý Lịch Tập</title>
    <!--<base href="http://localhost:8080/qlbd/"/>-->
    <link rel="stylesheet" type="text/css" href="admin.css">
    <script src="jquery-3.1.1.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <div id="mySidenav" class="sidenav">
        <div class="welcomeSidenav">
            <img src="/admin/profile" class="img-responsive" alt="Image">
            <p>Xin chào ............</p>
        </div>
        <a href="/admin/user">Người dùng</a>
        <a href="/admin/schedule">Lịch tập</a>
        <a href="/admin/exercise">Bài tập</a>
        <a href="/admin/point">Chỉ số</a>
        <a href="/admin/report">Báo cáo</a>
        <a href="/admin/request">Yêu cầu</a>
    </div>
    <div class="main">
        
        <div class="container">
            <div class="row overview"> 
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Thông tin tổng quan
                    </div>
                    <div class="panel-body text-center">
                       <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 box" style="">
                            <h3>Số cầu thủ <span>99</span></h3>
                        </div>
                       <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 box" style="">
                            <h3>Số HLV <span>99</span></h3>
                        </div>
                       <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 box" style="">
                            <h3>Số admin <span>99</span></h3>
                        </div>
                    </div>
                </div>          
            </div>
        </div>
        

    </div>

    <script src="admin.js"></script>
</body>
</html>