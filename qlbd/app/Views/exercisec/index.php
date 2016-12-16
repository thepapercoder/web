<?php
/**
 * Copyright (c) 2016. Son Nguyen Giang
 */

/**
 * Created by PhpStorm.
 * User: Son Nguyen Giang
 * Date: 12/12/2016
 * Time: 2:34 PM
 */
?>
<div class="container exercise_index">
    <div class="row">
        <div class="page-header">
            <h1>Bài tập <small> - Fight until we die</small></h1>
        </div>
    </div>
    <div class="row description">
        <div class="col-md-6">
            <h3>Chú thích</h3>
        </div>
        <div class="col-md-6 text-right">
            <form class="form-inline" action="" method="POST">
                <input type="email" class="form-control" id="search_input" name="search_keyword" placeholder="Nhập ngày muốn tìm">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        <div class="col-md-12">
            <p><span class="label label-success">Chiến thuật</span> Buổi tập chủ yếu tập trung về chiến thuật</p>
            <p><span class="label label-info">Kĩ thuật</span>  Buổi tập chủ yếu tập trung về kỹ thuật</p>
            <p><span class="label label-danger">Thể lực</span>  Buổi tập chủ yếu tập trung về thể lực</p>
            <hr>
        </div>
    </div>
    <div class="row">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Tên</th>
                <th>Thể loại</th>
                <th>Thời lượng</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($exercises as $exercise): ?>
            <tr id="tr_click_<?php echo $exercise['id'] ?>">
                <td><?php echo $exercise['id'] ?></td>
                <td><?php echo $exercise['name'] ?></td>
                <td><?php echo $exercise['type'] ?></td>
                <td><?php echo $exercise['duration'] ?></td>
            </tr>
            <tr id="tr_<?php echo $exercise['id'] ?>" class="hidden_tr <?php echo $exercise['cssType'] ?>" >
                <td colspan="4">
                    <h4>Video hướng dẫn</h4>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe width="100" height="100" src="<?php echo $exercise['videoUrl'] == "blank"? "" : $exercise['videoUrl'] ?>" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <h4>Mô tả</h4>
                    <div>
                        <p><?php echo $exercise['description'] ?></p>
                    </div>
                </td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>

<script>
    <?php
    reset($exercises);
    foreach ($exercises as $exercise):
    ?>
    $("#tr_click_<?php echo $exercise['id'] ?>").click(function(){
        $("#tr_<?php echo $exercise['id'] ?>").fadeToggle();
    });
    <?php endforeach;?>
</script>