<?php
/**
 * Copyright (c) 2016. Son Nguyen Giang
 */

/**
 * Created by PhpStorm.
 * User: Son Nguyen Giang
 * Date: 12/13/2016
 * Time: 7:35 AM
 */
global $baseLink;
?>

<div class="container training_admin">
    <div class="row">
        <div class="page-header">
            <h1>Quản lý lịch tập <small> - Fight until we die</small></h1>
        </div>
    </div>
    <div class="row description">
        <div class="col-md-6">
            <form class="form-inline" action="" method="POST">
                <input type="email" class="form-control" id="search_input" name="search_keyword" placeholder="Nhập tên bài tập">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        <div class="col-md-6 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addSession"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm</button>
        </div>
        <hr>
    </div>

    <div class="modal fade" id="addSession" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Thêm buổi tập mới</h4>
                </div>
                <form action="<?php echo $baseLink."/training/addSession"?>"  method="POST" role="form">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="time">Thời gian</label>
                                    <input type="text" name="time" id="" class="form-control" placeholder="Thời gian bắt đầu">
                                </div>
                                <div class="form-group">
                                    <label for="place">Địa điểm</label>
                                    <input type="text" name="place" id="" class="form-control" placeholder="Địa điểm luyện tập">
                                </div>
                                <div class="form-group">
                                    <label for="type">Loại buổi tập</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="type" id="optionsRadios1" value="thể lực" checked>
                                            Thể lực
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="type" id="optionsRadios2" value="chiến thuật">
                                            Chiến thuật
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="type" id="optionsRadios3" value="kĩ thuật">
                                            Kĩ thuật
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="info">Mô tả chi tiết</label>
                                    <textarea required  class="form-control" rows="3" name="info" id="" placeholder="Mô tả chi tiết"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4 add_session_col">
                                <div class="row">
                                    <h4>Huấn luyện viên</h4>
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>tên</th>
                                            <th>Pick</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($coachs as $coach): ?>
                                        <tr>
                                            <td><?php echo $coach->getId()?></td>
                                            <td><?php echo $coach->getName()?></td>
                                            <td><input type="checkbox" name="coach_list[]" value="<?php echo $coach->getId()?>"></td>
                                        </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-4 add_session_col">
                                <div class="row">
                                    <h4>Cầu thủ</h4>
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>tên</th>
                                            <th>Pick</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($players as $player): ?>
                                            <tr>
                                                <td><?php echo $player->getId()?></td>
                                                <td><?php echo $player->getName()?></td>
                                                <td><input type="checkbox" name="player_list[]" value="<?php echo $player->getId()?>"></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tên bài tập</th>
                                    <th>Thể loại</th>
                                    <th>Thời lượng</th>
                                    <th>Check</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($exs as $ex):?>
                                <tr>
                                    <td><?php echo $ex->getId()?></td>
                                    <td><?php echo $ex->getName()?></td>
                                    <td><?php echo $ex->getType()?></td>
                                    <td><?php echo $ex->getDuration()?></td>
                                    <td><input type="checkbox" name="ex_list[]" value="<?php echo $ex->getId()?>"></td>
                                </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>

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

    <div id="alert"></div>

    <div class="row">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Thời gian</th>
                <th>Địa điểm</th>
                <th>Thể loại</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($sessions as $session):?>
            <tr id="tr-<?php echo $session['id']?>">
                <td class="session-row" data-id="<?php echo $session['id']?>"><?php echo $session['id']?></td>
                <td class="session-row" data-id="<?php echo $session['id']?>"><?php echo $session['day']." - ".$session['hour']?></td>
                <td class="session-row" data-id="<?php echo $session['id']?>"><?php echo $session['place']?></td>
                <td class="session-row" data-id="<?php echo $session['id']?>"><?php echo $session['type']?></td>
                <td><button data-id="<?php echo $session['id'] ?>" type="button" class="btn btn-danger delete-btn">Xóa</button></td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $('.session-row').click(function() {
        var updateAjax = $.get( "<?php echo "$baseLink/training/getTrainingInfo?id="?>"+$(this).attr('data-id'), function(data) {
            $('#alert').empty().append(data);
            $('#infoModal').modal('show');
        })
    });
    $('.delete-btn').button().click(function() {
        var attr_id = $(this).attr('data-id');
        var deleteAjax = $.get( "<?php echo "$baseLink/training/deleteSession?id="?>"+$(this).attr('data-id'), function(data) {
            $('#alert').empty().append(data);
            if (data === "deleted") {
                id = "#tr-"+attr_id;
                $(id).fadeOut();
            }
        })
    });
</script>
