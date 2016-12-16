<?php

class Main extends Controller
{
    public function index()
    {
        switch ($_SESSION['user_type']) {
            case "admin":
                $this->admin();
                break;
            case "coach":
                $this->coach();
                break;
            case "player":
                $this->player();
                break;
            default:
                break;
        }
    }

    public function admin()
    {
        $this->check_permission(array("admin"));
        $sessions = Training_Session::All();
        $training = array();
        foreach ($sessions as $session) {
            $day = new DateTime($session->getTime());
            $hour = new DateTime($session->getTime());
            $day = $day->format('d/m');
            $hour = $hour->format('H:i');
            $tmp = array("day" => $day, "hour" => $hour, "place" => $session->getPlace());
            array_push($training, $tmp);
        }
        unset($sessions);
        $data = array("user" => $_SESSION['user'], "sessions" => $training);
        $this->view("admin", $data);
    }

    public function coach()
    {
        $this->check_permission(array("coach"));
        $sessions = Training_Session::All();
        $training = array();
        foreach ($sessions as $session) {
            $day = new DateTime($session->getTime());
            $hour = new DateTime($session->getTime());
            $day = $day->format('d/m');
            $hour = $hour->format('H:i');
            $tmp = array("day" => $day, "hour" => $hour, "place" => $session->getPlace());
            array_push($training, $tmp);
        }
        unset($sessions);
        $data = array("user" => $_SESSION['user'], "sessions" => $training);
        $this->view("coach", $data);
    }

    public function player()
    {
        $this->check_permission(array("player"));
        $sessions = Training_Session::All();
        $training = array();
        foreach ($sessions as $session) {
            $day = new DateTime($session->getTime());
            $hour = new DateTime($session->getTime());
            $day = $day->format('d/m');
            $hour = $hour->format('H:i');
            $tmp = array("day" => $day, "hour" => $hour, "place" => $session->getPlace());
            array_push($training, $tmp);
        }
        unset($sessions);
        $data = array("user" => $_SESSION['user'], "sessions" => $training);
        $this->view("player");
    }

    public function login()
    {
        global $baseLink;
        if (!isset($_SESSION['is_login'])) // Kiểm tra đã đăng nhập chưa nếu chưa
        {
            if ($_SERVER['REQUEST_METHOD'] == "POST") // Kiểm tra có phải gửi yêu cầu đăng nhập đến
            {
                if (isset($_POST['username']) && isset($_POST['password'])) // Kiểm tra username, password
                {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $result = User::Authenticate($username, $password);
                    $data = array();

                    if ($result == false)
                    {
                        $data['errorhandle'] = "Wrong username or password";
                        $data['username'] = $username;
                        $this->view("index", $data, false);
                    }
                    else if ($result == "deleted")
                    {
                        $data['errorhandle'] = "Account is deleted";
                        $data['username'] = $username;
                        $this->view("index", $data, false);
                    }
                    else
                    {
                        $_SESSION['is_login'] = true;
                        $_SESSION['user_type'] = $result->getUserType();
                        $_SESSION['user'] = $result;
                        switch ($_SESSION['user_type']) {
                            case "admin":
                                header("Location: $baseLink/main/admin");
                                exit;
                            case "coach":
                                header("Location: $baseLink/main/coach");
                                exit;
                            case "player":
                                header("Location: $baseLink/main/player");
                                exit;
                            default:
                                header("Location: $baseLink/errorhandle");
                                exit;
                        }
                    }
                }
            }
            else {
                $this->view("login", null, false);
            }

        }
        else {
            var_dump($_SESSION);
            switch ($_SESSION['user_type']) {
                case "admin":
                    header("Location: $baseLink/main/admin");
                    exit;
                case "coach":
                    header("Location: $baseLink/main/coach");
                    exit;
                case "player":
                    header("Location: $baseLink/main/player");
                    exit;
                default:
                    header("Location: $baseLink/errorhandle");
                    exit;
            }
        }
    }

    public function logout()
    {
        global $baseLink;
        session_unset();
        session_destroy();
        session_write_close();
        setcookie(session_name(),'',0,'/');
        session_regenerate_id(true);
        header("Location: $baseLink/");
        exit;
    }

}