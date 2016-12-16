<?php
/**
 * Copyright (c) 2016. Son Nguyen Giang
 */

/**
 * Created by PhpStorm.
 * User: Son Nguyen Giang
 * Date: 12/12/2016
 * Time: 1:05 PM
 */
class Training extends Controller
{

    public function index()
    {
        $sessions = Training_Session::All();
        $training = array();
        foreach ($sessions as $session) {
            $day = new DateTime($session->getTime());
            $hour = new DateTime($session->getTime());
            $day = $day->format('d/m');
            $hour = $hour->format('H:i');
            if ($session->getType() == "thể lực") {
                $cssType = "theluc";
            }
            else if ($session->getType() == "chiến thuật")
            {
                $cssType = "chienthuat";
            }
            else {
                $cssType = "kithuat";
            }
            $tmp = array("id" => $session->getId(), "day" => $day, "hour" => $hour, "place" => $session->getPlace(), "info" => $session->getInfo(), "type" => $session->getType(), 'cssType' => $cssType);
            array_push($training, $tmp);
        }
        unset($sessions);
        $data = array("sessions" => $training);
        if ($_SESSION['user_type'] == "admin")
        {
            $data['coachs'] = User::getPlayerOrCoach("coach");
            $data['players'] = User::getPlayerOrCoach("player");
            $data['exs'] = Exercise::All();
            $this->view("admin", $data);
            return;
        }
        $this->view("index", $data);
    }

    public function addSession()
    {
        $this->check_permission(array("admin"));
        var_dump($_POST);
        //array(7) { ["time"]=> string(16) "4444-04-04T16:04" ["place"]=> string(9) "back khoa" ["type"]=> string(11) "thể lực"
        // ["info"]=> string(7) "sadasda"
        // ["coach_list"]=> array(1) { [0]=> string(1) "3" }
        // ["player_list"]=> array(1) { [0]=> string(1) "2" }
        // ["ex_list"]=> array(2) { [0]=> string(2) "18" [1]=> string(2) "30" } }

    }

    public function deleteSession()
    {
        $this->check_permission(array("admin"));
        $session = new Training_Session();
        $session->setId($_GET['id']);
        if (true) {
            echo "deleted";
            return;
        }
        else {
            echo "There was something wrong";
            return;
        }
    }

    public function updateSession()
    {
        //array(6) { ["time"]=> string(19) "03/12/2016 00:00:00" ["place"]=> string(15) "SVĐ Bách Khoa" ["type"]=> string(15) "chiến thuật"
        // ["info"]=> string(555) "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis a semper mi. Suspendisse lorem justo, rutrum quis consectetur vel, hendrerit et augue. Phasellus at est et orci laoreet ultricies. Vivamus eu luctus velit, et laoreet sapien. Pellentesque malesuada sollicitudin nibh, quis ultricies leo efficitur id. Aliquam erat volutpat. Proin ultrices, libero eget vehicula commodo, velit nunc maximus nisl, feugiat pellentesque neque metus malesuada eros. Duis porta condimentum porttitor. Praesent scelerisque odio ex, eget vulputate lacus efficitur non. "
        // ["coach_list"]=> array(1) { [0]=> string(1) "3" }
        // ["ex_list"]=> array(2) { [0]=> string(2) "17" [1]=> string(2) "20" } }
        // ["id"]=> string(1) "3"
        $this->check_permission(array("admin"));
        if ($_POST != null) {
            foreach ($_POST as $key => $value)
            {
                $$key = $value;
            }
        }
        $session = new Training_Session();
        $session->setId($id);
        $session->setType($type);
        $session->setPlace($place);
        $session->setTime($time);
        $session->setInfo($info);

        Training_Session::Update($session);

        if (isset($player_list)) {
            $tmp = new Training_Player();
            $tmp->setid($id);
            Training_Player::Delete($tmp);
            foreach ($player_list as $playerId) {
                Training_Player::Insert(array($id, $playerId));
            }
        }
        if (isset($coach_list)) {
            $tmp = new Training_Coach();
            $tmp->setid($id);
            Training_Coach::Delete($tmp);
            foreach ($coach_list as $coachId) {
                if(Training_Coach::Insert(array($id, $coachId)));
            }
        }
        if (isset($ex_list)) {
            $tmp = new Training_Excercise();
            $tmp->setid($id);
            Training_Player::Delete($tmp);
            foreach ($ex_list as $exId) {
                Training_Excercise::Insert(array($id, $exId));
            }
        }
        $this->view('ok', array('msg' => "Thành công"));
    }

    public function getTrainingInfo()
    {
        $this->check_permission(array("admin"));
        $id = $_GET['id'];
        $training = Training_Session::All(0,0,$id);
        $coachs = Training_Coach::getTrainingCoach($id);
        if (!isset($coachs)) {
            $coachs = array();
        }
        $players = Training_Player::getTrainingPlayer($id);
        if (!isset($players)) {
            $players = array();
        }
        $exs = Training_Excercise::getTrainingEx($id);
        if (!isset($exs)) {
            $exs = array();
        }
        $data = array('coachs' => $coachs, 'players' => $players, 'exs' => $exs, 'id' => $id, 'session' => $training[0]);
        $data['coachs_all'] = User::getPlayerOrCoach("coach");
        $data['players_all'] = User::getPlayerOrCoach("player");
        $data['exs_all'] = Exercise::All();
        $this->view("getTrainingInfo", $data, false);
    }
}