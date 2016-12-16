<?php
/**
 * Copyright (c) 2016. Son Nguyen Giang
 */

/**
 * Created by PhpStorm.
 * User: Son Nguyen Giang
 * Date: 12/12/2016
 * Time: 10:56 PM
 */

global $baseLink;
?>

<div class="container exercise_admin">
    <div class="row">
        <div class="page-header">
            <h1>Quản lý bài tập <small> - Fight until we die</small></h1>
        </div>
    </div>
    <div class="row description">
        <div class="col-md-6">
            <form class="form-inline" action="#" method="POST">
                <input type="email" class="form-control" id="search_input" name="search_keyword" placeholder="Nhập tên bài tập">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        <div class="col-md-6 text-right">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addExercise"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm</button>
        </div>
        <hr>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addExercise" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Thêm bài tập mới</h4>
                </div>
                <form action="<?php echo "$baseLink/exercisec/addExercise" ?>"  method="POST" role="form">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Tên bài tập</label>
                            <input required type="text" name="name" id="" class="form-control" placeholder="Tên bài tập">
                        </div>
                        <div class="form-group">
                            <label for="type">Thể loại</label>
                            <input required  type="text" name="type" id="" class="form-control" placeholder="Thể loại">
                        </div>
                        <div class="form-group">
                            <label for="duration">Thời lương</label>
                            <input required  type="text" name="duration" id="" class="form-control" placeholder="Thời lương">
                        </div>
                        <div class="form-group">
                            <label for="videoUrl">Link video</label>
                            <input required  type="text" name="videoUrl" id="" class="form-control" placeholder="Link video">
                        </div>
                        <div class="form-group">
                            <label for="description">Mô tả chi tiết</label>
                            <textarea required  class="form-control" rows="3" name="description" id="" placeholder="Mô tả chi tiết"></textarea>
                        </div>
                        <input style="display: none;" type="text" name="isDelete" id="" class="form-control" placeholder="Input field" value="no">
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div id="alert"></div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Tên</th>
                <th>Thể loại</th>
                <th>Thời lượng</th>
                <th>Video link</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($exercises as $exercise): ?>
            <form action="<?php echo $baseLink."/exercisec/updateExercise" ?>" method="POST" role="form">
                <tr id="">
                    <td><input type="text" name="id" id="" class="form-control" placeholder="Id" readonly="readonly" value="<?php echo $exercise['id'] ?>"></td>
                    <td><input type="text" name="name" id="" class="form-control" placeholder="Tên bài tập" value="<?php echo $exercise['name'] ?>"></td>
                    <td><input type="text" name="type" id="" class="form-control" placeholder="Thể loại" value="<?php echo $exercise['type'] ?>"></td>
                    <td><input type="text" name="duration" id="" class="form-control" placeholder="Thời lương" value="<?php echo $exercise['duration'] ?>"></td>
                    <td><input type="text" name="videoUrl" id="" class="form-control" placeholder="Link video" value="<?php echo $exercise['videoUrl'] == "blank"? "blank" : $exercise['videoUrl'] ?>"><input style="display: none;" type="text" name="isDelete" id="" class="form-control" placeholder="Input field" value="no"></td>
                </tr>
                <tr>
                    <td colspan="4"><textarea class="form-control" rows="3" name="description" id="" placeholder="Mô tả chi tiết" ><?php echo $exercise['description'] ?></textarea></td>
                    <td><button type="submit" $id="submit-update" class="btn btn-warning">Sửa</button><button data-id="<?php echo $exercise['id'] ?>" type="button" id="delete_ex_btn" class="btn btn-danger delete-btn">Xóa</button></td>
                </tr>
            </form>
            <?php endforeach; ?>
        </table>
    </div>
    <script>
        $('.delete-btn').button().click(function() {
            var deleteAjax = $.get( "<?php echo "$baseLink/exercisec/deleteExercise?id="?>"+$(this).attr('data-id'), function(data) {
                $('#alert').empty().append(data);
//                alert("Value: " + $("#delete_ex_btn").val());
//                alert( "success" );
            })
                .done(function() {
//                    alert( "second success" );
                })
                .fail(function() {
//                    alert( "error" );
                })
                .always(function() {
                });

            // Perform other work here ...
                });
//        $('#submit-update').click(function()
//        {
//            $.ajax({
//                url: <?php //echo $baseLink."/exercisec/updateExercise" ?>//,
//                type:'POST',
//                data:
//                    {
//                        email: email_address,
//                        message: message
//                    },
//                success: function(msg)
//                {
//                    alert('Email Sent');
//                }
//            });
//        });
    </script>
</div>
