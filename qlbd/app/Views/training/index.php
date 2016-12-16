<?php
/**
 * Copyright (c) 2016. Son Nguyen Giang
 */

/**
 * Created by PhpStorm.
 * User: Son Nguyen Giang
 * Date: 12/12/2016
 * Time: 1:12 PM
 */

?>
<div class="container training_index">
    <div class="row">
        <div class="page-header">
            <h1>Lịch tập luyện <small> - Fight untill we die</small></h1>
        </div>
    </div>
    <div class="row description">
        <div class="col-md-6">
            <h3>Chú thích </h3>
        </div>
        <div class="col-md-6 text-right">
            <form class="form-inline" action="" method="POST">
                <input type="email" class="form-control" id="search_input" name="search_keyword" placeholder="Nhập ngày muốn tìm">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        <div class="col-md-12">
            <p><span class="label label-success">Chiến thuật</span> Buổi tập chủ yếu tập trung về chiến thuật</p>
            <p><span class="label label-info">Kỹ thuật</span>  Buổi tập chủ yếu tập trung về kỹ thuật</p>
            <p><span class="label label-danger">Thể lực</span>  Buổi tập chủ yếu tập trung về thể lực</p>
            <hr>
        </div>
    </div>
    <div class="row">
        <?php foreach($sessions as $session):  ?>
            <div class="col-sm-6 col-md-3">
                <a href="#" class="thumbnail">
                    <div class="type text-center <?php echo $session['cssType']?>">
                        <h3><?php echo $session['type']?></h3>
                    </div>
                    <div class="training_content">
                        <h4>Ngày: <?php echo $session['day']?></h4>
                        <h4>Giờ: <?php echo $session['hour']?></h4>
                        <h4>Địa điểm: <?php echo $session['place']?></h4>
                        <p><?php echo $session['info']?></p>
                    </div>
                </a>
            </div>
        <?php endforeach;?>
    </div>

</div>
