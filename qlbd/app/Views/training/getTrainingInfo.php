    <?php
    /**
     * Copyright (c) 2016. Son Nguyen Giang
     */

    /**
     * Created by PhpStorm.
     * User: Son Nguyen Giang
     * Date: 12/13/2016
     * Time: 5:15 PM
     */

    //array(4) {
    // ["coachs"]=> array(1) { [0]=> array(2) { ["name"]=> string(10) "xấu trai" ["id"]=> string(1) "3" } }
    // ["players"]=> array(1) { [0]=> array(2) { ["name"]=> string(27) "đẹp trai có gì là sai" ["id"]=> string(1) "2" } }
    // ["exs"]=> array(2) { [0]=> array(2) { ["name"]=> string(17) "Tập thể lực" ["id"]=> string(2) "17" } [1]=> array(2) { ["name"]=> string(11) "Chạy bộ" ["id"]=> string(2) "20" } } ["id"]=> string(1) "3" }

    $date_time = new DateTime($session->getTime());
    $date_time = $date_time->format('d/m/Y H:i:s');
    global $baseLink;
    ?>
    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Sửa buổi tập</h4>
                </div>
                <form action="<?php echo $baseLink."/training/updateSession"?>"  method="POST" role="form">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="time">Id</label>
                                    <input type="text" name="id" id="" class="form-control" placeholder="Id" value="<?php echo $id?>">
                                </div>
                                <div class="form-group">
                                    <label for="time">Thời gian</label>
                                    <input type="text" name="time" id="" class="form-control" placeholder="Thời gian bắt đầu" value="<?php echo $date_time?>">
                                </div>
                                <div class="form-group">
                                    <label for="place">Địa điểm</label>
                                    <input type="text" name="place" id="" class="form-control" placeholder="Địa điểm luyện tập" value="<?php echo $session->getPlace()?>">
                                </div>
                                <div class="form-group">
                                    <label for="type">Loại buổi tập</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="type" id="optionsRadios1" value="thể lực" <?php echo $session->getType() == "thể lực"? "checked" : ""?> >
                                            Thể lực
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="type" id="optionsRadios2" value="chiến thuật" <?php echo $session->getType() == "chiến thuật"? "checked" : ""?> >
                                            Chiến thuật
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="type" id="optionsRadios3" value="kĩ thuật" <?php echo $session->getType() == "kĩ thuật"? "checked" : ""?> >
                                            Kĩ thuật
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="info">Mô tả chi tiết</label>
                                    <textarea required  class="form-control" rows="3" name="info" id="" placeholder="Mô tả chi tiết"><?php echo $session->getInfo()?> </textarea>
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
                                        <tr>
                                        <?php foreach ($coachs_all as $coach):?>
                                        <tr>
                                            <td><?php echo $coach->getId()?></td>
                                            <td><?php echo $coach->getName()?></td>
                                            <td><input type="checkbox" name="coach_list[]" value="<?php echo $coach->getId()?>"
                                            <?php foreach ($coachs as $c):
                                                if ($c['id'] == $coach->getId()) { ?>
                                                     checked
                                                <?php } ?>

                                            <?php endforeach;?>
                                            ></td>
                                        </tr>
                                        <?php endforeach;?>
                                        </tr>
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
                                        <?php foreach ($players_all as $player):?>
                                            <tr>
                                                <td><?php echo $player->getId()?></td>
                                                <td><?php echo $player->getName()?></td>
                                                <td><input type="checkbox" name="player_list[]" value="<?php echo $player->getId()?>"
                                                <?php foreach ($players as $p):
                                                    if ($p['id'] == $player->getId()) {
                                                         echo "checked";
                                                     } ?>
                                                <?php endforeach;?>
                                                    ></td>
                                            </tr>
                                        <?php endforeach;?>
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
                                    <th>Check</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($exs_all as $ex):?>
                                    <tr>
                                        <td><?php echo $ex->getId()?></td>
                                        <td><?php echo $ex->getName()?></td>
                                        <td><input type="checkbox" name="ex_list[]" value="<?php echo $ex->getId()?>"
                                        <?php
                                        reset($exs);
                                        foreach ($exs as $e):
                                            if ($e['id'] === $ex->getId()) { ?>
                                                 checked
                                            <?php }?>
                                        <?php endforeach;?>
                                            ></td>
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
