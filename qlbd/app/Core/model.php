<?php
require_once 'database.php';

abstract class Model {

     /**
     * Model constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return bool: Nếu thất bại trả về false
     * @return mixed: Trả về tất cả các đối tượng của class gọi method này
     */
    public static function All($limit = 0, $offset = 0, $id = 0)
    {
        $className = Model::getClassName(get_called_class());
        $variable = Model::getVariable($className);
        if ($id == 0)
        {
            $sql = "SELECT * FROM ".strtolower($className);
        }
        else
        {
            $sql = "SELECT * FROM ".strtolower($className)." WHERE id = ".$id;
        }
        $result = Database::getInstance()->query($sql);
        $rows = array();
        if($result != false)
        {
            while ($obj = $result->fetch_object($className, $variable))
            {
                array_push($rows, $obj);
            }
            return $rows;
        }
        else
        {
            return false;
        }
    }

    public static function Insert($data)
    {
        $className = self::getClassName(get_called_class());
        $typeArray = self::parseType($className);
        $variables = self::getVariable($className);
        $sql = self::makeInsertSQL($className, $typeArray, $variables, $data);
        echo $sql;
        $result = Database::getInstance()->execute($sql);
        if ($result == 0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public static function Update($obj)
    {
        $variables = get_object_vars($obj);
        $className = get_class($obj);
        $typeArray = Model::parseType($className);
        $sql = self::makeUpdateSQL($className, $typeArray, $variables);
        $result = Database::getInstance()->execute($sql);
        if ($result == 0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public static function Delete($obj)
    {
        $className = strtolower(get_class($obj));
        $id = $obj->getId();
        $sql = "DELETE FROM `$className` WHERE id = ".$id;
        $result = Database::getInstance()->execute($sql);
        if ($result == 0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    /**
     * @param $className: tên class
     * @param $typeArray: mảng chứa type của các biến có trong class trên
     * @param $variables: mảng chứa các biến có trong class trên
     * @return string: câu lệnh update sql
     */
    private static function makeUpdateSQL($className, $typeArray, $variables)
    {
        /*var_dump($typeArray);
        echo "<br>";*/
        $className = strtolower($className);
        $sql = "UPDATE `$className` SET ";
        $sqlTemp = "";
        $i = 0;
        foreach ($variables as $key => $value)
        {
            if ($key == "id") {
                $sqlTemp .= " WHERE id = ".$value;
                $i += 1;
                continue;
            }
            if ($typeArray[$i] == "i")
            {
                $sql .= $key." = ".$value.", ";
            }
            else
            {
                $sql .= $key." = '".$value."', ";
            }
            $i += 1;
        }
        $sql = rtrim($sql, ", ").$sqlTemp;
        /*echo $sql;
        echo "<br> <br>";*/
        return $sql;
    }

    /**
     * @param $className: tên class
     * @param $typeArray: mảng chứa type của các biến có trong class trên
     * @param $variables: mảng chứa các biến có trong class trên
     * @param $data: mảng dữ liệu cần đổ vào các biến để đưa lên csdl
     * @return string: câu lệnh insert sql
     */
    private static function makeInsertSQL($className, $typeArray, $variables, $data)
    {
        $className = strtolower($className);
        $variablesString = "";
        $dataString = "";
        $check = false;
        foreach ($variables as $key => $value)
        {
            if ($key == "id" && !in_array($key, array('training_player', 'training_coach', 'training_excercise', 'player', 'coach', 'report_player')) ) {
                $check = true;
                continue;
            }
            $variablesString .= "`".$key."`,";
        }
        $variablesString = trim($variablesString, ", ");
        if ($check == true) {
            $i = 1;
        }
        else {
            $i = 0;
        }
        foreach ($data as $attr)
        {
            if ($attr == null) {
                $dataString .= "null, ";
                $i += 1;
                continue;
            }
            if ($typeArray[$i] == "i")
            {
                $dataString .= $attr.", ";
            }
            else
            {
                $dataString .= "'$attr', ";
            }
            $i += 1;
        }
        $dataString = trim($dataString, ", ");
        $sql = "INSERT INTO `$className` (".$variablesString.") VALUES (".$dataString.")";
        return $sql;
    }

    /**
     * @param $classname: tên class
     * @return array: trả về tất cả các thuộc tính của class ấy
     */
    private static function getVariable($classname)
    {
        $instance = self::getInstance($classname);
        $classVariables = get_object_vars($instance);
        return $classVariables;
    }

    /**
     * @param $typeString: xâu chỉ loại của mỗi biến trong từng đối tượng
     * @return array: câu lệnh sql cho mỗi loại
     */
    private static function parseType($className)
    {
        $instance = self::getInstance($className);
        $variableType = $instance->getVariableType();
        $typeArray = array();
        for ($i = 0, $l = strlen($variableType); $i < $l; $i++) {
            $typeArray[] = $variableType{$i};
        }
        return $typeArray;
    }

    /**
     * @param $className: tên của class
     * @return mixed: trả về một đối tượng của class ấy
     */
    public static function getInstance($className)
    {
        require_once "app/Models/$className.php";
        return new $className;
    }

    /**
     * @param $classpath: đường link đến class nào đó
     * @return string: trả về tên của class
     */
    private static function getClassName($classpath)
    {
        $arr = explode("\\", $classpath);
        return ($arr[count($arr)-1]);
    }
}