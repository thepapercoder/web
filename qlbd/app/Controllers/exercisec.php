<?php
/**
 * Copyright (c) 2016. Son Nguyen Giang
 */

/**
 * Created by PhpStorm.
 * User: Son Nguyen Giang
 * Date: 12/12/2016
 * Time: 2:32 PM
 */
class ExerciseC extends Controller
{

    public function index()
    {
        $exercises = Exercise::All();
        $training = array();
        foreach ($exercises as $exercise) {
            if ($exercise->getIsDelete() == "yes")
            {
                continue;
            }
            switch ($exercise->getType())
            {
                case "thể lực":
                    $cssType = "danger";
                    break;
                case "chiến thuật":
                    $cssType = "success";
                    break;
                default:
                    $cssType = "info";
                    break;
            }
            $tmp = array("id" => $exercise->getId(), "type" => $exercise->getType(), "cssType" => $cssType, "name" => $exercise->getName(), "videoUrl" => $exercise->getVideoUrl(), "duration" => $exercise->getDuration(), "description" => $exercise->getDescription());
            array_push($training, $tmp);
        }
        unset($exercises);
        $data = array("exercises" => $training);
        if ($_SESSION['user_type'] == "admin")
        {
            $this->view("admin", $data);
        }
        else
        {
            $this->view("index", $data);
        }

    }

    public function addExercise()
    {
        $this->check_permission(array("admin"));
        //array(6) { ["name"]=> string(12) "Tập Cardio" ["type"]=> string(11) "thể lực" ["duration"]=> string(2) "60"
        // ["videoUrl"]=> string(41) "https://www.youtube.com/embed/09R8_2nJtjg" ["isDelete"]=> string(2) "no"
        // ["description"]=> string(108) "Chạy nhanh 30 giây, nghỉ 30 giây, làm 5 vòng. Nghỉ 1 phút và lặp lại quãng đường trên." }
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $data = array();
            array_push($data, $_POST['name']);
            array_push($data, $_POST['videoUrl']);
            array_push($data, $_POST['type']);
            array_push($data, $_POST['duration']);
            array_push($data, $_POST['description']);
            array_push($data, "no");
            if (Exercise::Insert($data))
            {
                $msg = array("msg" => "Thành công");
            }
            else
            {
                $msg = array("msg" => "Thất bại");
            }
            $this->view("ok", $msg);
        }
    }

    public function deleteExercise()
    {
        $this->check_permission(array("admin"));
        $obj = Exercise::All(0,0, $_GET['id'])[0];
        $obj->setIsDelete("yes");
        if (Exercise::Update($obj))
        {
            echo "yes";
        }
        else
        {
            echo "no";
        }

    }

     public function updateExercise()
    {
        $this->check_permission(array("admin"));
        $ex = new Exercise();
        $ex->setId($_POST['id']);
        $ex->setName($_POST['name']);
        $ex->setDescription($_POST['description']);
        $ex->setDuration($_POST['duration']);
        $ex->setType($_POST['type']);
        $ex->setVideoUrl($_POST['videoUrl']);
        $ex->setIsDelete("no");
        if (Exercise::Update($ex))
        {
            $msg = array("msg" => "Thành công");
        }
        else
        {
            $msg = array("msg" => "Thất bại");
        }
        $this->view("ok", $msg);
    }

}