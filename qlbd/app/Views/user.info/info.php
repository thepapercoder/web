<?php
/**
 * Copyright (c) 2016. Son Nguyen Giang
 */

/**
 * Created by PhpStorm.
 * User: Son Nguyen Giang
 * Date: 12/12/2016
 * Time: 7:14 AM
 */
?>
<div class="row info">
        <div class="col-md-9">
            <h3>Thông tin cá nhân</h3>
            <hr>
            <div class="col-md-4">
                <img src="<?php echo $user->getProfileUrl() == "blank"? "public/theme/img/defaultAvatar.png" : $user->getProfileUrl() ?>" class="img-responsive avatar" alt="Image">
            </div>
            <div class="col-md-8">
                <p class="title_field">Id:</p>
                <p class="content_field"><?php echo $user->getId()?></p>
                <p class="title_field">Username:</p>
                <p class="content_field"><?php echo $user->getUsername()?></p>
                <p class="title_field">Họ và tên:</p>
                <p class="content_field"><?php echo $user->getName()?></p>
                <p class="title_field">Ngày sinh:</p>
                <p class="content_field"><?php echo $user->getDateofbirth()?></p>
                <p class="title_field">Giới tính:</p>
                <p class="content_field"><?php echo $user->getSex()?></p>
                <p class="title_field">Địa chỉ:</p>
                <p class="content_field"><?php echo $user->getAddress()?></p>
                <p class="title_field">Điện Thoại:</p>
                <p class="content_field"><?php echo $user->getPhone()?></p>
                <p class="title_field">Email:</p>
                <p class="content_field"><?php echo $user->getEmail()?></p>
                <p class="title_field">Phân quyền người dùng</p>
                <p class="content_field"><?php echo $user->getUserType()?></p>
            </div>
        </div>

        <div class="col-md-3">
            <h3>Buổi tập tiếp theo</h3>
            <?php
            $i = 0;
            foreach ($sessions as $session) {
                if ($i == 3) break;
                $i += 1;
                ?>
            <div class="next_session bs-callout bs-callout-danger">
                <p><span class="next_day"><?php echo $session['day']?></span><?php echo $session['hour']?></p>
                <p><?php echo $session['place']?></p>
            </div>
            <?php  }?>
        </div>
    </div>