<?php
/**
 * Copyright (c) 2016. Son Nguyen Giang
 */

/**
 * Created by PhpStorm.
 * User: Son Nguyen Giang
 * Date: 12/12/2016
 * Time: 9:04 PM
 */
class UserC extends Controller
{
    public function index()
    {
        $this->check_permission(array("admin"));
        $data = array('admins' => User::getPlayerOrCoach("admin"), 'players' => User::getPlayerOrCoach("player"), 'coachs' => User::getPlayerOrCoach("coach"));
        $this->view("index", $data);
        return;
    }

    public function addUser()
    {
        $this->check_permission(array("admin"));
        //array(9) { ["username"]=> string(5) "sadsa" ["password"]=> string(3) "123" ["repassword"]=> string(3) "123" ["name"]=> string(5) "23123" ["sex"]=> string(4) "male"
        // ["address"]=> string(5) "21321" ["phone"]=> string(6) "123213" ["email"]=> string(12) "123132@ad.cp" ["userType"]=> string(5) "admin" }
        foreach ($_POST as $key => $value) {
            $$key = $value;
        }
        $user = array($username, $password, $address, $phone, $sex, $name, $dateofbirth, $email, "blank");
        return $user;
    }

    public function addAdmin()
    {
        $user = $this->addUser();
        array_push($user, "admin");
        array_push($user, "no");
        var_dump($user);
        $id = User::Insert($user);
        if ($id)
        {
            $msg = array("msg" => "Thành công");
        }
        else
        {
            $msg = array("msg" => "Thất bại");
        }
        $this->view("ok", $msg);
    }

    public function addCoach()
    {
        $user = $this->addUser();
        array_push($user, "coach");
        array_push($user, "no");
        $id = User::Insert($user);
        if ($id)
        {
            $coach = array($id, $_POST['coachType']);
            Coach::Insert($coach);
            $msg = array("msg" => "Thành công");
        }
        else
        {
            $msg = array("msg" => "Thất bại");
        }
        $this->view("ok", $msg);
    }

    public function addPlayer()
    {
        $user = $this->addUser();
        array_push($user, "player");
        array_push($user, "no");
        $id = User::Insert($user);
        if ($id)
        {
            foreach ($_POST as $key => $value) {
                $$key = $value;
            }
            $aid = Attribute::Insert(array($acceleration, $jumping, $stamina, $finshing, $weight, $technique, $freekick, $passing, $drilble, $agility, $height));
            Player::Insert(array($id, $aid));
            $msg = array("msg" => "Thành công");
        }
        else
        {
            $msg = array("msg" => "Thất bại");
        }
        $this->view("ok", $msg);
    }

    public function deleteUser()
    {
        $this->check_permission(array("admin"));
        $id = $_GET['id'];
        if (isset($id)) {
            $obj = User::All(0,0, $id)[0];
            $obj->setIsDelete("yes");
            if (Exercise::Update($obj))
            {
                echo "Thành công";
            }
            else
            {
                echo "Thất bại";
            }
        }
        else {
            echo "Thất bại";
            return;
        }
    }

    public function updateUser()
    {
        $this->check_permission(array("admin"));
        $updateType = $_GET['type'];
        foreach ($_POST as $key => $value) {
            $$key = $value;
        }
        $user = new User();
        $user->setId($id);
        $user->setUserType($userType);
        $user->setSex($sex);
        $user->setProfileUrl("blank");
        $user->setEmail($email);
        $user->setDateofbirth($dateofbirth);
        $user->getAddress($address);
        $user->setPassword($password);
        $user->setPhone($phone);

        $user->setIsDelete("no");
        User::Update($user);
        if ($updateType == "admin")
        {
            $msg = "Thành công";
        }
        else if ($updateType == "player")
        {
            $player = new Player();
            $player->setId($id);
            $player->setAid($aid);
            $player->setNumber($number);
            $player->setPosition($position);
            Player::Update($player);

            $attr = new Attribute();
            $attr->setId($aid);
            $attr->setAcceleration($acceleration);
            $attr->setJumping($jumping);
            $attr->setStamina($stamina);
            $attr->setFinshing($finshing);
            $attr->setWeight($weight);
            $attr->setTechnique($technique);
            $attr->setFreekick($freekick);
            $attr->setPassing($passing);
            $attr->setDrilble($drilble);
            $attr->setAgility($agility);
            $attr->setHeight($height);
            Attribute::Update($attr);
            $msg = "Thành công";
        }
        else if ($updateType == "coach")
        {
            $coach = new Coach();
            $coach->setId($id);
            $coach->setType($type);
            Coach::Update($coach);
            $msg = "Thành công";
        }
        $this->view("ok", array('msg' => $msg));
    }

    public function ajaxUpdateAdmin()
    {
        $this->check_permission(array("admin"));
        $id = $_GET['id'];
        $user = User::All(0,0,$id)[0];
        $this->view("ajaxUpdateAdmin", array('user' => $user), false);
    }

    public function ajaxUpdatePlayer()
    {
        $this->check_permission(array("admin"));
        $id = $_GET['id'];
        $user = User::All(0,0,$id)[0];
        $player = Player::All(0, 0, $id)[0];
        $attr = Attribute::All(0, 0, $player->getAid())[0];
        $this->view("ajaxUpdatePlayer", array('user' => $user, 'player' => $player, 'attr' => $attr), false);
    }

    public function ajaxUpdateCoach()
    {
        $this->check_permission(array("admin"));
        $id = $_GET['id'];
        $user = User::All(0,0,$id)[0];
        $coach = Coach::All(0,0,$id)[0];
        $this->view("ajaxUpdateCoach", array('user' => $user, 'coach' => $coach), false);
    }


}