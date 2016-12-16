<?php
/**
 * Copyright (c) 2016. Son Nguyen Giang
 */

/**
 * Created by PhpStorm.
 * User: Son Nguyen Giang
 * Date: 12/14/2016
 * Time: 7:04 PM
 */
global $baseLink;
?>

<div class="modal fade" id="updatePlayer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Thông tin cầu thủ</h4>
            </div>
            <form action="<?php echo $baseLink."/userc/updateUser?type=player"?>"  method="POST" role="form">
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
                    <div class="form-group">
                        <label for="number">Số áo</label>
                        <input type="number" class="form-control" name="number" id="" placeholder="Input field" required="required" value="<?php echo $player->getNumber()?>">
                    </div>
                    <div class="form-group">
                        <label for="position">Vị trí</label>
                        <input type="text" class="form-control" name="position" id="" placeholder="Input field" required="required" value="<?php echo $player->getPosition()?>">
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

                    <h4>Các chỉ số</h4>
                    <div class="form-group">
                        <label for="aid">AId</label>
                        <input type="text" class="form-control" name="aid" id="" placeholder="acceleration" readonly required="required" value="<?php echo $attr->getId()?>">
                    </div>
                    <div class="form-group">
                        <label for="acceleration">Acceleration</label>
                        <input type="number" class="form-control" name="acceleration" id="" placeholder="acceleration" required="required" value="<?php echo $attr->getAcceleration()?>">
                    </div>
                    <div class="form-group">
                        <label for="jumping">jumping</label>
                        <input type="number" class="form-control" name="jumping" id="" placeholder="jumping" required="required" value="<?php echo $attr->getJumping()?>">
                    </div>
                    <div class="form-group">
                        <label for="stamina">stamina</label>
                        <input type="number" class="form-control" name="stamina" id="" placeholder="stamina" required="required" value="<?php echo $attr->getStamina()?>">
                    </div>
                    <div class="form-group">
                        <label for="finshing">finshing</label>
                        <input type="number" class="form-control" name="finshing" id="" placeholder="finshing" required="required" value="<?php echo $attr->getFinshing()?>">
                    </div>
                    <div class="form-group">
                        <label for="weight">weight</label>
                        <input type="number" class="form-control" name="weight" id="" placeholder="weight" required="required" value="<?php echo $attr->getWeight()?>">
                    </div>
                    <div class="form-group">
                        <label for="height">height</label>
                        <input type="number" class="form-control" name="height" id="" placeholder="height" required="required" value="<?php echo $attr->getHeight()?>">
                    </div>
                    <div class="form-group">
                        <label for="technique">technique</label>
                        <input type="number" class="form-control" name="technique" id="" placeholder="technique" required="required" value="<?php echo $attr->getTechnique()?>">
                    </div>
                    <div class="form-group">
                        <label for="freekick">freekick</label>
                        <input type="number" class="form-control" name="freekick" id="" placeholder="freekick" required="required" value="<?php echo $attr->getFreekick()?>">
                    </div>
                    <div class="form-group">
                        <label for="passing">passing</label>
                        <input type="number" class="form-control" name="passing" id="" placeholder="passing" required="required" value="<?php echo $attr->getPassing()?>">
                    </div>
                    <div class="form-group">
                        <label for="drilble">drilble</label>
                        <input type="number" class="form-control" name="drilble" id="" placeholder="drilble" required="required" value="<?php echo $attr->getDrilble()?>">
                    </div>
                    <div class="form-group">
                        <label for="agility">agility</label>
                        <input type="number" class="form-control" name="agility" id="" placeholder="agility" required="required" value="<?php echo $attr->getAgility()?>">
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
