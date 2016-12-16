<?php

/**
 * Class Database: xử lý việc giao tiếp với database
 * sử dụng singleton pattern
 */
class Database {
    /**
     * @var: object duy nhất của class Database
     */
    private static $instanse;
    /**
     * @var mysqli
     */
    private $db;
    /**
     * Database constructor
     */
    private function __construct() {
        global $host, $database, $user, $password;
        $this->db = new mysqli($host, $user, $password, $database);
        $this->db->set_charset("utf8");
        if($this->db->connect_errno > 0) {
            die('Unable to connect to database [' . Database::$db->connect_error . ']');
        }
    }

    /**
     * @return mixed
     */
    public static function getInstance() {
        if (!Database::$instanse) {
            Database::$instanse = new Database();
        }
        return Database::$instanse;
    }

    /**
     * @param $sql: câu lệnh sql dành cho select
     * @return bool|mysqli_result: trả về kết quả của câu lệnh truy vấn
     */
    public function query($sql) {
        $result = $this->db->query($sql);
        if ($result == false) {
            echo "<br><br>";
            echo($this->db->error);
            echo "<br><br>";
            return false;
        }
        return $result;
    }

    /**
     * @param $sql: câu lệnh sql dành cho insert
     * @return mixed: trả về id của object vừa được insert
     */
    public function insert($sql) {
        $result = $this->db->query($sql);
        if ($result == false) {
            echo "<br><br>";
            echo($this->db->error);
            echo "<br><br>";
            return 0;
        }
        return $this->db->insert_id;
    }

    /**
     * @param $sql
     * @return bool|mysqli_result
     */
    public function execute($sql) {
        $result = $this->db->query($sql);
        if ($result == false) {
            echo "<br><br>";
            echo($this->db->error);
            echo "<br><br>";
        }
        return $result;
    }

    /**
     *
     */
    public function rollback() {
        $this->db->rollback();
    }

    /**
     *
     */
    public function close() {
        self::$db->close();
    }
}