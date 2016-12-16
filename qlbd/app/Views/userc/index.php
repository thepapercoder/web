<?php
/**
 * Copyright (c) 2016. Son Nguyen Giang
 */

/**
 * Created by PhpStorm.
 * User: Son Nguyen Giang
 * Date: 12/14/2016
 * Time: 4:24 PM
 */

global $baseLink;
?>

<div class="container user-admin">
    <div class="row">
        <div class="page-header">
            <h1>Quản lý người dùng <small> - Fight until we die</small></h1>
        </div>
    </div>
    <div class="row description">
        <div class="col-md-6">
            <form class="form-inline" action="" method="POST">
                <input type="email" class="form-control" id="search_input" name="search_keyword" placeholder="Nhập tên người dùng">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        <div class="col-md-6 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addAdmin"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm Admin</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCoach"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm HLV</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPlayer"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm Cầu Thủ</button>
        </div>
        <hr>
    </div>

    <div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Thêm Admin</h4>
                </div>
                <form action="<?php echo $baseLink."/userc/addAdmin"?>"  method="POST" role="form">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="" placeholder="Input field" required="required">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="" placeholder="Input field" required="required">
                        </div>
                        <div class="form-group">
                            <label for="repassword">Re-enter password</label>
                            <input type="password" class="form-control" name="repassword" id="" placeholder="Input field" required="required">
                        </div>

                        <div class="form-group">
                            <label for="name">Họ và tên</label>
                            <input type="text" class="form-control" name="name" id="" placeholder="Input field" required="required">
                        </div>
                        <div class="form-group">
                            <label for="dateofbirth">Ngày sinh</label>
                            <input type="date" class="form-control" name="dateofbirth" id="" placeholder="Input field" required="required">
                        </div>
                        <div class="form-group">
                            <label for="username">Giới tính</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="sex" id="optionsRadios1" value="male" checked>
                                    Nam
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="sex" id="optionsRadios1" value="female">
                                    Nữ
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" id="" placeholder="Input field" required="required">
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" class="form-control" name="phone" id="" placeholder="Input field" required="required">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="" placeholder="Input field" required="required">
                        </div>
                        <div class="form-group hidden">
                            <label for="username">Loại người dùng</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="userType" id="optionsRadios1" value="admin" checked>
                                    Admin
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal coach -->
    <div class="modal fade" id="addCoach" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Thêm HLV</h4>
                </div>
                <form action="<?php echo $baseLink."/userc/addCoach"?>"  method="POST" role="form">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="" placeholder="Input field" required="required">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="" placeholder="Input field" required="required">
                        </div>
                        <div class="form-group">
                            <label for="repassword">Re-enter password</label>
                            <input type="password" class="form-control" name="repassword" id="" placeholder="Input field" required="required">
                        </div>

                        <div class="form-group">
                            <label for="name">Họ và tên</label>
                            <input type="text" class="form-control" name="name" id="" placeholder="Input field" required="required">
                        </div>
                        <div class="form-group">
                            <label for="dateofbirth">Ngày sinh</label>
                            <input type="date" class="form-control" name="dateofbirth" id="" placeholder="Input field" required="required">
                        </div>
                        <div class="form-group">
                            <label for="username">Giới tính</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="sex" id="optionsRadios1" value="male" checked>
                                    Nam
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="sex" id="optionsRadios1" value="female">
                                    Nữ
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" id="" placeholder="Input field" required="required">
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" class="form-control" name="phone" id="" placeholder="Input field" required="required">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="" placeholder="Input field" required="required">
                        </div>
                        <div class="form-group hidden">
                            <label for="userType">Loại người dùng</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="userType" id="optionsRadios1" value="coach" checked>
                                    Huấn luyện viên
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="coachType">Loại HLV</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="coachType" id="optionsRadios1" value="main" checked>
                                    HLV Trưởng
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="coachType" id="optionsRadios1" value="strength">
                                    Thể lực
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="coachType" id="optionsRadios1" value="strategy">
                                    Chiến thuật
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="coachType" id="optionsRadios1" value="assistant">
                                    Trợ lý
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal cầu thủ -->
    <div class="modal fade" id="addPlayer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Thêm cầu thủ</h4>
                </div>
                <form action="<?php echo $baseLink."/userc/addPlayer"?>"  method="POST" role="form">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="" placeholder="Input field" required="required">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="" placeholder="Input field" required="required">
                        </div>
                        <div class="form-group">
                            <label for="repassword">Re-enter password</label>
                            <input type="password" class="form-control" name="repassword" id="" placeholder="Input field" required="required">
                        </div>

                        <div class="form-group">
                            <label for="name">Họ và tên</label>
                            <input type="text" class="form-control" name="name" id="" placeholder="Input field" required="required">
                        </div>
                        <div class="form-group">
                            <label for="dateofbirth">Ngày sinh</label>
                            <input type="date" class="form-control" name="dateofbirth" id="" placeholder="Input field" required="required">
                        </div>
                        <div class="form-group">
                            <label for="username">Giới tính</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="sex" id="optionsRadios1" value="male" checked>
                                    Nam
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="sex" id="optionsRadios1" value="female">
                                    Nữ
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" id="" placeholder="Input field" required="required">
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" class="form-control" name="phone" id="" placeholder="Input field" required="required">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="" placeholder="Input field" required="required">
                        </div>
                        <div class="form-group hidden">
                            <label for="userType">Loại người dùng</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="userType" id="optionsRadios1" value="player" checked>
                                    Cầu thủ
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="number">Số áo</label>
                            <input type="number" class="form-control" name="number" id="" placeholder="Input field" required="required">
                        </div>
                        <div class="form-group">
                            <label for="position">Vị trí</label>
                            <input type="text" class="form-control" name="position" id="" placeholder="Input field" required="required">
                        </div>
                        <h4>Các chỉ số</h4>
                        <div class="form-group">
                            <label for="acceleration">Acceleration</label>
                            <input type="number" class="form-control" name="acceleration" id="" placeholder="acceleration" required="required">
                        </div>
                        <div class="form-group">
                            <label for="jumping">jumping</label>
                            <input type="number" class="form-control" name="jumping" id="" placeholder="jumping" required="required">
                        </div>
                        <div class="form-group">
                            <label for="stamina">stamina</label>
                            <input type="number" class="form-control" name="stamina" id="" placeholder="stamina" required="required">
                        </div>
                        <div class="form-group">
                            <label for="finshing">finshing</label>
                            <input type="number" class="form-control" name="finshing" id="" placeholder="finshing" required="required">
                        </div>
                        <div class="form-group">
                            <label for="weight">weight</label>
                            <input type="number" class="form-control" name="weight" id="" placeholder="weight" required="required">
                        </div>
                        <div class="form-group">
                            <label for="height">height</label>
                            <input type="number" class="form-control" name="height" id="" placeholder="height" required="required">
                        </div>
                        <div class="form-group">
                            <label for="technique">technique</label>
                            <input type="number" class="form-control" name="technique" id="" placeholder="technique" required="required">
                        </div>
                        <div class="form-group">
                            <label for="freekick">freekick</label>
                            <input type="number" class="form-control" name="freekick" id="" placeholder="freekick" required="required">
                        </div>
                        <div class="form-group">
                            <label for="passing">passing</label>
                            <input type="number" class="form-control" name="passing" id="" placeholder="passing" required="required">
                        </div>
                        <div class="form-group">
                            <label for="drilble">drilble</label>
                            <input type="number" class="form-control" name="drilble" id="" placeholder="drilble" required="required">
                        </div>
                        <div class="form-group">
                            <label for="agility">agility</label>
                            <input type="number" class="form-control" name="agility" id="" placeholder="agility" required="required">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





    <!-- danh sách người dùng -->
    <div id="alert"></div>

    <div class="row">
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#admin">Admin</a></li>
                <li><a data-toggle="tab" href="#coach">Huấn luyện viên</a></li>
                <li><a data-toggle="tab" href="#player">Cầu thủ</a></li>
            </ul>

            <div class="tab-content">
                <div id="admin" class="tab-pane fade in active">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Họ và tên</th>
                            <th>Giới tính</th>
                            <th>Email</th>
                            <th>Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($admins as $admin):?>
                        <tr class="admin-info" data-id="<?php echo $admin->getId()?>">
                            <td><?php echo $admin->getId()?></td>
                            <td><?php echo $admin->getUsername()?></td>
                            <td><?php echo $admin->getName()?></td>
                            <td><?php echo $admin->getSex()?></td>
                            <td><?php echo $admin->getEmail()?></td>
                            <td><button data-id="<?php echo $admin->getId() ?>" type="button" class="btn btn-danger delete-btn">Xóa</button></td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div id="coach" class="tab-pane fade">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Họ và tên</th>
                            <th>Giới tính</th>
                            <th>Email</th>
                            <th>Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($coachs as $coach):?>
                            <tr class="coach-info" data-id="<?php echo $coach->getId()?>">
                                <td><?php echo $coach->getId()?></td>
                                <td><?php echo $coach->getUsername()?></td>
                                <td><?php echo $coach->getName()?></td>
                                <td><?php echo $coach->getSex()?></td>
                                <td><?php echo $coach->getEmail()?></td>
                                <td><button data-id="<?php echo $coach->getId() ?>" type="button" class="btn btn-danger delete-btn">Xóa</button></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div id="player" class="tab-pane fade">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Họ và tên</th>
                            <th>Giới tính</th>
                            <th>Email</th>
                            <th>Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($players as $player):?>
                            <tr class="player-info" data-id="<?php echo $player->getId()?>">
                                <td><?php echo $player->getId()?></td>
                                <td><?php echo $player->getUsername()?></td>
                                <td><?php echo $player->getName()?></td>
                                <td><?php echo $player->getSex()?></td>
                                <td><?php echo $player->getEmail()?></td>
                                <td><button data-id="<?php echo $player->getId() ?>" type="button" class="btn btn-danger delete-btn">Xóa</button></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    $('.admin-info').click(function() {
        var updateAjax = $.get( "<?php echo "$baseLink/userc/ajaxUpdateAdmin?id="?>"+$(this).attr('data-id'), function(data) {
            $('#alert').empty().append(data);
            $('#updateAdmin').modal('show');
        })
    });
    $('.player-info').click(function() {
        var updateAjax = $.get( "<?php echo "$baseLink/userc/ajaxUpdatePlayer?id="?>"+$(this).attr('data-id'), function(data) {
            $('#alert').empty().append(data);
            $('#updatePlayer').modal('show');
        })
    });
    $('.coach-info').click(function() {
        var updateAjax = $.get( "<?php echo "$baseLink/userc/ajaxUpdateCoach?id="?>"+$(this).attr('data-id'), function(data) {
            $('#alert').empty().append(data);
            $('#updateCoach').modal('show');
            console.log("aaaa");
        })
    });
    $('.delete-btn').button().click(function() {
        var attr_id = $(this).attr('data-id');
        var deleteAjax = $.get( "<?php echo "$baseLink/userc/deleteUser??id="?>"+$(this).attr('data-id'), function(data) {
            $('#alert').empty().append(data);
            if (data === "Thành công") {
                id1 = "#player-"+attr_id;
                id2 = "#admin-"+attr_id;
                id3 = "#coach-"+attr_id;
                $(id1).fadeOut();
                $(id2).fadeOut();
                $(id3).fadeOut();
            }
        })
    });

</script>