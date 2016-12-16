<?php
/**
 * Copyright (c) 2016. Son Nguyen Giang
 */

/**
 * Created by PhpStorm.
 * User: Son Nguyen Giang
 * Date: 12/14/2016
 * Time: 7:05 PM
 */
global $baseLink;
?>
<div class="modal fade" id="updateCoach" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Thông tin Huấn luyện viên</h4>
            </div>
            <form action="<?php echo $baseLink."/userc/updateUser?type=coach"?>"  method="POST" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id">Id</label>
                        <input type="text" class="form-control" name="id" id="" placeholder="Input field" readonly required="required" value="<?php echo $user->getId()?>">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="" placeholder="Input field" required="required" value="<?php echo $user->getUsername()?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="" placeholder="Input field" required="required" value="<?php echo $user->getPassword()?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Họ và tên</label>
                        <input type="text" class="form-control" name="name" id="" placeholder="Input field" required="required" value="<?php echo $user->getName()?>">
                    </div>
                    <div class="form-group">
                        <label for="dateofbirth">Ngày sinh</label>
                        <input type="date" class="form-control" name="dateofbirth" id="" placeholder="Input field" required="required" value="<?php echo $user->getDateofbirth()?>">
                    </div>
                    <div class="form-group">
                        <label for="username">Giới tính</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="sex" id="optionsRadios1" value="male" <?php echo $user->getSex() == "male"? "checked" : ""?>>
                                Nam
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="sex" id="optionsRadios1" value="female" <?php echo $user->getSex() == "female"? "checked" : ""?>>
                                Nữ
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input type="text" class="form-control" name="address" id="" placeholder="Input field" required="required" value="<?php echo $user->getAddress()?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" class="form-control" name="phone" id="" placeholder="Input field" required="required" value="<?php echo $user->getPhone()?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="" placeholder="Input field" required="required" value="<?php echo $user->getEmail()?>">
                    </div>
                    <div class="form-group hidden">
                        <label for="userType">Loại người dùng</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="userType" id="optionsRadios1" value="coach" checked>
                                HLV
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="coachType">Loại HLV</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="coachType" id="optionsRadios1" value="main" <?php echo $coach->getType() == "main"? "checked" : ""?>>
                                HLV Trưởng
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="coachType" id="optionsRadios1" value="strength" <?php echo $coach->getType() == "strength"? "checked" : ""?>>
                                Thể lực
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="coachType" id="optionsRadios1" value="strategy" <?php echo $coach->getType() == "strategy"? "checked" : ""?>>
                                Chiến thuật
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="coachType" id="optionsRadios1" value="assistant" <?php echo $coach->getType() == "assistant"? "checked" : ""?>>
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
